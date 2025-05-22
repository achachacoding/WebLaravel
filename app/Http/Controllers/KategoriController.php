<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berit;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::get();

        return view('admin.kategori.index', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'nama_kategori' => 'required'
        ]);

        try {

        $kategori = new Kategori();

        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();

         // Jika berhasil
        return redirect('/admin/kategori')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/kategori')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
        $kategori = Kategori::find($id);

        return view('admin.kategori.edit', ['kategori' => $kategori, 'kategori' => $kategori]);
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
            'nama_kategori' => 'required'
        ]);

        try {

        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();

         // Jika berhasil
        return redirect('/admin/kategori')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/kategori')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
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
        $kategori = Kategori::find($id);

        if (!$kategori) {
        return redirect('/admin/kategori')->with('error', 'Kategori tidak ditemukan!');
        }

        try {
        // Hapus berita yang terkait dengan kategori ini
        foreach ($kategori->berita as $berita) {
            $berita->delete();
        }

        // Hapus kategori
        $kategori->delete();

        return redirect('/admin/kategori')->with('success', 'Data berhasil dihapus beserta berita terkait!');
        } catch (\Exception $e) {
        return redirect('/admin/kategori')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }

    }
}
