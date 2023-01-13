<?php

namespace App\Http\Controllers;

use App\Barang;
//konek ke model pesanan
use App\Pesanan;
use App\PesananDetail;
use App\User;
use Auth;
use SweetAlert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        if (Auth::user()) {
            $barang = Barang::where('id', $id)->first();
            $tanggal = Carbon::now();
        } else {
            return redirect('login');
        }

        //validasi jika pesanan id sudah ada/ cek pesanan id
        //(ini menampung) satu id pesanan istilah dengan keranjang yang menampung banyak barang, jadi hanya butuh 1 id pesanan
        //jika tidak ada validasi ini maka akan membuat pesanan baru lagi pada database.
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();
        if (empty($cek_pesanan)) {
            //jika pesanan user kosong
            //menyimpan ke database pesanan atau masukkan keranjang
            $pesanan = new Pesanan();
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->bukti = '';
            //untuk sementara ini nol kita hitung di akhir setelah pesanan_detail
            $pesanan->jumlah_harga = 0;
            $pesanan->konfirmasi_admin = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        } //jika ada maka tidak usah membuat pesanan
        //langsung ke step bawah

        //pesanan baru
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

        //jika barang yang dipesan sama tidak usah buat pesanandetail dengan id baru, cukup dengan id yang lama tinggal menambahkannya
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)
            ->where('pesanan_id', $pesanan_baru->id)
            ->first();
        if (empty($cek_pesanan_detail)) {
            //jika user memesan barang yang berbeda maka membuat pesanan detail baru
            //simpan ke database pesanan detail
            $pesanan_detail = new PesananDetail();

            //get data untuk detail pesanan
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga =
                $barang->harga * $request->jumlah_pesanan;
            $pesanan_detail->save();
        } else {
            //jika user memesan barang yang sama tinggal update datanya
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)
                ->where('pesanan_id', $pesanan_baru->id)
                ->first();

            $pesanan_detail->jumlah =
                $pesanan_detail->jumlah + $request->jumlah_pesanan;

            //hitung jumlah harga dari pesanan baru
            $harga_pesanan_detail_baru =
                $barang->harga * $request->jumlah_pesanan;

            //jumlah harga pesanan lama ditambah pesanan yang baru
            $pesanan_detail->jumlah_harga =
                $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

        //jumlah harga pesanan = pesanan jumlah harga + harga barang x total jumlah barang yang di pesan
        $pesanan->jumlah_harga =
            $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesanan;
        $pesanan->update();

        alert()->success('Pesanan Sudah Ditambahkan', 'Sukses');
        return redirect('check_out');
    }

    public function check_out()
    {
        if (Auth::user()) {
            //ambil id pesanan user
            $pesanan = Pesanan::where('user_id', Auth::user()->id)
                ->where('status', 0)
                ->first();
        } else {
            return redirect('login');
        }

        //deklarasi variable array
        $pesanan_details = [];

        //jika status tidak kosong dan user id ada value-nya
        if (!empty($pesanan)) {
            // tampilkan pesanan detail yang disimpan oleh pesanan berdasarkan ketentuan diatas user dan status 0
            $pesanan_details = PesananDetail::where(
                'pesanan_id',
                $pesanan->id
            )->get();
        }

        return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        //load pesanan nya untuk mengambil jumlah harga dari table pesanans
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();

        //jumlah harga di table pesanans itu jumlah sebelumnya dikurangi oleh jumlah harga dari pesanan_detail. dimana pesanan detail ini adalah data yang dihapus
        $pesanan->jumlah_harga =
            $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;

        //setelah jumlah harga di pesanans sudah dikurangi maka diupdate jumlah harga yang terbaru
        $pesanan->update();

        //hapus data pesanan makanan yang dipilih sebelumnya
        $pesanan_detail->delete();

        alert()->error('Pesanan Sudah Dihapus', 'Hapus');
        return redirect('check_out');

        //jika di delete dikurangi jumlah harga di pesanan
    }

    public function konfirmasi()
    {
        //validasi dimana user apakah sudah melengkapi profile nya
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->alamat) and empty($user->nohp)) {
            alert()->info('Lengkapi Alamat dan Nomor HP Anda', 'Pemberitahuan');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

        $pesanan_id = $pesanan->id;
        // $pesanan->status = 0;
        // $pesanan->update();

        alert()->success('Silahkan Melakukan Pembayaran', 'Sukses');
        return redirect('history/' . $pesanan_id);
    }
}
