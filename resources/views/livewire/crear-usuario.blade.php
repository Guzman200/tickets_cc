<div>
    <div class="card">
        <div class="card-body">

            @if(session()->has('usuario_creado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                    </span>
                    <span class="alert-text" style="color: white">{{session('usuario_creado')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @if($nombres != '') is-filled @endif">
                            <label>Nombres</label>
                            <input wire:model.lazy="nombres" type="email" class="form-control">
                            
                        </div>
                        @error('nombres')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @error('apellidos') is-invalid @enderror @if($apellidos != '') is-filled @endif">
                            <label>Apellidos</label>
                            <input wire:model.lazy="apellidos" type="email" class="form-control">
                        </div>
                        @error('apellidos')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @error('email') is-invalid @enderror @if($email != '') is-filled @endif">
                            <label>Email</label>
                            <input wire:model.lazy="email" type="email" class="form-control">
                        </div>
                        @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @error('password') is-invalid @enderror @if($password != '') is-filled @endif">
                            <label>Contraseña</label>
                            <input wire:model.lazy="password" type="password" class="form-control">
                        </div>
                        @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @error('tipo_usuario_id') is-invalid @enderror">
                            <select wire:model.lazy="tipo_usuario_id" class="form-control custom-select">
                                <option value="">Selecciona el tipo de usuario</option>
                                @foreach ($tipos_usuarios as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tipo_usuario_id')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3 @error('area_id') is-invalid @enderror">
                            <select wire:model.lazy="area_id" class="form-control custom-select">
                                <option value="">Selecciona el area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('area_id')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row d-flex justify-content-end mt-2">
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
        {{--
        <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static is-valid my-3">
                            <label class="form-label">Success</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static is-invalid my-3">
                            <label class="form-label">Error</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                </div> 
        </form>
        --}}
    </div>
</div>
</div>
