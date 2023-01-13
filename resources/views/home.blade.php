@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img class="rounded mx-auto d-block" src="{{ url('images/logo.png') }}" width="200" alt="">
            </div>
            <div class="col-md-6">
                <span>
                    <h1>
                        <strong>
                            Selamat Datang di Eleven Food
                        </strong>
                        </h2>
                </span><br>
                <span>
                    <h4>
                        Silahkan pilih menu yang kalian inginkan atau kesukaan kalian.
                    </h4>
                    <h4>Selamat Menikmati...</h4>
                </span>
            </div>
            @foreach ($barangs as $barang)
                <div class="col-md-3">
                    <div class="card-deck">
                        <div class="card mt-5" style="width: 18rem;">
                            <img class="card-img-top" src="{{ url('uploads') }}/{{ $barang->gambar }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                <div class="card-text">
                                    <strong>Harga : </strong>Rp. {{ number_format($barang->harga) }} <br>
                                    <hr>
                                    <strong>Keterangan : </strong> <br>
                                    <div class="deskripsi">{{ Str::limit($barang->keterangan, 40) }}</div>
                                </div>
                                <br>
                                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i
                                        class="fa fa-shopping-cart"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
