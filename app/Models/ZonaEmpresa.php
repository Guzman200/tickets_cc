<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaEmpresa extends Model
{
    use HasFactory;

    protected $table = "sd_zonas_empresa";

    protected $guarded = [];
}
