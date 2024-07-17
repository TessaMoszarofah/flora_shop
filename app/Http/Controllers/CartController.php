<?php

namespace App\Http\Controllers;

use App\Models\Produk;
// use App\Models\Cart;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        // $carts = Cart::where('id_user', $user->id)->get(); // Mengambil semua item dalam keranjang pengguna

        $cartItems = Cart::getContent();
        // dd( $cartItems);
        return view('frontend.cart', compact('cartItems'));
    }
    public function add(Request $request, $id)
    {
        $product = Produk::find($id);

        if ($product) {
            // Cart::add($product->id, $product->nama_produk, 1, $product->harga);
            Cart::add([
                'id' => $product->id,
                'name' => $product->nama_produk, // Sesuaikan dengan atribut nama produk yang benar
                'price' => $product->harga, // Sesuaikan dengan atribut harga yang benar
                'quantity' => 1,
                'attributes' => [
                    'gambar' => $product->gambar, // Simpan path gambar produk di sini
                ],
            ]);
            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
        }

        return redirect()->route('home')->with('error', 'Product not found.');
    }
    public function update(Request $request, $itemId)
    {
        $quantity = $request->input('quantity');

        Cart::update($itemId, [
            'quantity' => [
                'relative' => false,
                'value' => $quantity,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
    public function remove($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    public function clear()
    {
        Cart::clear();

        return redirect()->back()->with('success', 'Cart cleared!');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $user = auth()->user(); // Mendapatkan pengguna yang sedang login

    //     // Cek apakah produk sudah ada di keranjang pengguna
    //     $existingCart = Cart::where('id_user', $user->id)
    //         ->where('id_produk', $request->id_produk)
    //         ->first();

    //     if ($existingCart) {
    //         // Jika produk sudah ada, tambahkan quantity
    //         $existingCart->quantity += $request->quantity;
    //         $existingCart->save();
    //     } else {
    //         // Jika produk belum ada, buat entri baru di keranjang
    //         $cart = new Cart();
    //         $cart->id_user = $user->id;
    //         $cart->id_produk = $request->id_produk;
    //         $cart->quantity = $request->quantity;
    //         $cart->save();
    //     }

    //     return redirect()->route('carts.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Cart $cart)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Cart $cart)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Cart $cart)
    // {
    //     $cart = Cart::findOrFail($id);
    //     $cart->quantity = $request->quantity;
    //     $cart->save();

    //     return redirect()->route('carts.index')->with('success', 'Kuantitas produk dalam keranjang berhasil diupdate.');
    // }

    // public function updateQuantity(Request $request)
    // {
    //     $cart = Cart::find($request->id);
    //     $cart->quantity = $request->quantity;
    //     $cart->save();

    //     return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Cart $cart)
    // {
    //     $cart = Cart::findOrFail($id);
    //     $cart->delete();

    //     return redirect()->route('carts.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    // }

    // public function removeItem(Request $request)
    // {
    //     $cart = Cart::find($request->id);
    //     $cart->delete();

    //     return response()->json(['success' => true, 'message' => 'Item removed successfully']);
    // }
}
