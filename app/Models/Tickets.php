<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function comentarios()
    {
        return $this->hasMany(TicketComentario::class, 'ticket_id', 'id')
            ->orderBy('created_at', 'DESC');
    }

    public function archivos()
    {
        return $this->hasMany(TicketFile::class, 'ticket_id', 'id')
            ->orderBy('created_at', 'DESC');
    }

    public function tipoPrioridad()
    {
        return $this->belongsTo(TipoPrioridad::class, 'tipo_prioridad_id', 'id');
    }

    /** Scopes locales */

    public function scopeAbierto(Builder $query)
    {
        return $query->whereHas('estatus', function($query){
            $query->where('id', 1);
        });
    }

    public function scopeEnProceso(Builder $query)
    {
        return $query->whereHas('estatus', function($query){
            $query->where('id', 2);
        });
    }

    public function scopeAtendido(Builder $query)
    {
        return $query->whereHas('estatus', function($query){
            $query->where('id', 3);
        });
    }

    /** Metodos */

    public function estaAsignadoAlUsuarioEnSesion()
    {
        return $this->usuario_asignado_id == auth()->user()->id;
    }

    public function getTiempoDeAtencion()
    {

        $fechaBase = Carbon::now();

        // Si el estatus es atendido
        if($this->estatus_ticket_id == 3){ 
            $fechaBase = Carbon::parse($this->fecha_update_atendido); 
        }

        $fechaTicketApertura = Carbon::parse($this->created_at);

        $tiempoEnMinutos = $fechaTicketApertura->diffInMinutes($fechaBase);
        
        $tiempoArray = explode(".", $tiempoEnMinutos / 60);

        $horas = $tiempoArray[0];

        if($tiempoEnMinutos % 60 != 0){

            $minutos = $tiempoEnMinutos % 60;

            return $horas . " hrs con " . $minutos . " min";
        }

        return $horas . " hrs";
    }
}
