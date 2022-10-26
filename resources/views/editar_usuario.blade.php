@extends('layouts.app')

@section('page', 'Editar usuario')

@section('content')
    @livewireStyles

    @livewire('editar-usuario', [
    'user_id' => $usuario->id,
    'nombres' => $usuario->nombres,
    'apellidos' => $usuario->apellidos,
    'email' => $usuario->email,
    'tipo_usuario_id' => $usuario->tipo_usuario_id,
    'empresa_id' => $usuario->empresa_id
    ])

    @livewireScripts
@endsection
