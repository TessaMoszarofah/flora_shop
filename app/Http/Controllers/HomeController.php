<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
         // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna adalah admin
        if ($user->isAdmin == 1) {
            return view('admin.index'); // Arahkan ke halaman admin.index untuk admin
         } else {
                return view('index'); // Arahkan ke halaman utama untuk pengguna biasa
            }
        }
}