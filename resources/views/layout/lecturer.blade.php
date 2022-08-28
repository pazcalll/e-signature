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

        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
                        
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
                                {{-- <a class="text-danger ml-lg-2" style="cursor: pointer;" href="#">Free Analytics</a> --}}
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="container" style="margin-top: 8rem; margin-bottom: 10rem">
                <h1 class="mb-4">Daftar Permohonan Tanda Tangan</h1>
                <table class="table table-bordered data-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Waktu</td>
                            <td>Hash</td>
                            <td>Keterangan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <script>
                    // let table = $('table').DataTable({
                    //     "serverSide" : true,
                    //     "processing" : true,
                    //     "ajax" : {
                    //         "url" : "{{ route('unsigned') }}",
                    //         "type" : "GET"
                    //     }
                    // });
                    let dt = $('table').DataTable({
                        ajax: '{{route("unsigned")}}',
                        serverSide: true,
                        processing: true,
                        searching: false,
                        fixedColumns: true,
                        columnDefs: [
                            { width: '5%', targets: 0 },
                            { width: '15%', targets: 1 },
                            { width: '20%', targets: 2 },
                            { width: '30%', targets: 3 },
                            { width: '30%', targets: 4 },
                        ],
                        columns: [
                            {
                                data: '',
                                render: (data, type, row, meta) => {
                                    return meta.row + meta.settings._iDisplayStart + 1
                                }
                            },
                            {data: 'created_at'},
                            {
                                data: null,
                                render: function(data, type, full, meta) {
                                    return `
                                    <div style="word-break: break-all">
                                        ${data.signature_detail.hash}
                                    </div>
                                    `
                                }
                            },
                            {
                                data: null,
                                render: function(data, type, full, meta) {
                                    return data.signature_detail.note
                                }
                            },
                            {
                                data: null,
                                render: function(data, type, full, meta) {
                                    let action = `
                                    <div style="display: flex">
                                        <button type="button" class="btn-info btn-sm">
                                            <i class="mai mai-pencil"></i>
                                            Tambahkan Tanda Tangan
                                        </button>
                                        <button type="button" class="btn-danger btn-sm">
                                            <i class="mai mai-trash-bin"></i>
                                            Tolak Permohonan
                                        </button>
                                    </div>
                                    `
                                    return action
                                }
                            }
                        ]
                        // drawCallback: () => {
                        //     $('.btn-confirm').unbind()
                        //     $('.btn-confirm').on('click', function() {
                        //         $('#po_id_confirm').val($(this).data('nota'))
                        //         $('#confirmPesanan').modal('show')
                        //     })
                        // }
                    })
                </script>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade mt-5" style="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Permohonan Tanda Tangan Digital</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
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

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        {{-- <script src="../assets/js/google-maps.js"></script> --}}

        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
    
    </body>
</html>