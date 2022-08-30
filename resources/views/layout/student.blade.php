<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>Mahasiswa | E-Signature</title>

        <link rel="stylesheet" href="{{ asset('css/maicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    </head>
    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container">
                    <a href="#" class="navbar-brand">E - <span class="text-primary">Signature</span> | Mahasiswa</a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:void(0)">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">Permohonan</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <em class="mai mai-person"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="color: #645F88; opacity: 75%;">
                                    <a class="dropdown-item disabled" href="#">Hi {{ $name }}!</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </div>
                                {{-- <a class="text-danger ml-lg-2" style="cursor: pointer;" href="#">Free Analytics</a> --}}
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </header>

        <div id="main" class="container" style="margin-top: 8rem">
            @include("student.index")
        </div>

        <footer class="page-footer bg-image" style="background-image: url({{ asset('img/world_pattern.svg') }});">
            <div class="container">
                <p class="text-center" id="copyright">This template design is taken from <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
                <p class="text-center" id="copyright">The application was developed by <a href="https://www.linkedin.com/in/yazeed-arifin-304728193/" target="_blank">Y.Q.A</a></p>
            </div>
        </footer>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        {{-- <script src="../assets/js/google-maps.js"></script> --}}

        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
    
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </body>
</html>