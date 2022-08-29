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

            <div class="container" style="margin-top: 8rem; margin-bottom: 10rem">
                <h1 class="mb-4">Daftar Permohonan Tanda Tangan</h1>
                <table class="table table-bordered data-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Waktu</td>
                            <td>Hash</td>
                            <td>Keterangan</td>
                            <td>Tindakan</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <script>
                    function openModal(hash) {
                        $(':input','form')
                            .not(':button, :submit, :reset, input[name="_token"]')
                            .val(null)
                            .prop('checked', false)
                            .prop('selected', false)
                        $('#hash').val(hash)
                        $(".dropify-clear").trigger("click")
                        $('.modal').modal('show')
                    }
                    let dt = $('table').DataTable({
                        ajax: '{{route("unsigned")}}',
                        serverSide: true,
                        processing: true,
                        searching: false,
                        scrollX: true,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
                        },
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
                            {
                                data: null,
                                render: function(data, type, full, meta) {
                                    return `
                                    <div style="word-break: break-all">
                                        ${data.created_at}
                                    </div>
                                    `
                                }
                            },
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
                                    return `
                                        ${data.signature_detail.note}
                                        <br>
                                        dari: <span style="color: #0388fc">${data.student.fullname}</span>
                                    `
                                }
                            },
                            {
                                data: null,
                                render: function(data, type, full, meta) {
                                    let action = `
                                    <div style="display: flex">
                                        <button onclick=openModal("${data.signature_detail.hash}") style="margin-right: 10px" type="button" class="btn-primary btn-sm">
                                            <i class="mai mai-pencil"></i>
                                            Tanda Tangani
                                        </button>
                                        <button type="button" class="btn-danger btn-sm">
                                            <i class="mai mai-trash-bin"></i>
                                            Tolak
                                        </button>
                                    </div>
                                    `
                                    return action
                                }
                            }
                        ]
                    })
                </script>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade mt-5" style="" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Masukan Tanda Tangan Digital</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post">
                        @csrf
                        <div class="modal-body">
                            <div style="display: none; background: #FFFFFF; position: absolute; opacity: 100%; width: calc(100% - 30px); height: calc(100% - 30px);">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="calc(100% - 30px)" height="calc(100% - 30px)" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#1d0e0b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    <!-- [ldio] generated by https://loading.io/ -->
                                </svg>
                            </div>
                            <label for="signature">Tanda Tangan (.png)</label><br>
                            <label for="signature" class="badge badge-danger">Ukuran max. 1 mb</label><br>
                            <label for="signature" class="badge badge-danger">Panjang atau lebar min. 200px</label>
                            <br>
                            <input name="signature" id="signature" required type="file" onchange="loadFile(event)" data-plugin="dropify" data-allowed-file-extensions="png" data-height="100px" data-min-width="200" data-min-height="200" data-max-file-size="1M" class="dropify">
                            <img  src="" style="display: none; max-width: 700px; max-height:700" alt="Tanda Tangan Preview">
                            {{-- <div id="qrcode"></div> --}}
                            {{-- <canvas width="1200" height="1200"></canvas> --}}
                            <script>
                                const loadFile = (event) => {
                                    const image = document.querySelectorAll('img')[0]
                                    image.src = URL.createObjectURL(event.target.files[0])
                                    
                                    // const canvas = document.querySelector("canvas")
                                    // const ctx = canvas.getContext("2d");
                                    
                                    //3 arg verison
                                    setTimeout(() => {
                                        const width = image.width
                                        const height = image.height
                                        console.log(width, height)
                                        let rectangleSide = 200
                                        if (width > height) {
                                            rectangleSide = height
                                        } else{
                                            rectangleSide = width
                                        }
                                        // const qrcode = new QRCode("qrcode", {
                                        //     text: "http://jindo.dev.naver.com/collie",
                                        //     width: rectangleSide,
                                        //     height: rectangleSide,
                                        //     colorDark : "#000000",
                                        //     colorLight : "#ffffff",
                                        //     correctLevel : QRCode.CorrectLevel.H
                                        // })
                                        // ctx.drawImage( image, 0, 0, width, height)
                                    }, 300)

                                };
                            </script>
                            <input required type="hidden" name="hash" id="hash">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js" integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
        <script>
            $('.dropify').dropify({
                messages: {
                    'default': 'Masukkan tanda tangan',
                    'replace': 'Masukkan tanda tangan pennganti',
                    'remove':  'Hapus',
                    'error':   'Maaf, terjadi kesalahan.'
                },
                error: {
                    'fileSize': 'Ukuran terlalu besar (1 mb max).',
                    'minWidth': 'Gambar kurang lebar (200px min).',
                    'minHeight': 'Bambar kurang tinggi (200px min).',
                    'imageFormat': 'Format gambar tidak sesuai (png).',
                    'fileExtension': 'Format berkas tidak sesuai (hanya png).'
                }
            })
            $('form').on('submit', function(event) {
                event.preventDefault()
                let fd = new FormData(this);
                var file_data = $('#signature').prop('files')[0];
                fd.append('file', file_data);
                $.ajax({
                    url: '{{ route("sign") }}',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: fd,
                    success: (res) => {
                        console.log(res)
                        $('modal').modal('hide')
                        $('modal').on('hidden.bs.modal', function (e) {
                            $(':input','form')
                                .not(':button, :submit, :reset, input[name="_token"]')
                                .val(null)
                                .prop('checked', false)
                                .prop('selected', false)
                            $('#hash').val(hash)
                            $(".dropify-clear").trigger("click")
                        })
                    }
                })
            })
        </script>

        <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

        <script src="{{ asset('js/theme.js') }}"></script>
    </body>
</html>