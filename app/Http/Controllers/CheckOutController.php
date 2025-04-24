<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Tambahkan Midtrans
use Midtrans\Config;
use Midtrans\Snap;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total   = 0;
        $carts   = Cart::with('produk')->where('id_user', Auth::id())->where('is_selected', 1)->get();
        $alamats = auth()->user()->alamats;

        foreach ($carts as $cart) {
            $subTotal = $cart->quantity * $cart->produk->harga;
            $total += $subTotal;
        }

        return view('frontEnd.checkout', compact('carts', 'total', 'alamats'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'alamat'   => 'required|string|max:255',
            'kota'     => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'phone'    => 'required|string|max:255',
            'email'    => 'required|string|max:255',
        ]);

        $total = 0;
        $carts = Cart::with('produk')->where('id_user', Auth::id())->where('is_selected', 1)->get();

        foreach ($carts as $cart) {
            $total += $cart->quantity * $cart->produk->harga;
        }

        // Generate Order ID
        $orderId = 'ORDER-' . time();

        // Midtrans Config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $total,
            ],
            'customer_details'    => [
                'first_name' => Auth::user()->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan Order ke DB (sementara status masih "Pending")
            foreach ($carts as $cart) {
                $order = Order::create([
                    'order_id'  => $orderId,
                    'user_id'   => Auth::id(),
                    'produk_id' => $cart->id_produk,
                    'alamat'    => $request->alamat,
                    'kota'      => $request->kota,
                    'kode_pos'  => $request->kode_pos,
                    'phone'     => $request->phone,
                    'email'     => $request->email,
                    'total'     => $total,
                    'status'    => 'pending',
                ]);

                Transaksi::create([
                    'order_id'  => $order->id,
                    'produk_id' => $cart->id_produk,
                    'quantity'  => $cart->quantity,
                    'price'     => $cart->produk->harga * $cart->quantity,
                ]);

                // Update stok
                $produk = Produk::findOrFail($cart->id_produk);
                $produk->stok -= $cart->quantity;
                $produk->save();

                $cart->delete();
            }

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {}
    public function show(string $id)
    {}
    public function edit(string $id)
    {}
    public function update(Request $request, string $id)
    {}
    public function destroy(string $id)
    {}
}
