<!DOCTYPE html>
<html lang="es">

<head>
    <title>
        @yield('title','Tickets')
    </title>
    @include('include.head')
</head>

<body>

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-secondary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Ingresar</h4>
                                </div>
                            </div>
                            <div class="card-body">

                                @error('email')
                                    <div style="color: white;" class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <span class="alert-text">{{$message}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror

                                <form method="POST" role="form" class="text-start" action="{{ route('login') }}">

                                    @csrf

                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Correo Electronico</label>
                                        <input autocomplete="off" name="email" type="email" class="form-control" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input name="remember" class="form-check-input" type="checkbox"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Mantener sesión abierta</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-secondary w-100 my-4 mb-2">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-2 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())

                                </script>,
                                Collecta 
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </main>

    @include('include.scripts')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
