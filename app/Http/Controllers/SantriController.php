<?php

namespace App\Http\Controllers;

use App\Models\DataSantriModel;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santri = DataSantriModel::select('*')->get();

        return view('data_santri/SantriView', [
            'judul' => 'Santri', 
            'data_santri' => $santri
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('data_santri/SantriCreateView', [
            'judul' => 'Tambah Santri', 
            'session' => 'Aris Wahyudi',
    
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namasantri' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asrama' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        DataSantriModel::create([
            'nama_santri' => $request->namasantri,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'asrama' => $request->asrama,
            'status' => $request->status,
        ]);
      
        return redirect()->route('data_santri.index')->with('success', 'Santri Berhasil Di Tambahkan.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_Santri)
    {
        $santri = DataSantriModel::where('id_santri', $id_Santri)->first();
    
        return view('data_santri/SantriEditView', [
            'judul' => 'Edit Santri', 
            'session' => 'Aris Wahyudi', 
            'santri' => $santri
    
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namasantri' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asrama' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $santri = DataSantriModel::findOrFail($id);
        $santri->update($request->all()); 

        
        return redirect()->route('data_santri.index')->with('success', 'Santri berhasil diperbarui.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = DataSantriModel::findOrFail($id);
        $post->delete();

        return redirect()->route('data_santri.index')->with('success', 'Santri berhasil dihapus.');
    }
}
