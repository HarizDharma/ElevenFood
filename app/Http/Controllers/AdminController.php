<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;
use App\PesananDetail;
use Auth;
use Alert;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //data penjulaan dsb
        $pesanan = Pesanan::where('status', 1);
        $total_harga_pesanan = Pesanan::where('konfirmasi_admin', 1);

        //hitung total orderan yang sudah di transfer
        // $hitung_jumlah_harga = $total_harga_pesanan
        //     ->select('jumlah_harga')
        //     ->sum('jumlah_harga');

        //query untuk grafik chart
        $total_harga_bulanan = Pesanan::where('konfirmasi_admin', 1)
            ->select(DB::raw('CAST(SUM(jumlah_harga) as int) as jumlah_harga'))
            ->GroupBy(DB::raw('Month(created_at)'))
            ->pluck('jumlah_harga');

        $bulan = Pesanan::select(DB::raw('MONTHNAME(created_at) as bulan'))
            ->GroupBy(DB::raw('MONTHNAME(created_at)'))
            ->pluck('bulan');

        return view(
            'admin.index',
            compact(
                'pesanan',
                'total_harga_pesanan',
                'total_harga_bulanan',
                'bulan'
            )
        );
    }

    public function AdminProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        //ambil data user nya dulu
        $user = User::where('id', Auth::user()->id)->first();

        //get data dari request halaman my profile
        $user->name = $request->name;
        $user->email = $request->email;

        //untuk user level ya ges
        if ($user->level == 1) {
            $user->level = '1';
        } else {
            $user->level = '2';
        }
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        //jika form password tidak kosong maka
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        alert()->success('Profil Berhasil Diubah', 'Sukses');
        return redirect('adminprofile');
    }

    public function transaksi()
    {
        if (Auth::user()) {
            $pesanans = Pesanan::get();
        } else {
            return redirect('login');
        }

        return view('admin.transaksi', compact('pesanans'));
    }

    public function konfirmasi_transaksi($id)
    {
        if (Auth::user()) {
            //ambil id pesanan user
            $pesanan = Pesanan::where('id', $id)->first();
        } else {
            return redirect('login');
        }

        //data value
        $pesanan->konfirmasi_admin = 1;

        //updatew data pesanan
        $pesanan->update();

        alert()->success('Konfirmasi Transaksi Berhasil', 'Berhasil');

        return redirect('transaksi');
    }

    public function detail_transaksi($id)
    {
        if (Auth::user()) {
            //ambil id pesanan user
            $pesanan = Pesanan::where('id', $id)->first();
            $pesanan_details = PesananDetail::where(
                'pesanan_id',
                $pesanan->id
            )->get();
        } else {
            return redirect('login');
        }

        return view(
            'admin.detail_transaksi',
            compact('pesanan', 'pesanan_details')
        );
    }
}
