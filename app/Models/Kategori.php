<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = ['nama_kategori'];

    public function berita()
    {
     return $this->hasMany(Berita::class, 'kategori_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($kategori) {
            $kategori->berita()->delete();
        });
    }

}
