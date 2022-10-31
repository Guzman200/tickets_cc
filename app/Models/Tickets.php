<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "sd_tickets";

    /** =========== relaciones ============ */

    public function usuarioSolicita()
    {
        return $this->belongsTo(User::class, 'usuario_solicita_id', 'id');
    }

    public function usuarioAsignado()
    {
        return $this->belongsTo(User::class, 'usuario_asignado_id', 'id');
    }

    public function estatus()
    {
        return $this->belongsTo(EstatusTicket::class, 'estatus_ticket_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function zonaEmpresa()
    {
        return $this->belongsTo(ZonaEmpresa::class, 'zona_empresa_id', 'id');
    }

    public function tipoFormulario()
    {
        return $this->belongsTo(TipoFormulario::class, 'tipo_formulario_id', 'id');
    }

    public function tipoEvidencia()
    {
        return $this->belongsTo(TipoEvidencia::class, 'tipo_evidencia_id', 'id');
    }
}
