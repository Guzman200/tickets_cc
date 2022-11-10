<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrioridad extends Model
{
    use HasFactory;

    protected $table = "sd_tipos_prioridad";
    protected $guarded = [];
}
