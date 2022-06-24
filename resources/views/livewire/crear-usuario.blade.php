<div>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombres</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Apellidos</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control custom-select" id="exampleFormControlSelect1">
                                <option value="">Selecciona el tipo de usuario</option>
                                @foreach ($tipos_usuarios as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <select class="form-control custom-select" id="exampleFormControlSelect1">
                                <option value="">Selecciona el area</option>
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary" type="button">
                            Crear usuario
                        </button>
                    </div>
                </div>
                {{--
                <div class="row">
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
                </div>
                --}}
            </form>
        </div>
    </div>
</div>
