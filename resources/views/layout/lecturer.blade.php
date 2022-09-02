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

        <script src="{{ asset('js/qrcodejs/qrcode.js') }}"></script>
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
                                <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Riwayat</a>
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

        <div class="page-container">
            @include("lecturer.index")
        </div>

        <footer class="page-footer bg-image" style="background-image: url({{ asset('img/world_pattern.svg') }});">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-3 py-3">
                        <h3>SEOGram</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero amet, repellendus eius blanditiis in iusto eligendi iure.</p>

                        <div class="social-media-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-google-plus-g"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                            <a href="#"><span class="mai-logo-youtube"></span></a>
                        </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <h5>Company</h5>
                            <ul class="footer-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Help & Support</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 py-3">
                            <h5>Contact Us</h5>
                            <p>203 Fake St. Mountain View, San Francisco, California, USA</p>
                            <a href="#" class="footer-link">+00 1122 3344 5566</a>
                            <a href="#" class="footer-link">seogram@temporary.com</a>
                        </div>
                    </div>
                </div>

                <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
            </div>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js" integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
    </body>
</html>