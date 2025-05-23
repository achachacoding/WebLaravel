<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'users'; // karena nama tabel 'users'
    
    protected $fillable = [
        'name', 'username', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
