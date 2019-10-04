<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sessions by Vans</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/sessions.css')}}">
    <link rel="stylesheet" href="{{url('css/slicknav.css')}}" />
    <link rel="stylesheet" href="{{ url('css/fontawesome-all.css')}}">

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta property="og:url"                content="{{ url('/') }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Session" />
<meta property="og:description"        content="Session by Vans #HouseOfVans #SessionsMX" />
<meta property="og:image"              content="{{ url('/images/share.png') }}" />
    @yield('header')
</head>

<body>
    @yield('content')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="{{ url('js/jquery.slicknav.min.js') }}"></script>
    <script>
        $(function(){
            $('#nav-bands').slicknav();
        });
    </script>
    <div id="for_footer">
        @yield('footer')
    </div>
    @include('analytics')
</body>
</html>
