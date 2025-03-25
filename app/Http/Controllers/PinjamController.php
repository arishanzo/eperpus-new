<?php

namespace App\Http\Controllers;

use App\Models\DataBukuModel;
use App\Models\DataDendaModel;
use App\Models\DataPinjamModel;
use App\Models\DataSantriModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = DataPinjamModel::with(['data_santri', 'data_buku'])->get();


        return view('data_pinjam/DataPinjamView', [
            'judul' => 'Data Pinjam', 
            'session' => 'Aris Wahyudi', 
            'data_pinjam' => $pinjam
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = DataBukuModel::select('*')->get();
        $santri = DataSantriModel::select('*')->get();

        return view('data_pinjam/PinjamCreateView', [
            'judul' => 'Tambah Pinjam', 
            'buku' => $buku,
            'santri' => $santri
    
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pinjam = 'Di Pinjam';
        $request->validate([
            'id_buku' => 'required|integer',
            'id_santri' => 'required|integer',
            'totalpinjam' => 'required|numeric',
            'tglpinjam' => 'required|date',
            'tglpengembalian' => 'required|date',
        ]);

        
        $buku = DataBukuModel::findOrFail($request->id_buku);
       
        if ($buku->jumlahsalinan < $request->totalpinjam) {
            return redirect()->route('data_pinjam.index')->with('info', 'Jumlah Stock Melebihi Batas!');
        }


        DataPinjamModel::create([
            'id_buku' => $request->id_buku,
            'id_santri' => $request->id_santri,
            'jumlah' => $request->totalpinjam,
            'tglpinjam' => $request->tglpinjam,
            'tgljatuhtempo' => $request->tglpengembalian,
            'statuspinjam' => $pinjam
        ]);
      
        return redirect()->route('data_pinjam.index')->with('success', 'Pinjam Buku Berhasil Di Tambahkan.');;

    }

    public function kembalikan(string $id)
    {

        $dendaperhari = 5000;
        $pinjam = DataPinjamModel::findOrFail($id);

        if ($pinjam->statuspinjam == 'Di Kembalikan') {
            return redirect()->route('data_pinjam.index')->with('info', 'Buku sudah dikembalikan!');
        }


        $tglpengembalian = Carbon::now();
        $duedate = Carbon::parse($pinjam->tgljatuhtempo);

        $hitungjatuhtempo = $duedate->diffInDays($tglpengembalian, false);


        if ($hitungjatuhtempo == 0){
            $denda =  0;
        }else{

            $denda = $hitungjatuhtempo * $dendaperhari;
        
            DataDendaModel::create([
                'id_santri' => $pinjam->id_santri,
                'id_buku' => $pinjam->id_buku,
                'tgldenda' => Carbon::now(),
                'denda' => $denda,
                'status_pembayaran' => 'Belum Di Bayar',
                'tglpengembalian' => Carbon::now(),
            ]);
    
        }

        $pinjam->update(['statuspinjam' => 'Di Kembalikan']); 

        
        return redirect()->route('data_pinjam.index')->with('success', 'Buku berhasil dikembalikan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = DataPinjamModel::findOrFail($id);
        $post->delete();

        return redirect()->route('data_pinjam.index')->with('success', 'Buku berhasil dihapus.');
    }
    
}
