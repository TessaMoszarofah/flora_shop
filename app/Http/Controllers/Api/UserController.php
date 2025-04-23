<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  // Pastikan Anda sudah import model User

class UserController extends Controller
{
    // Mengambil semua data user
    public function index()
    {
        // Ambil semua data pengguna dari tabel user
        $users = User::all();

        return response()->json([
            'status' => true,
            'message' => 'List pengguna berhasil diambil',
            'data' => $users
        ]);
    }

    // Mengambil data pengguna yang sedang terautentikasi (misalnya pengguna yang login)
    public function show(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        return response()->json([
            'status' => true,
            'message' => 'Data pengguna berhasil diambil',
            'data' => $request->user()
        ]);
    }
}
