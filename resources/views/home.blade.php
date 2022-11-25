@extends('layouts.app')

@section('page', 'Inicio')

@section('styles')
    @livewireStyles
@endsection

@section('content')

    @csrf


    <div class="row card @if (!auth()->user()->esAdmin()) d-none @endif">
        <div class="col-xl-4 col-md-12">
            <form>
                <div class="row">

                    {{-- CLIENTE --}}
                    <div class="col-md-12">
                        <div class="input-group input-group-static my-3">
                            <select id="select-empresas" class="form-control custom-select">
                                <option value="all">Selecciona una empresa</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
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

    <div class="row">
        <div class="col-md-8">
            <div class="row mt-4">
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                                <i class="material-icons opacity-10">speaker_notes</i>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Tickets abiertos</h6>
                            <hr class="horizontal dark my-3">
                            <h5 id="tickets-abiertos" class="mb-0">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-lg">
                                <i class="material-icons opacity-10">speaker_notes</i>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Tickets en proceso</h6>
                            <hr class="horizontal dark my-3">
                            <h5 id="tickets-en-proceso" class="mb-0">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                <i class="material-icons opacity-10">speaker_notes</i>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Tickets atendidos</h6>
                            <hr class="horizontal dark my-3">
                            <h5 id="tickets-atendidos" class="mb-0">0</h5>
                        </div>
                    </div>
        
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-levantados" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Tickets levantados</h6>
                            {{--<p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            --}}
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> Últimos 15 días</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-atendidos" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Tickets atendidos </h6>
                            {{--<p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in
                                today sales. </p>
                            <hr class="dark horizontal">
                            --}}
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> Últimos 15 días</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 mt-4 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0">Tickets levantados por categoría</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Categoría</h6>
                    <ul class="list-group" id="list-categorias">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    

    
@endsection

@section('scripts')
    @livewireScripts

    <script>
        
        let csrf = document.getElementsByName('_token')[0].value;

        let graficaTicketsLevantados;
        let graficaTicketsAtendidos;

        document.getElementById('btnAplicarFiltros').addEventListener('click', function() {

            getDataDashboard();

        })


        async function getDataDashboard() {

            let empresas = document.getElementById('select-empresas').value;

            let peticion = await fetch(`get-data-chart/dashboard?empresas=${empresas}`, {
                method: 'GET',
                params: {
                    _token: csrf
                }
            });

            let response = await peticion.json();

            document.getElementById('tickets-abiertos').textContent   = response.estatus_conteo.abiertos;
            document.getElementById('tickets-en-proceso').textContent = response.estatus_conteo.en_proceso;
            document.getElementById('tickets-atendidos').textContent  = response.estatus_conteo.atendidos;

            renderGraficaTicketLevantados(response.data_grafica_tickets_levantados);
            renderGraficaTicketAtendidos(response.data_grafica_tickets_atendidos);
            printTicketsPorCategoria(response.tickets_por_categoria);

            console.log(response);

        }

        function renderGraficaTicketLevantados(data)
        {

            if(graficaTicketsLevantados){
                graficaTicketsLevantados.destroy();
            }

            let ctx = document.getElementById("chart-levantados").getContext("2d");

            graficaTicketsLevantados = new Chart(ctx, {
                type: "line",
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: "Tickets levantados",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(255, 255, 255, .8)",
                        pointBorderColor: "transparent",
                        borderColor: "rgba(255, 255, 255, .8)",
                        borderColor: "rgba(255, 255, 255, .8)",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: data.data,
                        maxBarThickness: 6
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
            });
        }

        function renderGraficaTicketAtendidos(data)
        {

            if(graficaTicketsAtendidos){
                graficaTicketsAtendidos.destroy();
            }

            let ctx = document.getElementById("chart-atendidos").getContext("2d");

            graficaTicketsAtendidos = new Chart(ctx, {
                type: "line",
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: "Tickets levantados",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(255, 255, 255, .8)",
                        pointBorderColor: "transparent",
                        borderColor: "rgba(255, 255, 255, .8)",
                        borderColor: "rgba(255, 255, 255, .8)",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: data.data,
                        maxBarThickness: 6
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                        },
                        ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        }
                    },
                    },
                },
            });

        }

        function printTicketsPorCategoria(data)
        {

            document.getElementById('list-categorias').innerHTML = "";

            let html = "";

            for(let item of data)
            {
                let li = `
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="material-icons text-lg">expand_less</i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">${item.categoria}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            ${item.total}
                        </div>
                    </li>`;

                html += li;
            }

            document.getElementById('list-categorias').innerHTML = html;


        }

        getDataDashboard();

    </script>

@endsection
