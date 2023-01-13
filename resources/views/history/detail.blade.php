@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Sukses Check Out</h3>
                        <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening
                            dengan nominal : <strong>Rp.
                                {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                        </h5>
                        <label>
                            <h5><strong>Metode Pembayaran : </strong></h5>
                            <h5><strong>Atas Nama : SISTAHANA SARI DEWI</strong></h5>
                        </label>
                        <ul>
                            <li><strong>DANA : 0888 3215 6667</strong></li>
                            <li><strong>OVO : 0888 3215 6667</strong></li>
                        </ul>
                        <br>
                        <h5>Setelah mentransfer pembayaran silahkan upload bukti pembayaran pada form berikut ini :
                        </h5>
                        <div class="row col-md-12 mt-4">
                            <div class="col-md-4">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br />
                                        @endforeach
                                    </div>
                                @endif
                                @if ($pesanan->bukti == null and $pesanan->status == 0)
                                    <form class="form-group" action="{{ url('history') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" class="form-control" required><br>

                                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                                    </form>
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
                                        <div class="alert alert-success"><i class="fas fa-check"></i> Pembayaran Anda Sudah
                                            Dikonfirmasi</div>
                                    @else
                                        <div class="alert alert-info"><i class="fas fa-times"></i> Pembayaran Anda
                                            Belum Dikonfirmasi</div>
                                    @endif

                                </h5>
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
                                                <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}
                                                </td>
                                                <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}
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
