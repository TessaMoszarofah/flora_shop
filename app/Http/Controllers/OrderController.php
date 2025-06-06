<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'produk'])->get();
        return view('admin.order.index', compact('orders'));
        // // Tampilkan halaman checkout dengan item keranjang
        // $cart = Cart::where('user_id', auth()->id())->first();
        // return view('checkout.index', ['cart' => $cart]);
    }

    // riwayat pesanan
    public function riwayat()
    {
        // $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        // return view('frontEnd.history', compact('orders'));
        $orders = Order::with('produk')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['complate', 'cancel'])
            ->orderBy('created_at', 'desc')
            ->get();

            return view('frontEnd.history', compact('orders'));

    }

    public function pesananSaya()
    {
        $orders = Order::with('produk')
            ->where('user_id', auth()->id())
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

            return view('frontEnd.pesanan', compact('orders'));

    }

    // proses checkout
    public function process(Request $request)
    {
        // // Proses checkout (misalnya, membuat pesanan, mengurangi stok, dll.)
        // $cart = Cart::where('user_id', auth()->id())->first();

        // // Misalnya, buat pesanan baru
        // // $order = Order::create([...]);

        // // Hapus keranjang setelah checkout berhasil
        // $cart->delete();

        // return redirect()->route('home')->with('success', 'Checkout berhasil!');
    }

    public function updateStatus(Request $request, $id)
    {
        $order         = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Memuat data terkait user dan produk untuk pesanan ini
        $order->load('user', 'produk');

        // Mengembalikan view 'order.show' dengan data pesanan
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        toast('Data delete Successfully', 'success')->autoClose(1000);
        return redirect()->route('order.index');
    }
}
