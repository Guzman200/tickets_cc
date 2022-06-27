<div>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Folio
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Area
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Solicitante</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Estatus</th>
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
                                <h6 class="mb-0 text-xs">{{ $ticket->usuario->nombres }} {{ $ticket->usuario->apellidos }}</h6>
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
    </div>
</div>
