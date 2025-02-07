@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Detail Pesanan
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" value="{{ $order->user->name }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" value="{{ $order->produk->nama_produk ?? 'Data tidak tersedia' }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="{{ $order->alamat }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Kota</label>
                            <input type="text" class="form-control" value="{{ $order->kota }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Kode Pos</label>
                            <input type="text" class="form-control" value="{{ $order->kode_pos }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" value="{{ $order->phone }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ $order->email }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Metode Pembayaran</label>
                            <input type="text" class="form-control" value="{{ $order->metode_pembayaran }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">Status</label>
                            <input type="text" class="form-control" value="{{ $order->status }}" disabled>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST" id="delete-order">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                <img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt="delete" width="20px">
                                Hapus Pesanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
