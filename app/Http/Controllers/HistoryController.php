<?php

namespace App\Http\Controllers;

use App\Barang;
//konek ke model pesanan
use App\Pesanan;
use App\PesananDetail;
use App\User;
use Auth;
use SweetAlert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    // mengunjingu web harus login terlebih dahulu
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()) {
            $pesanans = Pesanan::where('user_id', Auth::user()->id)->get();
        } else {
            return redirect('login');
        }

        return view('history.index', compact('pesanans'));
    }

    public function detail($id)
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

        return view('history.detail', compact('pesanan', 'pesanan_details'));
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        //simpan file yang dupload kedalam $file
        $file = $request->file('file');

        //dapat kan nama file lalu disimpan didalam variabel
        $nama_file = $file->getClientOriginalName();

        //direktori tempat upload
        $tujuan_upload = 'bukti';

        $pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

        $pesanan_id = $pesanan->id;

        //data value
        $pesanan->bukti = $nama_file;
        $pesanan->status = 1;

        //jika file yang diupload ada
        if ($request->hasFile('file')) {
            //update data
            $pesanan->update();

            //fle upload
            $file->move($tujuan_upload, $nama_file);

            alert()->success('Pembayaran Sukses', 'Sukses');
            return redirect('history/' . $pesanan_id);
        } else {
            //jika file yang diupload form nya kosongan
            alert()->info(
                'Silahkan upload bukti pembayaran dengan benar !',
                'Gagal'
            );
            return redirect('history/' . $pesanan_id);
        }
    }
}
