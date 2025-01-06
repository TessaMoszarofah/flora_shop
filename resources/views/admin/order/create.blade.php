@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Orders
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="">Nama User</label>
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">Pilih user</option>
                                            @foreach ($user as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_user }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Nama Produk</label>
                                        <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                                            <option value="">Pilih produk</option>
                                            @foreach ($produk as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                        @error('produk_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat"></input>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Nama Kota</label>
                                        <input type="text"
                                            class="form-control @error('kota') is-invalid @enderror"
                                            name="kota"></input>
                                        @error('kota')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Kode Pos</label>
                                        <input type="text"
                                            class="form-control @error('kode_pos') is-invalid @enderror"
                                            name="kode_pos"></input>
                                        @error('kode_pos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Phone</label>
                                        <input type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            name="phone"></input>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Email</label>
                                        <input type="text"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"></input>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Metode Pembayaran</label>
                                        <input type="text"
                                            class="form-control @error('metode_pembayaran') is-invalid @enderror"
                                            name="metode_pembayaran"></input>
                                        @error('metode_pembayaran')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <button class="btn btn-sm btn-success" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection