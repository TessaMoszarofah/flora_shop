@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4">Filter Data Berdasarkan Tanggal</h3>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="startDate" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-4">
            <label for="endDate" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>{{ $order->metode_pembayaran }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total Keseluruhan</td>
                        <td colspan="2" class="fw-bold">Rp {{ number_format($totalSeluruh, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>                
            </table>
        </div>
    </div>
</div>
@endsection
