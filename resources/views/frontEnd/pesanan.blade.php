@extends('frontEnd.profile')

@section('centerContent')
<div class="col-md-8 mb-4 p-4 bg-white rounded shadow-sm" style="max-width: 750px; overflow-x: auto;">
    <h2 class="h5 mb-4 fw-bold border-bottom pb-2">📦 Pesanan Saya</h2>

    @if($orders->isEmpty())
    <div class="alert alert-info mb-0">
        Belum ada pesanan yang sedang diproses.
    </div>
    @else
    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-hover align-middle" style="width: 100%; table-layout: fixed; word-wrap: break-word;">
            <thead class="table-light sticky-top" style="top: 0;">
                <tr>
                    <th style="width: 25%;">Tanggal</th>
                    <th style="width: 35%;">Produk</th>
                    <th style="width: 20%;">Total</th>
                    <th style="width: 20%;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
                    <td>
                        <div>
                            <strong>{{ $order->produk->nama_produk ?? 'Data tidak tersedia' }}</strong>
                        </div>
                    </td>
                    <td>Rp {{ number_format($order->total) }}</td>
                    <td>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                        <span class="badge" style="background-color: #6c757d; color: white;">Status Kosong</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
