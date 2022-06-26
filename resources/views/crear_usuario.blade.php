@extends('layouts.app')

@section('page', 'Crear usuario')

@section('content')
   @livewireStyles

   @livewire('crear-usuario')

   @livewireScripts
@endsection
