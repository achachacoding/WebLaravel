<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = ['judul_berita', 'isi', 'foto', 'kategori_id'];
    
public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}

}
