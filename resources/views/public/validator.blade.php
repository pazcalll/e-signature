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
</head>
<body>
    <div id="main" class="container" style="margin-top: 5rem">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    @if ($data != [])
                        <h1 class="mb-4 text-success">Tanda tangan sah!</h1>
                        <a class="btn btn-primary" href="{{ route('index') }}">Menuju Dashboard</a>
                    @else
                        <h1 class="text-danger">Tanda tangan tidak sah!</h1>
                        <a class="btn btn-primary" href="{{ route('index') }}">Menuju Dashboard</a>
                    @endif
                </div>
                <div class="col-md-6 py-5 wow zoomIn">
                    <div class="img-fluid text-center">
                        @if ($data != [])
                            <i class="mai mai-checkmark text-success" style="font-size: 10em;"></i>
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
                            <i class="mai mai-checkmark text-danger" style="font-size: 10em;"></i>    
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