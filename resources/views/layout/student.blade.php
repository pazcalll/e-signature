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

    </head>
    <body>

        <!-- Back to top button -->
        <div class="back-to-top"></div>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container">
                    <a href="#" class="navbar-brand">E - <span class="text-primary">Signature</span></a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Permohonan</a>
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

            <div class="container" style="margin-top: 5rem">
                <div class="page-banner home-banner">
                    <div class="row align-items-center flex-wrap-reverse h-100">
                        <div class="col-md-6 py-5 wow fadeInLeft">
                            <h1 class="mb-4">Dapatkan tanda tangan digital dosenmu sekarang!</h1>
                            <a href="#" class="btn btn-primary btn-split" data-toggle="modal" data-target="#staticBackdrop">Minta Tanda Tangan<div class="fab"><span class="mai-add"></span></div></a>
                        </div>
                        <div class="col-md-6 py-5 wow zoomIn">
                            <div class="img-fluid text-center">
                                <img src="{{ asset('img/1924480.png') }}" alt="E-Signature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade mt-5" style="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <form action="" method="POST">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form Permohonan Tanda Tangan Digital</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <table style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td>Dosen</td>
                                            <td>
                                                <select class="form-control" name="name" id="name">
                                                    <option></option>
                                                    <option value="1">dosen</option>
                                                    <option value="2">dosen2</option>
                                                    <option value="3">dosen3</option>
                                                </select>
                                                <script>
                                                    $('select').select2({
                                                        placeholder: 'Pilih Dosen',
                                                        dropdownAutoWidth : true,
                                                        width: '100%'
                                                    });
                                                </script>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Perihal</td>
                                            <td><textarea name="note" id="note" cols="30" class="form-control" rows="10"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </form>
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
                        <div class="col-lg-3 py-3">
                            <h5>Newsletter</h5>
                            <p>Get updates, news or events on your mail.</p>
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Enter your email..">
                                <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>

                <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
            </div>
        </footer>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        {{-- <script src="../assets/js/google-maps.js"></script> --}}

        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
    
    </body>
</html>