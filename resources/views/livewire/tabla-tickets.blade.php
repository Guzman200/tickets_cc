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
                                placeholder="Folio | Area | Solicitante | Estatus">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-static mb-4">
                            <label>Fecha del ticket</label>
                            <input wire:model="fecha" type="date" class="form-control">
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Area
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Solicitante</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Estatus</th>
                        @if(auth()->user()->esAdmin())
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Editar estatus</th>
                        @endif
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha en que se realizo</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            acciones</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->id }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->usuario->area->area }}</p>
                            </td>

                            <td class="align-middle text-center text-sm">
                                <h6 class="mb-0 text-xs">{{ $ticket->usuario->nombres }}
                                    {{ $ticket->usuario->apellidos }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $ticket->usuario->email }}</p>
                            </td>

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
                            @if(auth()->user()->esAdmin())
                            <td>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0"></label>
                                    <select wire:change="cambiarEstatus({{$ticket->id}}, $event.target.value)" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($estatusTickets as $item)
                                            @if ($ticket->estatus->id <= $item->id)
                                                @if ($item->id == 1 || $item->id <=2)
                                                    <option {{$ticket->estatus->id == $item->id ? 'selected' : ''}} 
                                                    value="{{$item->id}}">{{$item->estatus}}
                                                    </option>
                                                @endif
                                                @if ($ticket->estatus->id >= 2 && $item->id !=2)
                                                    <option {{$ticket->estatus->id == $item->id ? 'selected' : ''}} 
                                                        value="{{$item->id}}">{{$item->estatus}}
                                                    </option>
                                                @endif
                                            @endif

                                            
                                           
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            @endif
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-normal">{{ $ticket->fecha_registro }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('ver_descripcion', ['ticket' => $ticket->id]) }}"
                                    class="btn bg-gradient-primary">
                                    Ver Descripción
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
