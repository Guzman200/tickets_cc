<div>

    {{ $fecha }}

    <div class="card mb-4">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label>Buscar</label>
                            <input wire:model="search" type="search" class="form-control"
                                placeholder="Folio | Solicitante | Asignado A">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label>Estatus del ticket</label>
                            <input wire:model="fecha" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-static my-3">
                            <select wire:model="estatus_ticket_id" class="form-control custom-select">
                                <option value="">Seleccionar estatus</option>
                                @foreach ($estatusTickets as $estatus)
                                    <option value="{{ $estatus->id }}">{{ $estatus->estatus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-static my-3">
                            <select wire:model="tipo_formulario_id" class="form-control custom-select">
                                <option value="">Seleccionar tipo</option>
                                @foreach ($tiposFormularios as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Folio
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Empresa
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo
                        </th>
                        @if(!auth()->user()->esCliente())
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Solicitante
                        </th>
                        @endif
                        @if(!auth()->user()->esAgente())
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Asignado a 
                        </th>
                        @endif
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Estatus</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha de alta</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            acciones</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>

                            {{-- FOLIO --}}
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->id }}</p>
                            </td>

                            {{-- EMPRESA --}}
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->empresa->nombre }}</p>
                            </td>

                            {{-- TIPO FORMULARIO --}}
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->tipoFormulario->nombre }}</p>
                            </td>

                            {{-- NOMBRE DE QUIEN HIZO LA SOLICITUD --}}
                            @if(!auth()->user()->esCliente())
                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->usuarioSolicita->nombres }}
                                    {{ $ticket->usuarioSolicita->apellidos }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $ticket->usuarioSolicita->email }}</p>
                            </td>
                            @endif

                            {{-- NOMBRE DE QUIEN ESTA ATENDIENDO EL TICKET --}}
                            @if(!auth()->user()->esAgente())
                            <td class="align-middle text-center text-sm">
                                @if(isset($ticket->usuarioAsignado))
                                <h6 class="mb-0 text-xs">{{ $ticket->usuarioAsignado->nombres }}
                                    {{ $ticket->usuarioAsignado->apellidos }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $ticket->usuarioAsignado->email }}</p>
                                @else
                                    <h6 class="mb-0 text-xs">Sin asignar</h6>
                                @endif
                            </td>
                            @endif

                            <td class="align-middle text-center text-sm">
                                @if ($ticket->estatus->id == 1)
                                    <span class="badge bg-gradient-info">{{ $ticket->estatus->estatus }}</span>
                                @endif

                                @if ($ticket->estatus->id == 2)
                                    <span class="badge bg-gradient-warning">{{ $ticket->estatus->estatus }}</span>
                                @endif

                                @if ($ticket->estatus->id == 3)
                                    <span class="badge bg-gradient-success">{{ $ticket->estatus->estatus }}</span>
                                @endif
                            </td>

                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-normal">{{ $ticket->fecha_registro }}</span>
                            </td>

                            <td class="align-middle text-center">
                                <a href="{{ route('ver_descripcion', ['ticket' => $ticket->id]) }}"
                                    class="btn bg-gradient-primary">
                                    Ver detalle
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr class="text-center">
                            <td colspan="5">
                                <p class="text-xs font-weight-bold mb-0">
                                    No hay registros
                                </p>
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">

            {{ $tickets->links() }}

        </div>
    </div>
</div>
