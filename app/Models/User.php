<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "sd_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'empresa_id',
        'tipo_usuario_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /** =========== relaciones ============ */

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'usuario_solicita_id', 'id');
    }


    /** Metodos */

    public function esAdmin()
    {
        return $this->tipo_usuario_id == 1;
    }

    public function esCliente()
    {
        return $this->tipo_usuario_id == 2;
    }

    public function esAgente()
    {
        return $this->tipo_usuario_id == 3;
    }

    public function esAdminCliente()
    {
        return $this->tipo_usuario_id == 4;
    }

    /** Scopes locales */

    public function scopeAgentes($query)
    {
        return $query->where('tipo_usuario_id', 3);
    }

     
}
