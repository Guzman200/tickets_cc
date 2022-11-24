<div>

    @if ( ( auth()->user()->esAgente() || (auth()->user()->esAdmin() && $ticket->estaAsignadoAlUsuarioEnSesion())  ) &&     
            $ticket->estatus_ticket_id != 3)

        <div class="card mt-4">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Archivos adjuntados</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    @foreach ($ticket->archivos as $archivo)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{$archivo->nombre}}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{$archivo->fechaSubidaArchivo()}}
                                </p>
                            </div>
                            <div class="ms-auto text-end">
                                <a wire:click="download({{$archivo->id}})" class="btn btn-link text-dark px-3 mb-0" href="javascript:;">
                                    <i class="material-icons text-sm me-2">download</i>Descargar</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h5 class="font-weight-normal text-info text-gradient mt-4">Adjuntar archivos</h5>
        <div class="card card-frame">
            <div class="card-body">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon align-middle">
                            <span class="material-icons text-md">
                                thumb_up_off_alt
                            </span>
                        </span>
                        <span class="alert-text" style="color: white">{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- COMENTARIO DEL AGENTE --}}
                <div class="col-md-12">


                    <div class="input-group input-group-outline my-3">
                        <label class="form-label"></label>
                        <input wire:model="archivo" type="file" class="form-control">
                    </div>


                    @error('archivo')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if ($ticket->estatus_ticket_id != 3) {{-- Atendido --}}
                    <div class="col-md-12">
                        <button class="btn btn-primary" wire:click="uploadFile">
                            Subir archivo
                        </button>
                    </div>
                @endif
            </div>
        </div>

    @else

        <div class="card mt-4">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Archivos adjuntados</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    @foreach ($ticket->archivos as $archivo)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{$archivo->nombre}}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{$archivo->fechaSubidaArchivo()}}
                                </p>
                            </div>
                            <div class="ms-auto text-end">
                                <a wire:click="download({{$archivo->id}})" class="btn btn-link text-dark px-3 mb-0" href="javascript:;">
                                    <i class="material-icons text-sm me-2">download</i>Descargar</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif
</div>
