<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;


class BeritaPengunjungController extends Controller
{
    public function index()
    {
        $berita = Berita::paginate(2);

        return view('berita.index', ['berita' => $berita]);
    }

    public function detail($id)
    {
        $berita = Berita::find($id);

        return view('berita.detail', ['berita' => $berita]);
    }
}
