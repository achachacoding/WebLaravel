<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Berita;
use App\Models\Users;
use App\Models\Kategori;

class DashboardController extends Controller
{
     public function index()
    {
        //if (!session()->has('admin_id')) {
        //return redirect()->route('admin.login');
        //}   

        $jumlahBuku = Buku::count();
        $jumlahBerita = Berita::count();
        $jumlahUsers = Users::count();
        $jumlahKategori = Kategori::count();

        return view('admin.dashboard', [
        'jumlahBuku' => $jumlahBuku,
        'jumlahKategori' => $jumlahKategori,
        'jumlahBerita' => $jumlahBerita,
        'jumlahUsers' => $jumlahUsers,
        ]);
    }
}
