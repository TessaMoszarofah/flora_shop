@extends('frontEnd.profile')
@section('centerContent')
<div class="col-md-8 mb-4 p-4 bg-white rounded shadow-sm ps-4" style="max-width: 750px; overflow-x: auto;">
    <h2 class="h5 mb-3 fw-bold">Riwayat Pesanan</h2>
    @if($orders->isEmpty())
        <p>Belum ada riwayat pesanan.</p>
    @else
    <table class="table" style="width: 100%; table-layout: fixed; word-wrap: break-word;">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
                        <td>{{ $order->produk->nama_produk ?? 'Data tidak tersedia' }}</td>
                        <td>Rp {{ number_format($order->total) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
