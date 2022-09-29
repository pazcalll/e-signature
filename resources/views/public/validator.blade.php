<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi E-Signature</title>
    <link rel="stylesheet" href="{{ asset('css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('js/qrcodejs/qrcode.js') }}"></script>
</head>
<body>
    <div id="main" class="container" style="margin-top: 5rem">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-4 py-5 wow fadeInLeft">
                    @if ($data != [])
                        <h1 class="mb-4 text-success">Tanda tangan sah!</h1>
                        <a class="btn btn-primary" href="{{ route('index') }}">Menuju Dashboard</a>
                    @else
                        <h1 class="text-danger">Tanda tangan tidak sah!</h1>
                        <a class="btn btn-primary" href="{{ route('index') }}">Menuju Dashboard</a>
                    @endif
                </div>
                <div class="col-md-8 py-5 wow zoomIn">
                    <div class="img-fluid text-center">
                        @if ($data != [])
                        {{-- @php
                            var_dump($data->toArray());
                        @endphp --}}
                            <i class="mai mai-checkmark text-success" style="font-size: 10em;"></i>
                            <div class="img-container"></div>
                            <script>
                                $(document).ready(function(){
                                    $.ajax({
                                        url: `{{ url('/get-img') }}`,
                                        type: "POST",
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            hash: '{{ $data->toArray()["signature_detail"]["hash"] }}'
                                        },
                                        success: (res) => {
                                            document.querySelector(".img-container").innerHTML = `
                                                <img id="sign-preview" src="" style="display: none; max-width: 700px; max-height:700" alt="Tanda Tangan Preview">
                                                <div id="qrcode" style="display: none"></div>
                                                <canvas id="sign-img" style="display: flex" width="550px" height="350px"></canvas>
                                            `
                                            const image = document.querySelector('#sign-preview')
                                            const canvas = document.querySelector("#sign-img")
                                            const ctx = canvas.getContext("2d")

                                            image.onload = function() {
                                                var canvasHeight = image.height * (350/image.width)
                                                // console.log(image.height+ " " + image.width+" "+canvasHeight)
                                                if (parseFloat(canvasHeight) > parseFloat(175)) {
                                                    canvas.height = canvasHeight
                                                }else{
                                                    canvas.height = 175
                                                }
                                                setTimeout(() => {
                                                    const width = image.width
                                                    const height = image.height
                                                    let rectangleSide = 0
                                                    if (width > height) {
                                                        rectangleSide = height
                                                    } else{
                                                        rectangleSide = width
                                                    }

                                                    if (height > width) {
                                                        ctx.drawImage( image, 0, 0, image.height * (350/image.width), 350)
                                                    } else {
                                                        ctx.drawImage( image, 0, 0, 350, image.height * (350/image.width))
                                                    }
                                                    const qrcode = new QRCode("qrcode", {
                                                        text: "{{ url('/verification/qrcode') }}/"+'{{ $data->toArray()["signature_detail"]["hash"] }}',
                                                        width: rectangleSide,
                                                        height: rectangleSide,
                                                        colorDark : "#000000",
                                                        colorLight : "#ffffff",
                                                        correctLevel : QRCode.CorrectLevel.H
                                                    })
                                                    setTimeout(() => {
                                                        // canvas set draw image (elementSelector, distance_from_leftside_canvas, distance_from_topside_canvas, qrcode_height, qrcode_width)
                                                        ctx.drawImage( document.querySelector('#qrcode img'), 350, canvas.height * 0.1, 150, 150)
                                                        const data = canvas.toDataURL("image/png")
                                                    }, 500)
                                                }, 500)
                                            }
                                            image.src = "{{ asset('storage') }}/"+res.signature
                                        },
                                    })
                                })
                            </script>
                            <table width="100%" style="text-align: left; font-weight: bold">
                                <tbody>
                                    <tr>
                                        <td>
                                            Nama Mahasiswa
                                        </td>
                                        <td>
                                            {{ $data->student->fullname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Dosen
                                        </td>
                                        <td>
                                            {{ $data->lecturer->fullname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Perihal
                                        </td>
                                        <td>
                                            {{ $data->signatureDetail->note }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <i class="mai mai-warning text-danger" style="font-size: 10em;"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>