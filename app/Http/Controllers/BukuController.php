<?php

namespace App\Http\Controllers;

use App\Models\DataBukuModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = DataBukuModel::select('*')->get();

        return view('data_buku/DataBukuview', [
            'judul' => 'Buku', 
            'data_buku' => $buku
    
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('data_buku/BukuCreateView', [
            'judul' => 'Tambah Buku', 
            'session' => 'Aris Wahyudi',
    
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judulbuku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'tahunterbit' => 'required|string|max:255',
            'jumlahsalinan' => 'required|integer',
        ]);

        DataBukuModel::create([
            'judul_buku' => $request->judulbuku,
            'pengarang' => $request->pengarang,
            'kategori' => $request->kategori,
            'isbn' => $request->isbn,
            'tahunterbit' => $request->tahunterbit,
            'jumlahsalinan' => $request->jumlahsalinan,
        ]);
      
        return redirect()->route('data_buku.index')->with('success', 'Buku Berhasil Di Tambahkan.');

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
    public function edit($id_buku)
    {
        $buku = DataBukuModel::where('id_buku', $id_buku)->first();
    
        return view('data_buku/BukuEditView', [
            'judul' => 'Edit Buku', 
            'session' => 'Aris Wahyudi', 
            'buku' => $buku
    
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'judulbuku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'tahunterbit' => 'required|string|max:255',
            'jumlahsalinan' => 'required|string|max:255',
        ]);


        $buku = DataBukuModel::findOrFail($id);
        $buku->update($request->all()); 

        
        return redirect()->route('data_buku.index')->with('success', 'Buku berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $post = DataBukuModel::findOrFail($id);
        $post->delete();

        return redirect()->route('data_buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
