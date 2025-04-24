@extends('frontEnd.profile')

@section('centerContent')
<div class="col-md-8 mb-4 p-4 bg-white rounded shadow-sm">
    <h2 class="h5 mb-4 fw-bold border-bottom pb-2">📍 Alamat Saya</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Daftar Alamat --}}
    <h5 class="fw-semibold mb-3">📦 Daftar Alamat Tersimpan</h5>
    
    @forelse($alamats as $alamat)
        <div class="border rounded p-3 mb-3">
            <div><strong>{{ $alamat->nama_penerima }}</strong> | {{ $alamat->no_hp }}</div>
            <div>{{ $alamat->alamat_lengkap }}</div>
            <div>{{ $alamat->kota }}, {{ $alamat->provinsi }} - {{ $alamat->kode_pos }}</div>
            <form action="{{ route('alamat.destroy', $alamat->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus alamat ini?')">Hapus</button>
            </form>
        </div>
    @empty
        <p class="text-muted">Belum ada alamat yang disimpan.</p>
    @endforelse

    {{-- Form Tambah Alamat --}}
    <h5 class="fw-semibold mt-4 mb-3">➕ Tambah Alamat Baru</h5>
    <form action="{{ route('alamat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Penerima</label>
            <input type="text" class="form-control" name="nama_penerima" value="{{ old('nama_penerima') }}" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat Lengkap</label>
            <textarea class="form-control" name="alamat_lengkap" required>{{ old('alamat_lengkap') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Kode Pos</label>
            <input type="text" class="form-control" name="kode_pos" value="{{ old('kode_pos') }}" required>
        </div>
        <div class="mb-3">
            <label>Kota</label>
            <input type="text" class="form-control" name="kota" value="{{ old('kota') }}" required>
        </div>
        <div class="mb-3">
            <label>Provinsi</label>
            <input type="text" class="form-control" name="provinsi" value="{{ old('provinsi') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Alamat</button>
    </form>
</div>
@endsection
