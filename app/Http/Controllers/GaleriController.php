<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Album;
use File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::with('album')->get();

        return view('admin.galeri.index', ['galeri' => $galeri]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album = Album::get();
        return view('admin.galeri.create', ['album' => $album]);
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
            'nama_galeri' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg',
            'album_id' => 'required'
        ]);

        try {

        $file = $request->file('foto');

        $filename = time() . '_' . $file->getClientOriginalName();

        $request->foto->move(public_path('galeri'), $filename);

        $galeri = new Galeri();

        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->foto = $filename;
        $galeri->album_id = $request->album_id;

        $galeri->save();

          // Jika berhasil
        return redirect('/admin/galeri')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/galeri')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
        $galeri = Galeri::find($id);
        $album = Album::get();

        return view('admin.galeri.edit', ['galeri' => $galeri, 'album' => $album]);
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
            'nama_galeri' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg',
            'album_id' => 'required'
        ]);

        try {

        $galeri = Galeri::find($id);
        
        // Jika ada file baru di-upload
        if ($request->hasFile('foto')) {
            $path = 'galeri/';

        // Hapus file lama kalau ada
        if ($galeri->foto && File::exists(public_path($path . $galeri->foto))) {
            File::delete(public_path($path . $galeri->foto));
        }

        // Simpan file baru
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName(); // biar unik dan tetap pakai nama asli
        $file->move(public_path($path), $filename);
        $galeri->foto = $filename;

        $galeri->save();
        
    }
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->foto = $filename;
        $galeri->album_id = $request->album_id;
        // Simpan perubahan ke database
        $galeri->save();

           // Jika berhasil
        return redirect('/admin/galeri')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/galeri')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
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

      $galeri = Galeri::find($id);

      $path = 'galeri/';

        if (File::exists(public_path($path . $galeri->foto))) {
            File::delete(public_path($path . $galeri->foto));
        }

      $galeri->delete();

       try {
          // Jika berhasil
        return redirect('/admin/galeri')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/galeri')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
