@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="rounded mx-auto d-block" src="{{ url('uploads') }}/{{ $barang->gambar }}"
                                    width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <h2 class="font-weight-bold">{{ $barang->nama_barang }}</h2>
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($barang->harga) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $barang->keterangan }}</td>
                                        </tr>


                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{ url('pesan') }}/{{ $barang->id }}" method="POST">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesanan" class="form-control"
                                                        required>
                                                    <button type="submit" class="btn btn-primary mt-2"> <i
                                                            class="fa fa-shopping-cart"></i>
                                                        Tambahkan Pesanan
                                                    </button>
                                                </form>
                                            </td>
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
@endsection
