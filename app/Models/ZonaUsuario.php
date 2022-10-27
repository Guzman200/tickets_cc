<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaUsuario extends Model
{
    use HasFactory;

    protected $table = "sd_zonas_usuarios";
    
    protected $guarded = [];
}
