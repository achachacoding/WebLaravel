<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuPengunjungController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(2);

        return view('buku.index', ['buku' => $buku]);
    }
}
