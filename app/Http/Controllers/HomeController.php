<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Tickets;
use App\Models\TipoFormulario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->esAdmin() || auth()->user()->esAdminCliente()){

            $empresas = Empresa::get();

            return view('home', compact('empresas'));
        }
        
        return redirect()->route('tickets');
    }

    public function getDataChartDashboard(Request $request)
    {

        $abierto   = 0;
        $enProceso = 0;
        $atendido  = 0;

        $ticketsLevantados = [];
        $ticketsAtendidos  = [];

        $ticketsPorCategoria = [];

        $fechaHace15dias = Carbon::now()->subDays(15)->format('Y-m-d');

        if(auth()->user()->esAdmin()){

            if($request->empresas != "all"){
               
                $abierto   = Tickets::where('empresa_id', $request->empresas)->abierto()->count();
                $enProceso = Tickets::where('empresa_id', $request->empresas)->enProceso()->count();
                $atendido  = Tickets::where('empresa_id', $request->empresas)->atendido()->count();

                $ticketsLevantados = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->where('empresa_id', $request->empresas)
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

                $ticketsAtendidos = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->where('empresa_id', $request->empresas)
                ->where('estatus_ticket_id', 3)
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

                $ticketsPorCategoria = Tickets::selectRaw('tipo_formulario_id, count(*) as total')
                    ->where('empresa_id', $request->empresas)
                    ->groupBy('tipo_formulario_id')
                    ->get();


                

            }else{

                $abierto   = Tickets::abierto()->count();
                $enProceso = Tickets::enProceso()->count();
                $atendido  = Tickets::atendido()->count();  

                $ticketsLevantados = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

                $ticketsAtendidos = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->where('estatus_ticket_id', 3)
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

                $ticketsPorCategoria = Tickets::selectRaw('tipo_formulario_id, count(*) as total')
                    ->groupBy('tipo_formulario_id')->get();

            }

        }else if(auth()->user()->esAdminCliente()){

            $abierto   = Tickets::where('empresa_id', auth()->user()->empresa_id)->abierto()->count();
            $enProceso = Tickets::where('empresa_id', auth()->user()->empresa_id)->enProceso()->count();
            $atendido  = Tickets::where('empresa_id', auth()->user()->empresa_id)->atendido()->count(); 
            
            $ticketsLevantados = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->where('empresa_id', auth()->user()->empresa_id)
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

            $ticketsAtendidos = Tickets::selectRaw(" 	
                    count(*) as total,
                    to_char(created_at, 'yyyy-mm-dd') as mes
                ")
                ->where('empresa_id', auth()->user()->empresa_id)
                ->where('estatus_ticket_id', 3)
                ->whereRaw("to_char(created_at, 'yyyy-mm-dd') >= ?", [$fechaHace15dias])
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

            $ticketsPorCategoria = Tickets::selectRaw('tipo_formulario_id, count(*) as total')
                ->where('empresa_id',  auth()->user()->empresa_id)
                ->groupBy('tipo_formulario_id')
                ->get();

        }

        // procesamos la data  de tickets levantados
        $labelsLevantados = [];
        $dataLevantados   = [];
        foreach($ticketsLevantados as $item)
        {
            $labelsLevantados[] = Carbon::parse($item->mes)->format('d/m/Y');
            $dataLevantados[]   = $item->total;
        }

        // procesamos la data  de tickets atendidos
        $labelsAtendidos = [];
        $dataAtendidos   = [];
        foreach($ticketsAtendidos as $item)
        {
            $labelsAtendidos[] = Carbon::parse($item->mes)->format('d/m/Y');
            $dataAtendidos[]   = $item->total;
        }

        // procesamos los tickets por categoria
        $dataTicketsCategorias = [];
        foreach($ticketsPorCategoria as $item)
        {
            $tipo = TipoFormulario::findOrFail($item->tipo_formulario_id);

            $dataTicketsCategorias[] = [
                'total' => $item->total,
                'categoria' => $tipo->nombre
            ];
        }
        

        return response()->json([
            'estatus_conteo' => [
                'abiertos'   => $abierto,
                'en_proceso' => $enProceso,
                'atendidos'  => $atendido
            ],
            'data_grafica_tickets_levantados' => [
                'labels' => $labelsLevantados,
                'data'   => $dataLevantados
            ],
            'data_grafica_tickets_atendidos' => [
                'labels' => $labelsAtendidos,
                'data'   => $dataAtendidos
            ],
            'tickets_por_categoria' => $dataTicketsCategorias
        ]);    
    }

}
