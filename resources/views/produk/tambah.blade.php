@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('produk') }}">Data Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-box"></i> Tambah Data Produk</h3>

                            <form action="{{ url('produk/tambahProduk') }}" method="post" enctype="multipart/form-data"
                                class="form-group">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mt-3">Nama Produk :</label>
                                        <input type="text" name="nama_barang" class="form-control" required>

                                        <label class="mt-3">Harga Produk :</label>
                                        <input type="text" name="harga" class="form-control" required>

                                        <label class="mt-3">Keterangan Produk :</label>
                                        <input type="text" name="keterangan" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-3">Upload Foto Produk :</label>
                                        <input type="file" name="gambar" class="form-control" required>

                                        <button type="submit" class="btn btn-primary mt-5"><i class="fa fa-plus"></i>
                                            Tambahkan
                                            Produk</button>

                                        <button type="reset" class="btn btn-danger mt-5 ml-5"><i class="fa fa-trash"></i>
                                            Reset</button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
