<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use App\Models\TipoEvidencia;
use App\Models\TipoPrioridad;
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
    public $tipo_evidencia_id;
    public $folios_factura;
    public $cpr_bkhl;
    public $tipo_prioridad_id;

    protected $validationAttributes = [
        'descripcion_solicitud' => 'descripción de la solicitud',
        'zona_empresa_id'       => 'zona',
        'no_cuenta_deudor'      => 'no cuenta deudor',
        'deudor'                => 'deudor',
        'fecha_transferencia'   => 'fecha transferencia',
        'monto'                 => 'monto',
        'tipo_evidencia_id'     => 'tipo de evidencia',
        'tipo_prioridad_id'     => 'tipo prioridad'
    ];

    public function render()
    {

        $zonas_empresa    = ZonaEmpresa::where('empresa_id', auth()->user()->empresa_id)->orderBy('zona')->get();
        $tipos_evidencias = TipoEvidencia::orderBy('tipo')->get();
        $tipos_prioridad = TipoPrioridad::orderBy('tipo')->get();

        return view('livewire.crear-ticket', compact('zonas_empresa', 'tipos_evidencias', 'tipos_prioridad'));
    }

    public function crear()
    {

        $data = [];

        
        if($this->tipo_formulario_id == 1) // Integracion de pagos
        {
            $data = $this->validarFormularioIntegracionDePago();


        }else if($this->tipo_formulario_id == 2){ // Evidencia gestión

            $data = $this->validarFormularioEvidenciaGestion();

        }else if($this->tipo_formulario_id == 3){ // Seguimiento de cuenta

            $data = $this->validarFormularioSeguimientoDeCuenta();

        }else if($this->tipo_formulario_id == 4){ // Expediente Legal

            $data = $this->validarFormularioExpedienteLegal();

        }else if($this->tipo_formulario_id == 5){ // CPR Y BKHL

            $data = $this->validarFormularioCPRYBKHL();

        }

        $data['usuario_solicita_id'] = auth()->user()->id;
        $data['empresa_id']          = auth()->user()->empresa_id;
        $data['estatus_ticket_id']   = 1;
        $data['usuario_asignado_id'] = $this->getUsuarioAsigandoId();
        $data['tipo_formulario_id']  = $this->tipo_formulario_id;
        $data['no_cuenta_deudor']    = $this->no_cuenta_deudor;

        Tickets::create($data);

        session()->flash('success', 'Ticket creado exitosamente');

        $this->reset(['descripcion_solicitud', 'zona_empresa_id', 'deudor', 
                                    'fecha_transferencia', 'monto', 'tipo_evidencia_id', 'folios_factura']);

    }

    public function validarFormularioIntegracionDePago()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'deudor'                => 'required',
            'fecha_transferencia'   => 'required',
            'monto'                 => 'required|numeric',
            'tipo_prioridad_id'     => 'required'
        ]);

        return $validatedData;
    }

    public function validarFormularioEvidenciaGestion()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'deudor'                => 'required',
            'tipo_evidencia_id'     => 'required',
            'folios_factura'        => 'required',
            'tipo_prioridad_id'     => 'required'
        ]);

        return $validatedData;
    }

    public function validarFormularioSeguimientoDeCuenta()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'deudor'                => 'required',
            'tipo_evidencia_id'     => 'required',
            'tipo_prioridad_id'     => 'required'
        ]);

        return $validatedData;
    }

    public function validarFormularioExpedienteLegal()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'deudor'                => 'required',
            'tipo_prioridad_id'     => 'required'
        ]);

        return $validatedData;
    }

    public function validarFormularioCPRYBKHL()
    {
        $validatedData = $this->validate([
            'descripcion_solicitud' => 'required',
            'zona_empresa_id'       => 'required',
            'cpr_bkhl'              => 'required',
            'tipo_prioridad_id'     => 'required'
        ]);

        return $validatedData;
    }

    /**
     * Regresa al agente asignado a la zona
     */
    public function getUsuarioAsigandoId()
    {
        $zonaUsuario = ZonaUsuario::where('zona_empresa_id', $this->zona_empresa_id)->first();

        if($zonaUsuario){
            return $zonaUsuario->user_id;
        }

        return NULL;
    }
}
