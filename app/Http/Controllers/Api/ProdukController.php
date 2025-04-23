<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil semua data produk dari tabel produk
        $produks = Produk::all();

        return response()->json([
            'status' => true,
            'message' => 'List produk berhasil diambil',
            'data' => $produks
        ]);
    }
}
