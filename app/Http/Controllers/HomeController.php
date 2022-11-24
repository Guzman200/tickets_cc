<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Tickets;
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

    public function getDataChartEstatusTickets(Request $request)
    {

        $abierto   = 0;
        $enProceso = 0;
        $atendido  = 0;

        if(auth()->user()->esAdmin()){

            if($request->empresas != "all"){
               
                $abierto   = Tickets::where('empresa_id', $request->empresas)->abierto()->count();
                $enProceso = Tickets::where('empresa_id', $request->empresas)->enProceso()->count();
                $atendido  = Tickets::where('empresa_id', $request->empresas)->atendido()->count();

            }else{

                $abierto   = Tickets::abierto()->count();
                $enProceso = Tickets::enProceso()->count();
                $atendido  = Tickets::atendido()->count();  

            }

        }else if(auth()->user()->esAdminCliente()){

            $abierto   = Tickets::where('empresa_id', auth()->user()->empresa_id)->abierto()->count();
            $enProceso = Tickets::where('empresa_id', auth()->user()->empresa_id)->enProceso()->count();
            $atendido  = Tickets::where('empresa_id', auth()->user()->empresa_id)->atendido()->count();  

        }

        return response()->json([
            'abiertos'   => $abierto,
            'en_proceso' => $enProceso,
            'atendidos'  => $atendido
        ]);    
    }
}
