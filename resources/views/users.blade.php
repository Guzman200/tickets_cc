@extends('layouts.app')

@section('page', 'Usuarios')

@section('content')
   @livewireStyles

   @livewire('tabla-usuarios')

   @livewireScripts
@endsection
