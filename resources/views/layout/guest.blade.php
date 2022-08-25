<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-7 intro-section">
                <div class="brand-wrapper">
                    <h1><a href="https://stackfindover.com/">Logo</a></h1>
                </div>
                <div class="intro-content-wrapper">
                    <h1 class="intro-title">Welcome to website !</h1>
                    <p class="intro-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    <a href="#!" class="btn btn-read-more">Read more</a>
                </div>
                <div class="intro-section-footer">
                    <nav class="footer-nav">
                    <a href="#!">Facebook</a>
                    <a href="#!">Twitter</a>
                    <a href="#!">Gmail</a>
                    </nav>
                </div>
            </div>
            @yield('page')
        </div>
    </div>
</body>
</html>