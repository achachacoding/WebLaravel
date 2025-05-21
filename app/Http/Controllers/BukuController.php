<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::get();

        return view('admin.buku.index', ['buku' => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'file' => 'required|mimes:pdf'

        ]);
        
        try {

        $file = $request->file('file');

        $filename = time() . '_' . $file->getClientOriginalName(); // biar unik dan tetap pakai nama asli

        $request->file->move(public_path('file'), $filename);

        $buku = new Buku();

        $buku->judul_buku = $request->judul_buku;
        $buku->file = $filename;

        $buku->save();

         // Jika berhasil
        return redirect('/admin/buku')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/buku')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('admin.buku.edit', ['buku' => $buku]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'file' => 'nullable|file|mimes:pdf'
        ]);

        try {

        $buku = Buku::find($id);
        
        // Jika ada file baru di-upload
        if ($request->hasFile('file')) {
            $path = 'file/';

        // Hapus file lama kalau ada
        if ($buku->file && File::exists(public_path($path . $buku->file))) {
            File::delete(public_path($path . $buku->file));
        }

        // Simpan file baru
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName(); // biar unik dan tetap pakai nama asli
        $file->move(public_path($path), $filename);
        $buku->file = $filename;
   
        
        $buku->save();
    }

        $buku->judul_buku = $request->judul_buku;
        // Simpan perubahan ke database
        $buku->save();

           // Jika berhasil
        return redirect('/admin/buku')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/buku')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
        }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        $path = 'file/';

        if (File::exists(public_path($path . $buku->file))) {
            File::delete(public_path($path . $buku->file));
        }

        $buku->delete();

        try {
          // Jika berhasil
        return redirect('/admin/buku')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/buku')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function download($id)
    {

    $buku = Buku::findOrFail($id);
    $filePath = public_path('file/' . $buku->file);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');

    }
    }
}
