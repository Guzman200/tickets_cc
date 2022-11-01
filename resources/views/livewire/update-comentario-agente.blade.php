<div>
    @if(auth()->user()->esAgente() && $ticket->estatus_ticket_id != 3)
    <h5 class="font-weight-normal text-info text-gradient mt-4">Comentario agente</h5>
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
                <div class="input-group input-group-static my-3 @if ($comentario_agente !='' ) is-filled @endif">
                    <label>Realiza un comentario sobre el ticket</label>
                    <textarea {{$ticket->estatus_ticket_id == 3 ? 'disabled' : ''}} wire:model.lazy="comentario_agente" cols="30" rows="1" class="form-control">
                    </textarea>

                </div>
                @error('comentario_agente')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            @if($ticket->estatus_ticket_id != 3) {{-- Atendido --}}
            <div class="col-md-12">
                <button class="btn btn-primary" wire:click="updateComentario">
                    Guardar comentario
                </button>
            </div>
            @endif
        </div>
    </div>
    @else
        <h5 class="font-weight-normal text-info text-gradient mt-4">Comentario agente</h5>
        <div class="card card-frame">
            <div class="card-body">

                {{-- COMENTARIO DEL AGENTE --}}
                <div class="col-md-12">
                    <div class="input-group input-group-static my-3">
                        {{$ticket->comentario_agente}}
                    </div>
                </div>


            </div>
        </div>
    @endif
</div>
