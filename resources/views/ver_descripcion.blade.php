@extends('layouts.app')

@section('styles')
   <link rel="stylesheet" href="{{ mix('css/contents.css') }}">
@endsection

@section('content')
   @livewireStyles

   
   <h2>Descripción</h2>
   <div class=" justify-content-center">
      <a  href="{{route('tickets')}}" class="btn bg-gradient-primary">
         <i class="fa-solid fa-arrow-left"></i> Regresar
      </a>
   </div>
   <div class="card card-frame">
      <div class="card-body">
            {!! $descripcion !!}

      </div>
   </div>
@endsection

@section('scripts')
    @livewireScripts

      <!-- CREDITOR -->
   <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection