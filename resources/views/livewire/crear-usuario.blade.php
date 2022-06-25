<div>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombres</label>
                            <input wire:model="nombres" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Apellidos</label>
                            <input wire:model="apellidos" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <input wire:model="email" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Contraseña</label>
                            <input wire:model="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <select wire:model="tipo_usuario_id" class="form-control custom-select" id="exampleFormControlSelect1">
                                <option value="">Selecciona el tipo de usuario</option>
                                @foreach ($tipos_usuarios as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <select wire:model="area_id" class="form-control custom-select" id="exampleFormControlSelect1">
                                <option value="">Selecciona el area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <button wire:click="crear()" class=" btn btn-primary" type="button">
                                Crear usuario
                            </button>
                            <a href="{{route('users')}}" class=" btn btn-danger" type="button">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline is-valid my-3">
                            <label class="form-label">Success</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline is-invalid my-3">
                            <label class="form-label">Error</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div> --}}
        </form>
    </div>
</div>
</div>
