<div class="card">
    <div class="card-body">

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon align-middle">
                <span class="material-icons text-md">
                    thumb_up_off_alt
                </span>
                </span>
                <span class="alert-text" style="color: white">{{session('success')}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- FORMULARIO INTEGRACIÓN DE PAGO--}}
        @if($tipo_formulario_id == 1)
        <form>
            <div class="row">

                {{-- DESCRIPCION DEL TICKET--}}
                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @if($descripcion_solicitud != '') is-filled @endif">
                        <label>Descripción de la solicitud <sup>*</sup></label>
                        <textarea wire:model.lazy="descripcion_solicitud" cols="30" rows="1" class="form-control"></textarea>
                        
                    </div>
                    @error('descripcion_solicitud')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                {{-- ZONAS --}}
                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @error('zona_empresa_id') is-invalid @enderror">
                        <select wire:model.lazy="zona_empresa_id" class="form-control custom-select">
                            <option value="">Selecciona una zona <sup>*</sup></option>
                            @foreach ($zonas_empresa as $zona)
                                <option value="{{ $zona->id }}">{{ $zona->zona }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('zona_empresa_id')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                
                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @error('no_cuenta_deudor') is-invalid @enderror @if($no_cuenta_deudor != '') is-filled @endif">
                        <label>No cuenta deudor</label>
                        <input wire:model.lazy="no_cuenta_deudor" type="text" class="form-control">
                    </div>
                    @error('no_cuenta_deudor')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @error('deudor') is-invalid @enderror @if($deudor != '') is-filled @endif">
                        <label>Deudor <sup>*</sup></label>
                        <input wire:model.lazy="deudor" type="text" class="form-control">
                    </div>
                    @error('deudor')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @error('fecha_transferencia') is-invalid @enderror @if($fecha_transferencia != '') is-filled @endif">
                        <label>Fecha de transferencia <sup>*</sup></label>
                        <input wire:model.lazy="fecha_transferencia" type="date" class="form-control">
                    </div>
                    @error('fecha_transferencia')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="input-group input-group-static my-3 @error('monto') is-invalid @enderror @if($monto != '') is-filled @endif">
                        <label>Monto $ <sup>*</sup></label>
                        <input wire:model.lazy="monto" type="text" class="form-control">
                    </div>
                    @error('monto')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


               
            </div>
            <div class="row d-flex justify-content-end mt-2">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <button wire:click="crear()" class=" btn btn-primary" type="button">
                            Crear
                        </button>
                        <a href="{{route('ticket.seleccion_formulario')}}" class=" btn btn-danger" type="button">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>