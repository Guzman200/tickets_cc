<!DOCTYPE html>
<html lang="es">

<head>

    @include('include.head')

    <title>
        @yield('title','Tickets-dashboard')
    </title>
    @yield('styles')
</head>

<body class="g-sidenav-show  bg-gray-200">

    @include('include.navbar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">@yield('page')</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                              <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                              </div>
                            </a>
                        </li>
                        <li class="nav-item d-flex ps-3 align-items-center">
                            <a onclick="document.getElementById('formLogout').click()" href="javascript:void(0)" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Cerrar sesión</span>
                            </a>

                            <form action="{{route('logout')}}" method="POST" class="d-none">

                                @csrf

                                <button type="submit" id="formLogout">

                                </button>

                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row min-vh-80 h-100">
                <div class="col-12">

                    @yield('content')

                </div>
            </div>

            @include('include.footer')

        </div>
    </main>

    {{--@include('include.settings')--}}

    @include('include.scripts')

    @yield('scripts')
</body>

</html>
