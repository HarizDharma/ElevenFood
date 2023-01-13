<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use Auth;
use Alert;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produks = Barang::get();
        return view('produk.index', compact('produks'));
    }

    public function halamanTambah()
    {
        return view('produk.tambah');
    }

    public function tambahProduk(Request $request)
    {
        if (Auth::user()) {
            $barang = Barang::first();
        } else {
            return redirect('login');
        }

        $this->validate($request, [
            'gambar' => 'required',
        ]);

        //simpan file yang dupload kedalam $gambar
        $gambar = $request->file('gambar');

        //dapat kan nama file lalu disimpan didalam variabel
        $nama_gambar = $gambar->getClientOriginalName();

        //direktori tempat upload
        $tujuan_upload = 'uploads';

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->gambar = $nama_gambar;
        $barang->harga = $request->harga;
        // stok = 1 berati menu ada
        $barang->stok = 1;
        $barang->keterangan = $request->keterangan;

        //jika file yang diupload ada
        if ($request->hasFile('gambar')) {
            //tambah data
            $barang->save();

            //fle upload
            $gambar->move($tujuan_upload, $nama_gambar);

            alert()->success('Produk Sudah Ditambahkan', 'Sukses');
            return redirect('produk');
        } else {
            //jika file yang diupload form nya kosongan
            alert()->info(
                'Silahkan ulangi lagi penambahan produk dengan benar !',
                'Gagal'
            );
            return redirect('produk');
        }
    }

    public function status($id)
    {
        $produk = Barang::where('id', $id)->first();

        if ($produk->stok == 0) {
            $produk->stok = 1;
            alert()->success('Produk anda sudah aktif !', 'Sukses');
        } else {
            $produk->stok = 0;
            alert()->info('Produk anda sudah di non-aktifkan !', 'Sukses');
        }

        $produk->update();
        return redirect('produk');
    }

    public function halamanUpdate($id)
    {
        if (Auth::user()) {
            //ambil id produk
            $brg = Barang::where('id', $id)->first();
        } else {
            return redirect('login');
        }

        return view('produk.update', compact('brg'));
    }

    public function update(Request $request)
    {
        $barang = Barang::where('id', $request->id)->first();

        $this->validate($request, [
            'file' => 'image',
        ]);

        //simpan file yang dupload kedalam $gambar
        $gambar = $request->file('file');

        //direktori tempat upload
        $tujuan_upload = 'uploads';

        $barang->nama_barang = $request->nama_barang;
        if ($request->hasFile('file')) {
            //dapat kan nama file lalu disimpan didalam variabel
            $nama_gambar = $gambar->getClientOriginalName();
            $barang->gambar = $nama_gambar;

            //fle upload
            $gambar->move($tujuan_upload, $nama_gambar);
        }
        $barang->gambar = $barang->gambar;
        $barang->harga = $request->harga;
        // stok = 1 berati menu ada
        if ($barang->stok == 1) {
            $barang->stok = 1;
        } else {
            $barang->stok = 0;
        }
        $barang->keterangan = $request->keterangan;

        //tambah data
        $barang->update();

        alert()->success('Produk Sudah Diupdate', 'Sukses');
        return redirect('produk');
    }

    public function delete($id)
    {
        $produk = Barang::where('id', $id)->first();

        //hapus data produk makanan yang dipilih sebelumnya
        $produk->delete();

        alert()->error('Produk Sudah Dihapus', 'Hapus');
        return redirect('produk');
    }
}
