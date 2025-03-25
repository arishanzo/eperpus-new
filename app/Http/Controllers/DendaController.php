<?php

namespace App\Http\Controllers;

use App\Models\DataDendaModel;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $denda = DataDendaModel::with(['data_santri', 'data_buku'])->get();


        return view('data_laporan/DataLaporanView', [
            'judul' => 'Data Denda', 
            'data_denda' => $denda
    
    ]);
    }

    public function destroy(string $id)
    {
        $post = DataDendaModel::findOrFail($id);
        $post->delete();

        return redirect()->route('datalaporan')->with('success', 'Denda berhasil dihapus.');
    }

    
    public function bayar(string $id)
    {
     
        $denda = DataDendaModel::findOrFail($id);

        if ($denda->status_pembayaran == 'Sudah Dibayar') {

            return redirect()->route('datalaporan')->with('info', 'Pembayaran Sudah Lunas');
        }


        $denda->update(['status_pembayaran' => 'Sudah Dibayar']); 

        
        return redirect()->route('datalaporan')->with('success', 'Pembayaran Berhasil.');;
    }
}
