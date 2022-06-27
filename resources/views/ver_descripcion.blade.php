@extends('layouts.app')

@section('page', '')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/contents.css') }}">
@endsection

@section('content')
    @livewireStyles


    <h5 class="font-weight-normal text-info text-gradient">Datos del ticket</h5>

    <div class="card mb-4">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Folio
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Area
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Solicitante</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Estatus</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha en que se realizo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $ticket->id }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $ticket->usuario->area->area }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                            <h6 class="mb-0 text-xs">{{ $ticket->usuario->nombres }}
                                {{ $ticket->usuario->apellidos }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $ticket->usuario->email }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                            @if ($ticket->estatus->id == 1)
                                <span class="badge bg-gradient-info">{{ $ticket->estatus->estatus }}</span>
                            @endif

                            @if ($ticket->estatus->id == 2)
                                <span class="badge bg-gradient-warning">{{ $ticket->estatus->estatus }}</span>
                            @endif

                            @if ($ticket->estatus->id == 3)
                                <span class="badge bg-gradient-success">{{ $ticket->estatus->estatus }}</span>
                            @endif

                        </td>
                        <td class="align-middle text-center">
                            <span
                                class="text-secondary text-xs font-weight-normal">{{ $ticket->fecha_registro }}</span>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>

	<h5 class="font-weight-normal text-info text-gradient">Descripción</h5>
    <div class="card card-frame">
        <div class="card-body">
            {!! $ticket->descripcion !!}
        </div>
    </div>

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
