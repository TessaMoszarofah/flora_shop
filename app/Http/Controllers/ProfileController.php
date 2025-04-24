<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function index()
    {
        return view('frontEnd.component.formProfile', [
            'user' => Auth::user(), // Mengambil data pengguna yang sedang login
        ]);
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(Request $request)
    {
        // Validasi data input
        $request->validate([
            'phone'     => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->phone     = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->save(); // Simpan perubahan ke database

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
