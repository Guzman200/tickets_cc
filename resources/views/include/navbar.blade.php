<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#"
            >
            <img src="{{ asset('template/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Tickets Collectaglobal</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{--
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'home' ? 'active' : ''}}" href="{{route('home')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            --}}
            @if(auth()->user()->esAdmin())
            <li class="nav-item">
                <a class="nav-link text-white {{Route::currentRouteName() == 'users' ? 'active' : ''}}" href="{{route('users')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">Usuarios</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white {{Route::currentRouteName() == 'tickets' ? 'active' : ''}}" href="{{route('tickets')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">speaker_notes</i>
                    </div>
                    <span class="nav-link-text ms-1">Tickets</span>
                </a>
            </li>
            @if(auth()->user()->esCliente())
            <li class="nav-item">
                <a class="nav-link text-white {{Route::currentRouteName() == 'crear_ticket' ? 'active' : ''}}" href="{{route('ticket.seleccion_formulario')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">note_add</i>
                    </div>
                    <span class="nav-link-text ms-1">Crear ticket</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    {{--<div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100"
                href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">
                Upgrade to pro
            </a>
        </div>
    </div>
    --}}
</aside>
