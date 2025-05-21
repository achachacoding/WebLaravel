<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use File;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::with('kategori')->get();

        return view('admin.berita.index', ['berita' => $berita]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('admin.berita.create', ['kategori' => $kategori]);
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
            'judul_berita' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        try {

        $file = $request->file('foto');

        $filename = time() . '_' . $file->getClientOriginalName();

        $request->foto->move(public_path('image'), $filename);

        $berita = new Berita();

        $berita->judul_berita = $request->judul_berita;
        $berita->isi = $request->isi;
        $berita->kategori_id = $request->kategori_id;
        $berita->foto = $filename;

        $berita->save();

          // Jika berhasil
        return redirect('/admin/berita')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/berita')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::get();

        return view('admin.berita.edit', ['berita' => $berita, 'kategori' => $kategori]); 
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
            'judul_berita' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg'
        ]);

        try {

        $berita = Berita::find($id);
        
        // Jika ada file baru di-upload
        if ($request->hasFile('foto')) {
            $path = 'image/';

        // Hapus file lama kalau ada
        if ($berita->foto && File::exists(public_path($path . $berita->foto))) {
            File::delete(public_path($path . $berita->foto));
        }

        // Simpan file baru
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName(); // biar unik dan tetap pakai nama asli
        $file->move(public_path($path), $filename);
        $berita->foto = $filename;

        $berita->save();
        
    }
        $berita->judul_berita = $request->judul_berita;
        $berita->isi = $request->isi;
        $berita->kategori_id = $request->kategori_id;
        // Simpan perubahan ke database
        $berita->save();

           // Jika berhasil
        return redirect('/admin/berita')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/berita')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
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
        
      $berita = Berita::find($id);

      $path = 'image/';

        if (File::exists(public_path($path . $berita->foto))) {
            File::delete(public_path($path . $berita->foto));
        }

      $berita->delete();

       try {
          // Jika berhasil
        return redirect('/admin/berita')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/berita')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }

    }
}
