@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <a href="{{ url('admin') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-box"></i> Data Produk</h3>
                            <a href="{{ url('produk/tambahProduk') }}" class="btn btn-dark"><i class="fa fa-plus"></i>
                                Tambah Produk</a>
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $produk->nama_barang }}</td>
                                            <td>
                                                <img src="{{ url('uploads') }}/{{ $produk->gambar }}"
                                                    class="img-fluid mt-1 mb-1" width="200">
                                            </td>
                                            <td>Rp. {{ number_format($produk->harga) }}</td>
                                            <td>
                                                {{ $produk->keterangan }}
                                            </td>
                                            <td>
                                                <form action="{{ url('produk') }}/{{ $produk->id }}" method="post"
                                                    class="form">
                                                    @csrf
                                                    @if ($produk->stok == 1)
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            style="width: 100%"><i class="fa fa-times"></i>
                                                            Non-aktifkan</button>
                                                    @else
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                            style="width: 100%"><i class="fa fa-check"></i>
                                                            Aktifkan</button>
                                                    @endif

                                                </form>
                                                <a href="{{ url('update') }}/{{ $produk->id }}"
                                                    class="btn btn-primary btn-sm mt-3" style="width: 100%"><i
                                                        class="fa fa-edit"></i> Ubah</a>

                                                <form action="{{ url('produk') }}/{{ $produk->id }}" method="post"
                                                    class="mt-2 form">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2"
                                                        style="width: 100%"
                                                        onclick="return confirm('Anda yakin menghapus produk ini ?');">
                                                        <i class="fa fa-trash"></i> Hapus</button>
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
