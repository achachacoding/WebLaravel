<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Galeri;

class GaleriPengunjungController extends Controller
{
    public function index()
    {
        $album = Album::with('galeri')->get();

        return view('galery.index', ['album' => $album]);
    }

    public function detail($id)
    {
        $galeri = Galeri::where('album_id', $id)->get();

        return view('galery.detail', ['galeri' => $galeri]);
    }
    
}
