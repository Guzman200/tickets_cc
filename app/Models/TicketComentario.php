<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComentario extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "sd_tickets_comentarios";

    /** Metodos */

    public function fechaComentario()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y h:i:s A');
    }
}
