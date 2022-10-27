@extends('layouts.app')

@section('page', 'Crear ticket')

@section('content')
    @livewireStyles

    <h2>{{$tipoFormulario->nombre}}</h2>

    @livewire('crear-ticket', ['tipo_formulario_id' => $tipoFormulario->id])

@endsection

@section('scripts')
    @livewireScripts
@endsection
