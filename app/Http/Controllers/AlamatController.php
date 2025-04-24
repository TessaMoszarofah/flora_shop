<?php
namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function index()
    {
        $alamats = auth()->user()->alamats;
        return view('frontEnd.alamat', compact('alamats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'no_hp' => 'required',
            'alamat_lengkap' => 'required',
            'kode_pos' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        // Simpan alamat baru
        Alamat::create([
            'user_id' => auth()->id(),
            'nama_penerima' => $request->nama_penerima,
            'no_hp' => $request->no_hp,
            'alamat_lengkap' => $request->alamat_lengkap,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
        ]);

        return back()->with('success', 'Alamat berhasil disimpan!');
    }

    public function destroy($id)
    {
        $alamat = Alamat::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $alamat->delete();

        return back()->with('success', 'Alamat berhasil dihapus!');
    }
}
