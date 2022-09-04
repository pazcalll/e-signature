<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>Dosen | E-Signature</title>

        <link rel="stylesheet" href="{{ asset('css/maicons.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
                        
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js" integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>

        <!-- Back to top button -->
        <div class="back-to-top"></div>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container">
                    <a href="#" class="navbar-brand">E - <span class="text-primary">Signature</span> | Dosen</a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:void(0)">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">Riwayat</a>
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
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </header>

        <div id="main">
            @include("lecturer.index")
        </div>

        <footer class="page-footer bg-image" style="background-image: url({{ asset('img/world_pattern.svg') }}); position: absolute; bottom: -30%; width: 100%;">
            <div class="container">
                <p class="text-center" id="copyright">This template design is taken from <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
                <p class="text-center" id="copyright">The application was developed by <a href="https://www.linkedin.com/in/yazeed-arifin-304728193/" target="_blank">Y.Q.A</a></p>
            </div>
        </footer>

        <script>
            const loadFile = (event) => {
                const image = document.querySelectorAll('img')[0]
                image.src = URL.createObjectURL(event.target.files[0])
                
                //3 arg verison
                setTimeout(() => {
                    const width = image.width
                    const height = image.height
                    // console.log(width, height)
                    let rectangleSide = 200
                    if (width > height) {
                        rectangleSide = height
                    } else{
                        rectangleSide = width
                    }
                }, 300)

            };
        </script>
        
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </body>
</html>