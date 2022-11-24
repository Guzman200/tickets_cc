@extends('layouts.app')

@section('page', 'Inicio')

@section('styles')
    @livewireStyles
@endsection

@section('content')

    @csrf

    
    <div class="row card @if(!auth()->user()->esAdmin()) d-none @endif">
        <div class="col-xl-4 col-md-12">
            <form>
                <div class="row">
                    
                    {{-- CLIENTE --}}
                    <div class="col-md-12">
                        <div class="input-group input-group-static my-3">
                            <select id="select-empresas" class="form-control custom-select">
                                <option value="all">Selecciona una empresa</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    

                
                </div>
                <div class="row d-flex justify-content-end mt-2">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <button id="btnAplicarFiltros" class=" btn btn-primary" type="button">
                                Aplicar filtros
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">speaker_notes</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tickets abiertos</p>
                        <h4 id="tickets-abiertos" class="mb-0">0</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                        </span>than yesterday</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">speaker_notes</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tickets en proceso</p>
                        <h4 id="tickets-en-proceso" class="mb-0">0</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                        </span>than lask month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">speaker_notes</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tickets atendidos</p>
                        <h4 id="tickets-atendidos" class="mb-0">0</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                        yesterday</p>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Website Views</h6>
                    <p class="text-sm ">Last Campaign Performance</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2  ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 "> Daily Sales </h6>
                    <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in
                        today sales. </p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> updated 4 min ago </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Completed Tasks</h6>
                    <p class="text-sm ">Last Campaign Performance</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm">just updated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @livewireScripts

    <script>

        let csrf = document.getElementsByName('_token')[0].value;

        document.getElementById('btnAplicarFiltros').addEventListener('click', function(){

            getDataChartEstatusTickets();

        })


        async function getDataChartEstatusTickets(){

            let empresas = document.getElementById('select-empresas').value;

            let peticion = await fetch(`get-data-chart/estatus-tickets?empresas=${empresas}`, {
                method : 'GET',
                params : {
                    _token : csrf
                }
            });

            let response = await peticion.json();

            document.getElementById('tickets-abiertos').textContent   = response.abiertos;
            document.getElementById('tickets-en-proceso').textContent = response.en_proceso;
            document.getElementById('tickets-atendidos').textContent  = response.atendidos;

            console.log(response);

        }

        getDataChartEstatusTickets();



    </script>

@endsection
