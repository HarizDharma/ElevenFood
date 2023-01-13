@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-history"></i> Data Transaksi</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Jumlah Harga</th>
                                        <th>Terkonfirmasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($pesanans as $pesanan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan->user->name }}</td>
                                            <td>{{ $pesanan->tanggal }}</td>
                                            <td>
                                                @if ($pesanan->status == 1)
                                                    Sudah Dibayar
                                                @else
                                                    Belum Dibayar
                                                @endif
                                            </td>
                                            <td class="pt-1">
                                                @if ($pesanan->bukti == null)
                                                    Tidak Ada Bukti
                                                @else
                                                    <img src="{{ url('bukti') }}/{{ $pesanan->bukti }}" class="img-fluid"
                                                        width="200">
                                                @endif

                                            </td>
                                            <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                                            <td>
                                                @if ($pesanan->konfirmasi_admin == 0)
                                                    <i
                                                        class="fas fa-window-close btn btn-sm btn-danger d-flex justify-content-center disabled"></i>
                                                @else
                                                    <i
                                                        class="fas fa-check btn btn-sm btn-success d-flex justify-content-center disabled"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('transaksi') }}/{{ $pesanan->id }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-info"></i>
                                                    Detail</a>
                                                <form action="{{ url('transaksi') }}/{{ $pesanan->id }}" method="post">
                                                    @csrf
                                                    @if ($pesanan->konfirmasi_admin == 0 and $pesanan->bukti == true)
                                                        <br><button type="submit" class="btn btn-sm btn-success"><i
                                                                class="fas fa-check"></i> Konfirmasi</button>
                                                    @endif

                                                </form>
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
