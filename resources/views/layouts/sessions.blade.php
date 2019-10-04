<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sessions Vans</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="{{ url('css/layout.css')}}">
    <link rel="stylesheet" href="{{ url('css/fontawesome-all.css')}}">

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('header')
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light float-left" id="i-home">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home float-left"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar social">
        <ul class="nav list-inline ml-auto">
          <li class="list-inline-item li"><a href="https://twitter.com/vans_mx" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item li"><a href="https://www.facebook.com/VansMexico" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item li" style="margin-right:13px;"><a href="https://www.instagram.com/vans_mx/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item li"><a href="https://www.youtube.com/user/videosvans" target="_blank"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </nav>
    <br>
    <a href="{{url('/')}}"><img src="{{ url('/images/Logo.png') }}" class="img-fluid mx-auto d-block" id="logo-login"></a>

    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <footer>
        @include('footer')
        @include('analytics')
    </footer>
</body>
</html>
