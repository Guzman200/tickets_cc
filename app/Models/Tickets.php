<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "tickets";

    /** =========== relaciones ============ */

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function estatus()
    {
        return $this->belongsTo(EstatusTicket::class, 'estatus_ticket_id', 'id');
    }
}
