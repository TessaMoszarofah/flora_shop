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
        $user = Auth::user();

        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'nullable|string|max:15',
            'store_name' => 'nullable|string|max:255',
            'gender'     => 'nullable|in:Laki-laki,Perempuan,Lainnya',
            'birthdate'  => 'nullable|date',
            'avatar'     => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        // Jika pengguna mengunggah foto baru
        if ($request->hasFile('avatar')) {
            $avatarPath   = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Simpan perubahan
        $user->update($request->except('avatar'));

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
