<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
// use App\Mail\ContactMail;

use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    // tampilan index
    public function index()
    {
        $produk = Produk::all();
        return view('frontEnd.index', compact('produk'));
    }
    //  tampilan shop
    public function shop()
    {
        $produk = Produk::all();
        $Kategori = Kategori::all();
        return view('frontEnd.shop', compact('produk', 'Kategori'));
    }
    //  tampilan kategori
    public function kategori($id)
    {
        $produk = Produk::where('kategori_id', $id)->get();
        $kategori = Kategori::all();
        return view('frontEnd.kategori', compact('produk', 'kategori'));
    }
    public function detail($id)
    {
        $produk = Produk::findOrFail($id);
        return view('frontend.detail', compact('produk'));
    }
    //  tampilan checkout
    public function checko1ut()
    {
        return view('frontend.checkout');
    }
    //  tampilan kontak
    public function kontak()
    {
        return view('frontend.contact');
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function about()
    {
        return view('frontend.about');
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        // dd($validatedData);
        // Proses penyimpanan atau pengiriman email
        // Misalnya, kirim email:
        // Mail::to('exaltedgaraga@gmail.com')->send(new ContactMail($validatedData));

        // return response()->json(['success' => 'Message sent successfully.']);

        $name = $request->name ?? 'Anonymous';
        $email = $request->email ?? 'no-email@example.com';
        $subject = $request->subject ?? 'No Subject';
        $messageContent = $request->message ?? 'No message';

        Mail::send([], [], function ($message) use ($request) {
            $message->to('exaltedgaraga@gmail.com')
                ->subject($request->subject)
                ->html('<p>' . $request->message . '</p><p>Dari: ' . $request->name . ' &lt;' . $request->email . '&gt;</p>');
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

}
