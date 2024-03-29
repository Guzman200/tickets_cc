<div>

    <div class="card mb-4">
        <div class="card-body">

            <form>
                <div class="input-group input-group-static mb-4">
                    <label>Buscar</label>
                    <input wire:model="search" type="search" class="form-control"
                        placeholder="Nombre | Apellido | Email | Empresa | Tipo de usuario">
                </div>
            </form>

        </div>
    </div>

    <div class="card">

        <div class="row mt-3 mb-3">
            <div class="col-12 col-md-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-left : 10px">
                    Crear usuario
                </a>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Empresa
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tickets creados</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha registro</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{asset('images/user_icon.png')}}" class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $user->nombres }} {{ $user->apellidos }}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                    {{ isset($user->empresa) ? $user->empresa->nombre : '' }}
                                </p>
                                <p class="text-xs text-secondary mb-0">{{ $user->tipoUsuario->tipo }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $user->tickets->count() }}
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-normal">{{ $user->fecha_registro }}</span>
                            </td>
                            <td class="align-middle">
                                <a href="{{route('users.edit', ['usuario' => $user->id])}}" type="button" class="btn btn-info btn-sm">Editar</a>
                                @if ($user->estatus == 0)
                                    <button wire:click="cambiarEstatus({{ $user->id }})" type="button"
                                        class="btn btn-primary btn-sm">
                                        Desactivado
                                    </button>
                                @endif
                                @if ($user->estatus == 1)
                                    <button wire:click="cambiarEstatus({{ $user->id }})" type="button"
                                        class="btn btn-success btn-sm">
                                        Activo
                                    </button>
                                @endif
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

            <div class="d-flex justify-content-center">

                {{ $users->links() }}

            </div>
        </div>


    </div>
</div>

