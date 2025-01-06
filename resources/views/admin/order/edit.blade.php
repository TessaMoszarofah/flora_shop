@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Edit Order
                        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col">
                                    <!-- User -->
                                    <div class="mb-2">
                                        <label for="user_id">User</label>
                                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" 
                                                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Product -->
                                    <div class="mb-2">
                                        <label for="produk_id">Produk</label>
                                        <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                                            <option value="">Select Product</option>
                                            @foreach ($produks as $produk)
                                                <option value="{{ $produk->id }}" 
                                                    {{ old('produk_id', $order->produk_id) == $produk->id ? 'selected' : '' }}>
                                                    {{ $produk->nama_produk }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('produk_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-2">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $order->alamat) }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- City -->
                                    <div class="mb-2">
                                        <label for="kota">Kota</label>
                                        <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" 
                                            value="{{ old('kota', $order->kota) }}">
                                        @error('kota')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Postal Code -->
                                    <div class="mb-2">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" 
                                            value="{{ old('kode_pos', $order->kode_pos) }}">
                                        @error('kode_pos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-2">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                            value="{{ old('phone', $order->phone) }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-2">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                            value="{{ old('email', $order->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="mb-2">
                                        <label for="metode_pembayaran">Payment Method</label>
                                        <input type="text" name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" 
                                            value="{{ old('metode_pembayaran', $order->metode_pembayaran) }}">
                                        @error('metode_pembayaran')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-2">
                                <button class="btn btn-sm btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
