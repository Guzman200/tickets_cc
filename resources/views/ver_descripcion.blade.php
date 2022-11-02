@extends('layouts.app')

@section('page', '')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/contents.css') }}">
@endsection

@section('content')
    @livewireStyles


    <h5 class="font-weight-normal text-info text-gradient">Datos del ticket</h5>

    @livewire('datos-ticket', ['ticket_id' => $ticket->id])

    {{-- INTEGRACIÓN DE PAGOS --}}
    @if($ticket->tipo_formulario_id == 1)
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zona
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No cuenta deudor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Deudor</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Fecha transferencia</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Monto $</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->zonaEmpresa->zona }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->no_cuenta_deudor }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->deudor }}</h6>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->fecha_transferencia }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-normal">{{ number_format($ticket->monto, 2) }}</span>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

    @elseif($ticket->tipo_formulario_id == 2) {{-- EVIDENCIAS GESTIÓN --}}
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zona
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No cuenta deudor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Deudor</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tipo de evidencia</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Folios factura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->zonaEmpresa->zona }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->no_cuenta_deudor }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->deudor }}</h6>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoEvidencia->tipo }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-normal">{{ $ticket->folios_factura }}</span>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    @elseif($ticket->tipo_formulario_id == 3) {{-- SEGUIMIENTO DE CUENTA --}}
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zona
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No cuenta deudor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Deudor</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tipo de evidencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->zonaEmpresa->zona }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->no_cuenta_deudor }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->deudor }}</h6>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoEvidencia->tipo }}</p>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    @elseif($ticket->tipo_formulario_id == 4) {{-- EXPEDIENTE LEGAL --}}
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zona
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No cuenta deudor
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Deudor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->zonaEmpresa->zona }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->no_cuenta_deudor }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->deudor }}</h6>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    @elseif($ticket->tipo_formulario_id == 5) {{-- CPR Y BKHL --}}
        <div class="card mb-4">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zona
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                CPR Y BKHL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->zonaEmpresa->zona }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->cpr_bkhl }}</p>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    @endif

	<h5 class="font-weight-normal text-info text-gradient">Descripción de la solicitud</h5>
    <div class="card card-frame">
        <div class="card-body">
            {{ $ticket->descripcion_solicitud }}
        </div>
    </div>

    @livewire('update-comentario-agente', ['ticket_id' => $ticket->id])

    @livewire('upload-files-tickets', ['ticket_id' => $ticket->id])

    <div class="mt-4">
        <a href="{{ route('tickets') }}" class="btn bg-gradient-primary">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a>
    </div>

@endsection

@section('scripts')
    @livewireScripts

    <!-- CREDITOR -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection
