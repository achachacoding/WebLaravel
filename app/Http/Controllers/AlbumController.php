<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = Album::get();

        return view('admin.album.index', ['album' => $album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.create');
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
            'nama_album' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        try {

        $file = $request->file('foto');

        $filename = time() . '_' . $file->getClientOriginalName();

        $request->foto->move(public_path('album'), $filename);

        $album = new Album();

        $album->nama_album = $request->nama_album;
        $album->foto = $filename;

        $album->save();

          // Jika berhasil
        return redirect('/admin/album')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/album')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
        $album = Album::find($id);

        return view('admin.album.edit', ['album' => $album]);
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
            'nama_album' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg'
        ]);

        try {

        $album = Album::find($id);
        
        // Jika ada file baru di-upload
        if ($request->hasFile('foto')) {
            $path = 'album/';

        // Hapus file lama kalau ada
        if ($album->foto && File::exists(public_path($path . $album->foto))) {
            File::delete(public_path($path . $album->foto));
        }

        // Simpan file baru
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName(); // biar unik dan tetap pakai nama asli
        $file->move(public_path($path), $filename);
        $album->foto = $filename;

        $album->save();
        
    }
        $album->nama_album = $request->nama_album;
        // Simpan perubahan ke database
        $album->save();

           // Jika berhasil
        return redirect('/admin/album')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/album')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
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

      $album = Album::find($id);

      $path = 'album/';

        if (File::exists(public_path($path . $album->foto))) {
            File::delete(public_path($path . $album->foto));
        }

      $album->delete();

       try {
          // Jika berhasil
        return redirect('/admin/album')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/album')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
