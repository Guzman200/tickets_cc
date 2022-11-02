<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    use HasFactory;

    protected $table   = "sd_tickets_files";
    protected $guarded = [];

    /** Metodos */

    public function fechaSubidaArchivo()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y h:i:s A');
    }
}
