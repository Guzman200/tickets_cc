<div>
    <div class="card">

        <div class="row mt-3 mb-3">
            <div class="col-12 col-sm-3">
                <a href="{{route('users.create')}}" class="btn btn-primary" style="margin-left : 10px">
                    Crear usuario
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Area
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tickets creados</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha registro</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg"
                                            class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $user->nombres }} {{ $user->apellidos }}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $user->area->area }}</p>
                                <p class="text-xs text-secondary mb-0">{{ $user->tipoUsuario->tipo }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                100
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal">{{ $user->created_at }}</span>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-primary btn-sm">Editar</button>
                                <button type="button" class="btn btn-primary btn-sm">Eliminar</button>
                                <button type="button" class="btn btn-primary btn-sm">Desactivar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
