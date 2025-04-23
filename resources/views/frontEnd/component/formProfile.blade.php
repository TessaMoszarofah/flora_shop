@extends('frontEnd.profile')

@section('centerContent')
<div class="col-md-8 mb-4 p-4 bg-white rounded shadow-sm ps-4">
    <h2 class="h5 mb-3 fw-bold">Profil Saya</h2>
    <p class="text-muted">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
        </div>
        <div class="mb-3">
            <label class="form-label"><i class="fas fa-calendar-alt me-2"></i>Tanggal Lahir</label>
            <input type="date" name="birthdate" class="form-control" value="{{ auth()->user()->birthdate }}">
        </div>
        <button type="submit" class="btn" style="background-color: #4CAF50; color: white;"><i class="fas fa-save me-2"></i>Simpan</button>
    </form>
</div>
@endsection
