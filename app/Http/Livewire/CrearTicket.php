<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use App\Models\ZonaEmpresa;
use App\Models\ZonaUsuario;
use Livewire\Component;

class CrearTicket extends Component
{

    public $tipo_formulario_id;

    // Datos para crear un ticket
    public $descripcion_solicitud;
    public $zona_empresa_id;
    public $no_cuenta_deudor;
    public $deudor;
    public $fecha_transferencia;    
    public $monto;

    protected $validationAttributes = [
        'descripcion_solicitud' => 'descripción de la solicitud',
        'zona_empresa_id'       => 'zona',
        'no_cuenta_deudor'      => 'no cuenta deudor',
        'deudor'                => 'deudor',
        'fecha_transferencia'   => 'fecha transferencia',
        'monto'                 => 'monto'
    ];

    public function render()
    {

        $zonas_empresa = ZonaEmpresa::where('empresa_id', auth()->user()->empresa_id)->get();

        return view('livewire.crear-ticket', compact('zonas_empresa'));
    }

    public function crear()
    {

        // Formulario integracion de pagos
        if($this->tipo_formulario_id == 1)
        {
            $data = $this->validarFormularioIntegracionDePago();

            $data['usuario_solicita_id'] = auth()->user()->id;
            $data['empresa_id']          = auth()->user()->empresa_id;
            $data['estatus_ticket_id']   = 1;
            $data['usuario_asignado_id'] = $this->getUsuarioAsigandoId();
            $data['tipo_formulario_id']  = $this->tipo_formulario_id;

            Tickets::create($data);

            session()->flash('success', 'Ticket creado exitosamente');

            $this->reset(['descripcion_solicitud', 'zona_empresa_id', 'deudor', 'fecha_transferencia', 'monto']);
        }

    }

    public function validarFormularioIntegracionDePago()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'deudor'                => 'required',
            'fecha_transferencia'   => 'required',
            'monto'                 => 'required|numeric'
        ]);

        return $validatedData;
    }

    public function getUsuarioAsigandoId()
    {
        $zonaUsuario = ZonaUsuario::where('zona_empresa_id', $this->zona_empresa_id)->first();

        if($zonaUsuario){
            return $zonaUsuario->user_id;
        }

        return NULL;
    }
}
