@extends('layouts.app')

@section('page', 'Tickets')

@section('content')
    @livewireStyles
    
    @livewire('tabla-tickets')


@endsection

@section('scripts')
    @livewireScripts
@endsection
