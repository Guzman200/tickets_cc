<div>
    @if (auth()->user()->esAgente() && $ticket->estatus_ticket_id != 3)

        <div class="card h-100 mt-4">
            <div class="card-header pb-0">
                <h6>Comentarios realizados</h6>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    @foreach ($ticket->comentarios as $comentario)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                @if ($comentario->estatus_ticket_id == 1)
                                    {{-- ABIERTO --}}
                                    <i class="fa fa-comment text-info" aria-hidden="true"></i>
                                @elseif($comentario->estatus_ticket_id == 2) {{-- EN PROCESO --}}
                                    <i class="fa fa-comment text-warning" aria-hidden="true"></i>
                                @elseif($comentario->estatus_ticket_id == 3) {{-- ATENDIDO --}}
                                    <i class="fa fa-comment text-success" aria-hidden="true"></i>
                                @endif

                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $comentario->comentario }}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{ $comentario->fechaComentario() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

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
                    <div class="input-group input-group-static my-3 @if ($comentario_agente !=''
                        ) is-filled @endif">
                        <label>Realiza un comentario sobre el ticket</label>
                        <textarea {{ $ticket->estatus_ticket_id == 3 ? 'disabled' : '' }}
                            wire:model.lazy="comentario_agente" cols="30" rows="1" class="form-control">
                    </textarea>

                    </div>
                    @error('comentario_agente')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @if ($ticket->estatus_ticket_id != 3) {{-- Atendido --}}
                    <div class="col-md-12">
                        <button class="btn btn-primary" wire:click="guardarComentario">
                            Guardar comentario
                        </button>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="card h-100 mt-4">
            <div class="card-header pb-0">
                <h6>Comentarios realizados</h6>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    @foreach ($ticket->comentarios as $comentario)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                @if ($comentario->estatus_ticket_id == 1)
                                    {{-- ABIERTO --}}
                                    <i class="fa fa-comment text-info" aria-hidden="true"></i>
                                @elseif($comentario->estatus_ticket_id == 2) {{-- EN PROCESO --}}
                                    <i class="fa fa-comment text-warning" aria-hidden="true"></i>
                                @elseif($comentario->estatus_ticket_id == 3) {{-- ATENDIDO --}}
                                    <i class="fa fa-comment text-success" aria-hidden="true"></i>
                                @endif

                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $comentario->comentario }}</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    {{ $comentario->fechaComentario() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
