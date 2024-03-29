<div>


    <div class="card card-frame">
        <div class="card-body">
            {{ $ticket->descripcion_solicitud }}
        </div>
    </div>
    <br>
   
    <div class="card card-frame">
        
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Folio
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Empresa
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Solicitante</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Asignado a 
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Estatus</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Prioridad
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $ticket->id }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $ticket->empresa->nombre }}</p>
                        </td>

                        <td class="align-middle text-center text-sm">
                            <h6 class="mb-0 text-xs">{{ $ticket->usuarioSolicita->nombres }}
                                {{ $ticket->usuarioSolicita->apellidos }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $ticket->usuarioSolicita->email }}</p>
                        </td>

                        {{-- NOMBRE DE QUIEN ESTA ATENDIENDO EL TICKET --}}
                        <td class="align-middle text-center text-sm">
                            @if(isset($ticket->usuarioAsignado))
                            <h6 class="mb-0 text-xs">{{ $ticket->usuarioAsignado->nombres }}
                                {{ $ticket->usuarioAsignado->apellidos }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $ticket->usuarioAsignado->email }}</p>
                            @else
                                <h6 class="mb-0 text-xs">Sin asignar</h6>
                            @endif
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
                        <td class="align-middle text-center text-sm">
                            {{$ticket->tipoPrioridad->tipo}}
                        </td>
                        {{--
                        <td class="align-middle text-center">
                            <span
                                class="text-secondary text-xs font-weight-normal">{{ $ticket->fecha_registro }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-normal">
                                {{ is_null($ticket->fecha_update_atendido) ? '-' : $ticket->fecha_update_atendido }}
                            </span>
                        </td>
                        --}}
                    </tr>


                </tbody>
            </table>
        </div>
    
        <div class="table-responsive mt-4">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha de alta
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha de cierre
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tiempo de atención
                        </th>
                        @if( (
                            auth()->user()->esAgente() || (auth()->user()->esAdmin() && $ticket->estaAsignadoAlUsuarioEnSesion())  
                            ) && $ticket->estatus_ticket_id != 3)
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Editar estatus</th>
                        @endif
                        @if(auth()->user()->esAdmin() & $ticket->estatus_ticket_id != 3)
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Cambiar agente
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center">
                            <span
                                class="text-secondary text-xs font-weight-normal">{{ $ticket->fecha_registro }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-normal">
                                {{ is_null($ticket->fecha_update_atendido_) ? '-' : $ticket->fecha_update_atendido_ }}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-normal">
                                {{ $ticket->getTiempoDeAtencion() }}
                            </span>
                        </td>
                        @if( 
                            (
                                auth()->user()->esAgente() || (auth()->user()->esAdmin() && $ticket->estaAsignadoAlUsuarioEnSesion())  
                            ) 
                            && $ticket->estatus_ticket_id != 3
                            )
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
    
                        @if(auth()->user()->esAdmin() & $ticket->estatus_ticket_id != 3)
                            <td>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect" class="ms-0"></label>
                                    <select wire:change="cambiarAgente($event.target.value)" class="form-control" id="exampleFormControlSelect">
                                        @foreach ($agentes as $agente)
                                            <option value="{{$agente->id}}" 
                                                {{$ticket->usuario_asignado_id == $agente->id ? 'selected' : ''}}>
                                                {{$agente->nombres}} {{$agente->apellidos}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        @endif
                        
                    </tr>
    
    
                </tbody>
            </table>
        </div>

    </div>
    <br>


    
</div>
