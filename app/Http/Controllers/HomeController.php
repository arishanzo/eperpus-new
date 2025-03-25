<?php

namespace App\Http\Controllers;

use App\Models\DataBukuModel;
use App\Models\DataPinjamModel;
use App\Models\DataSantriModel;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index(){

        $santricount = DataSantriModel::count();
        $bukucount = DataBukuModel::count();
        $pinjamcount = DataPinjamModel::count();
        $pengembaliancount = DataPinjamModel::where('statuspinjam' , 'Di Kembalikan')->count();


        $pinjam = DataPinjamModel::with(['data_santri', 'data_buku'])->get();


        return view('Welcome', [
            'judul' => 'Dashboard', 
             'data_pinjam' => $pinjam,
             'santricount' => $santricount,
             'bukucount' => $bukucount,
             'pinjamcount' => $pinjamcount,
             'pengembaliancount' => $pengembaliancount,
            ]);
    }
}
