@extends('layouts.app')

@section('content')
   <h2>Tickets</h2>
   @if (session('creacion_ticket_status'))
      <div class="alert alert-success alert-dismissible fade show text-light" role="alert">
                        
            <span class="alert-text"><strong>Exitoso! </strong>{{ session('creacion_ticket_status') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
      </div>
   @endif
@endsection
