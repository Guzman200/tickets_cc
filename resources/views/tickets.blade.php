@extends('layouts.app')

@section('page', 'Tickets')

@section('content')
    @livewireStyles
    <h2>Tickets</h2>
    @if (session('creacion_ticket_status'))
        <div class="alert alert-success alert-dismissible fade show text-light" role="alert">

            <span class="alert-text"><strong>{{ session('creacion_ticket_status') }}</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @livewire('tabla-tickets')


@endsection

@section('scripts')
    @livewireScripts

    <!-- CREDITOR -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        // Inicilizacion del plugin ckeditor
        /* CKEDITOR.replace('ckeditor', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
               { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
               { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
               { name: 'links', groups: [ 'links' ] },
               { name: 'insert', groups: [ 'insert' ] },
               { name: 'forms', groups: [ 'forms' ] },
               { name: 'tools', groups: [ 'tools' ] },
               { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
               { name: 'others', groups: [ 'others' ] },
               '/',
               { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
               { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
               { name: 'styles', groups: [ 'styles' ] },
               { name: 'colors', groups: [ 'colors' ] },
               { name: 'about', groups: [ 'about' ] }
            ],
            language: 'es',
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Subscript,Superscript,About,Link,Unlink,Anchor,Table,Image,HorizontalRule,Source,PasteFromWord,Undo,Redo,Scayt,Outdent,Indent'
         });*/

    </script>
@endsection
