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
                            <li class="breadcrumb-item active" aria-current="page">Update Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-box"></i> Update Data Produk</h3>

                            <form action="{{ url('updateProduk') }}" method="post" enctype="multipart/form-data"
                                class="form-group">
                                @csrf
                                <input type="text" name="id" value="{{ $brg->id }}" hidden>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mt-3">Nama Produk :</label>
                                        <input type="text" name="nama_barang" class="form-control"
                                            value="{{ $brg->nama_barang }}" required>

                                        <label class="mt-3">Harga Produk :</label>
                                        <input type="text" name="harga" class="form-control"
                                            value="{{ $brg->harga }}" required>

                                        <label class="mt-3">Keterangan Produk :</label>
                                        <input type="text" name="keterangan" class="form-control"
                                            value="{{ $brg->keterangan }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mt-3">Upload Foto Produk :</label><br>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }} <br />
                                                @endforeach
                                            </div>
                                        @endif
                                        <img src="{{ url('uploads') }}/{{ $brg->gambar }}" class="img-fluid">
                                        <input type="file" name="file" class="form-control mt-3">

                                        <button type="submit" class="btn btn-primary mt-5"><i class="fa fa-plus"></i>
                                            Update
                                            Produk</button>
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
