@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach ($pesanan_details as $pesanan_detail)
                                            <tr>
                                                <td align="left">{{ $no++ }}</td>
                                                <td>
                                                    <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                        class="img-fluid" width="120">
                                                </td>
                                                <td align="left">{{ $pesanan_detail->barang->nama_barang }}</td>
                                                <td align="left">{{ $pesanan_detail->jumlah }}</td>
                                                <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}
                                                </td>
                                                <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}
                                                </td>
                                                <td>
                                                    <form action="{{ url('check_out') }}/{{ $pesanan_detail->id }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Anda yakin menghapus pesanan ini ?');">
                                                            <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td align="right" colspan="5"><strong>Jumlah Harga : </strong></td>
                                            <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                            <td>
                                                <a href="{{ url('konfirmasi-pembayaran') }}" class="btn btn-success"
                                                    onclick="return confirm('Anda yakin melanjutkan ke pembayaran ?');">
                                                    <i class="fa fa-shopping-cart"></i> Check Out
                                                </a>
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
