@extends('layouts.app')

@section('page', 'Crear ticket')

@section('content')
    @livewireStyles

    <h2>¿En que podemos ayudarte?</h2>
    
    @foreach ($tiposFormularios as $tipoFormulario)
        <div class="card card-frame mt-2">
            <div class="card-body">
                <a
                    href="{{ route('ticket.crear', ['tipoFormulario' => $tipoFormulario->id]) }}">{{ $tipoFormulario->nombre }}</a>
            </div>
        </div>
    @endforeach

@endsection

@section('scripts')
    @livewireScripts


@endsection
