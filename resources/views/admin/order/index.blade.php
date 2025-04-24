@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card border-secondary">
                <div class="card-header" id="data-pesanan">Data Orders
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Nama Produk</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Kode Pos</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            @php $no = 1; @endphp
                            <tbody align="center">
                                @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->produk->nama_produk ?? 'Data tidak tersedia'}}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->kota }}</td>
                                    <td>{{ $item->kode_pos }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>
                                        @if($item->status == 'complate')
                                            <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                        @elseif($item->status == 'pending')
                                            <span class="badge bg-warning text-dark">{{ ucfirst($item->status) }}</span>
                                           @elseif($item->status == 'cancel')
                                            <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                        @elseif($item->status == null)
                                            <span class="badge bg-secondary">Status Kosong</span>
                                        @endif
                                    </td>

                                    {{-- <td>
                                                <form align="center" action="{{ route('order.destroy', $item->id) }}"
                                    id="delete-data" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('order.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                        <img src="https://cdn-icons-png.flaticon.com/128/6804/6804049.png" alt="" srcset="" width="20px">
                                    </a>

                                    <button class="btn btn-sm btn-outline-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data order ini?')">
                                        <img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt="" srcset="" width="20px"></button>
                                    </form>
                                    </td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('order.show', $item->id) }}">Lihat Detail</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('order.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger" type="submit">Hapus</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('order.updateStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="pending">
                                                        <button class="dropdown-item" type="submit">Tandai Pending</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('order.updateStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="complete">
                                                        <button class="dropdown-item" type="submit">Tandai Complete</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('order.updateStatus', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="cancel">
                                                        <button class="dropdown-item" type="submit">Tandai Cancel</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
