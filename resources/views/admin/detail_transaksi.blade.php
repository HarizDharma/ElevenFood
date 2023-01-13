@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('transaksi') }}">Data Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Transaksi</h3>
                            <div class="row col-md-12 mt-4">
                                <div class="col-md-4">
                                    @if ($pesanan->bukti == null and $pesanan->status == 0)
                                        <div class="alert alert-danger">
                                            Bukti Pembayaran Belum Diupload
                                        </div>
                                    @else
                                        <span class="alert alert-success">
                                            <i class="fas fa-check"></i> Pembayaran Anda Sudah Selesai !
                                        </span>
                                        <hr>
                                        <img src="{{ url('bukti') }}/{{ $pesanan->bukti }}" class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-md-4 ml-5 my-auto">
                                    <h5 class="card-header">Tunggu Pembayaran Anda Dikonfirmasi Oleh Admin :</h5>

                                    <h5>
                                        @if ($pesanan->konfirmasi_admin == 1)
                                            <div class="alert alert-success"><i class="fas fa-check"></i> Pembayaran Anda
                                                Sudah
                                                Dikonfirmasi</div>
                                        @else
                                            <div class="alert alert-info"><i class="fas fa-times"></i> Pembayaran Anda
                                                Belum Dikonfirmasi</div>
                                        @endif

                                    </h5>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md 12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3><i class="fa fa-user"></i> Informasi Pemesan</h3>
                                            <hr>
                                            <div class="col-md-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Alamat</th>
                                                        <th>Nomor HP</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $pesanan->user->name }}</td>
                                                            <td>{{ $pesanan->user->email }}</td>
                                                            <td>{{ $pesanan->user->alamat }}</td>
                                                            <td>{{ $pesanan->user->nohp }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                            {{-- jika $pesanan tidak kosing dan berdasarkan user id ada dan status 0 maka muncul tabel nya --}}
                            @if (!empty($pesanan))
                                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                                <div class="col-md-12">
                                    <table class="table table-hover table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            ?>
                                            @foreach ($pesanan_details as $pesanan_detail)
                                                <tr>
                                                    <td align="left">{{ $no++ }}</td>
                                                    <td align="left">
                                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                            class="img-fluid" width="120">
                                                    </td>
                                                    <td align="left">{{ $pesanan_detail->barang->nama_barang }}</td>
                                                    <td align="left">{{ $pesanan_detail->jumlah }}</td>
                                                    <td align="left">Rp.
                                                        {{ number_format($pesanan_detail->barang->harga) }}
                                                    </td>
                                                    <td align="left">Rp.
                                                        {{ number_format($pesanan_detail->jumlah_harga) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td align="right" colspan="5"><strong>Jumlah Harga : </strong></td>
                                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                            </tr>

                                            <tr>
                                                <td align="right" colspan="5"><strong>Kode Unik : </strong></td>
                                                <td><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                                            </tr>

                                            <tr>
                                                <td align="right" colspan="5"><strong>Total Yang Harus Ditransfer :
                                                    </strong></td>
                                                <td><strong>Rp.
                                                        {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
