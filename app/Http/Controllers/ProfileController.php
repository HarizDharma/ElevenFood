<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Alert;

class ProfileController extends Controller
{
    // mengunjingu web harus login terlebih dahulu

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
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
        return redirect('profile');
    }
}
