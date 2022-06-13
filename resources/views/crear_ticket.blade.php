@extends('layouts.app')

@section('content')
   @livewireStyles
      <h2>Crear Tickets</h2>
      <div class="card card-frame">
         <div class="card-body">
           <!-- This is some text within a card body.-->
           <form method="post" action="" enctype="multipart/form-data">
               <div class="form-group">
                  <label><strong>Descripción :</strong></label>
                  <textarea class="ckeditor form-control" id="ckeditor"name="description"></textarea>
               </div>
            <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-success btn-lg">Crear Ticket</button>
            </div>
        </form>
         </div>
       </div>
   
@endsection

@section('scripts')
    @livewireScripts

      <!-- CREDITOR -->
   <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

   <script type="text/javascript">

      CKEDITOR.replace('ckeditor', {
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
      });

  </script>
@endsection
