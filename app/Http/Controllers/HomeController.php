<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
     */

    // mengunjingu web harus login terlebih dahulu
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //menggunakna paginate untuk membatasi data yang di outputkan
        //$barangs = Barang::paginate(20);
        $barangs = Barang::where('stok', 1)->get();
        return view('home', compact('barangs'));
    }
}
