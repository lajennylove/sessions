<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/sessions.css')}}">

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta property="og:url"                content="{{ url('/') }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Session" />
<meta property="og:description"        content="Session by Vans" />
<meta property="og:image"              content="{{ url('/images/Logo.png') }}" />
</head>

<body>
<!--    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>-->
    <section id="header">
        <img src="{{ url('/images/Logo.png') }}" class="img-fluid mx-auto d-block" id="img-logo">
        <div class="container" id="text-header">
            <p id="p-header"> SESSIONS es la plataforma en la que Vans México buscará a la banda más OFF THE WALL entre la escena emergente del país </p>
        </div>
<!--
        <div class="row">
            <div class="col-md-4">
                <img src="{{ url('images/inscritos.png') }}" class="img-fluid float-left">
            </div>
            <div class="col-md-4">
                <img src="{{ url('images/inscribete.png') }}" class="img-fluid mx-auto d-block" data-toggle="modal" data-target="#exampleModalCenter">
            </div>
            
            <div class="col-md-4">
                <a href="{{ url('bases') }}"><h2 class=" mx-auto d-block">BASES ></h2></a>
            </div>
        </div>
-->
        

<!-- Modal -->
    </section>
    <section id="inscritos">
        <div class="container">
            <nav class="nav nav-pills nav-fill back-black" id="nav-bands">
              <a class="nav-item nav-link size-font" href="{{ url('/registro') }}">Inscribe a tu banda</a>
              <a class="nav-item nav-link size-font" href="{{ url('/registro/user') }}">Regístrate para votar</a>
              <a class="nav-item nav-link size-font" href="{{ url('/login') }}">Log in</a>
              <a class="nav-item nav-link size-font" href="{{ url('/tyc') }}">Términos Y condiciones</a>
            </nav>
            <div class="row">
                <div class="col-md-4" id="col-ultimos">
                    <img src="{{ url('images/inscritos.png') }}" class="img-fluid float-left">
                </div>
                <div class="col-md-4" id=""></div>
                <div class="col-md-4" id=""></div>
            </div>
            <div class="row">
                @foreach($bands_last as $bnd)
                <div class="col-md-4 col-inscritos">
                    <div class="div-band">
                        <a href="{{ url('band/'.$bnd->username) }}"><img src="{{ url('images/logo_postersHome.png') }}" class="img-fluid mx-auto d-block"></a>
                        <a href="{{ url('band/'.$bnd->username) }}"><h3 class="h3-inscritos">{{$bnd->name}}</h3></a>
                        <a href="{{ url('band/'.$bnd->username) }}"><h4 class="state-inscritos">{{$bnd->ciudad}}</h4></a>
                        <a href="{{ url('band/'.$bnd->username) }}"><h5 class="gender-inscritos">{{$bnd->gender}}</h5></a>
                        <a href="{{ url('band/'.$bnd->username) }}"><div class="img-cover" style='background-image:url("https://s3.amazonaws.com/videosvansrsschilaquil/{{$bnd->cover_url}}");object-fit: fill;'>
                        </div></a>
                        <div class="inscritos-checkers"></div>
                        <iframe style="border: 0; width: 100%; height: 120px;" src="https://bandcamp.com/EmbeddedPlayer/album={{$bnd->bandcamp}}/size=large/bgcol=333333/linkcol=e32c14/tracklist=false/artwork=none/transparent=true/" seamless></iframe>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="video">
        <div class="container" id="container-video">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fdFNVA5Nhmg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <section id="bands">
        <div class="container">
            <nav class="nav nav-pills nav-fill" id="nav-bands">
              <a class="nav-item nav-link active-fill font-2" onclick="buscar(this.id);" id="all">VER TODOS</a>
              <a class="nav-item nav-link font-2"  onclick="buscar(this.id);"  id="rock">ROCK</a>
              <a class="nav-item nav-link  font-2" onclick="buscar(this.id);"  id="punk">PUNK</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="metal">Metal</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="pop">Pop</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="electronico">Electrónico</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="hip-hop">Hip-Hop</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="jazz">Jazz</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="reggae">Reggae</a>
              <a class="nav-item nav-link font-2" onclick="buscar(this.id);" id="alternativo">Alternativo</a>
            </nav>

                <div class="row" id="bands-by-gender">
                    @foreach($bands as $item)
                    <div class="col-md-3 col-xs-12 main">
                        <div class="div-band bands-all">
                            <div class="img-cover-all" style='background-image:url("https://s3.amazonaws.com/videosvansrsschilaquil/{{$item->cover_url}}");object-fit: fill;'></div>
                            <a href="{{ url('band/'.$item->username) }}"><h3 class="h3-bands">{{$item->name}}</h3></a>
                            <h4 class="h4-state">{{$item->ciudad}}</h4>
                            <p class="p-red">{{$item->gender}}</p>
                            <p class="p-description">{{$item->short}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

        </div>
        
    </section>
    <section id="footer">
        <div class="row">
            <div class="col-6">
                ©2018 VANS. ALL RIGHTS RESERVED
            </div>
            <div class="col-6">
                <nav class="navbar">
                <ul class="nav list-inline ml-auto">
                  <li class="list-inline-item"><a href="" target="_blank"><img src="{{ url('images/tw.png') }}"></a></li>
                  <li class="list-inline-item"><a href="" target="_blank"><img src="{{ url('images/fb.png') }}"></a></li>
                  <li class="list-inline-item"><a href="" target="_blank"><img src="{{ url('images/ig.png') }}"></a></li>
                  <li class="list-inline-item"><a href="" target="_blank"><img src="{{ url('images/yt.png') }}"></a></li>
                </ul>
                </nav>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    <script>
    function buscar(gender)
    {
        var token = "{{ csrf_token() }}";
        var datos = {};
        datos.gender = gender;
        console.log("datos---->", datos);
        var dataString = JSON.stringify(datos);
        $.ajax({
            method: "POST",
            url: '/api/buscar',
            dataType : 'jsonp',
            data: dataString,
            contentType: 'application/json; charset=utf-8',
            _token:token}).done(function(result){
                if(result.status == "success")
                {
                    $("#bands-by-gender").empty();
                    let x = document.getElementsByClassName("active-fill");

                    if(x.length > 0){
                        // Removing a class with VanillaJS
                        x[0].classList.remove("active-fill");
                    }
                    var gender = result.gender;
                    $('#'+gender).addClass("active-fill");
                    var bands = result.bands;
                    var row = document.getElementById('bands-by-gender');
                    console.log('row->', row);
                    console.log('lenght->', bands.length);
                    
                    for(var i=0; i<bands.length; i++)
                    {
                        var link = "{{ url('band') }}"+"/"+bands[i]['username'];
                        console.log("link->", link);
                        
                        var div_main = document.createElement('div');
                        var div_band = document.createElement('div');
                        var div_img_cover_all = document.createElement('div');
                        var h3 = document.createElement('h3');
                        var a = document.createElement('a');
                        var h4 = document.createElement('h4');
                        var p_red = document.createElement('p');
                        var p_description = document.createElement('p');
                        div_main.setAttribute('class', 'col-md-3 main col-xs-12');
                        div_band.setAttribute('class', 'div-band bands-all');
                        div_img_cover_all.setAttribute('class', 'img-cover-all');
                        div_img_cover_all.setAttribute('style', 'background-image:url("https://s3.amazonaws.com/videosvansrsschilaquil/'+bands[i]['cover_url']+'")');
                        a.setAttribute('href', link);
                        h3.setAttribute('class', 'h3-bands');
                        h4.setAttribute('class', 'h4-state');
                        p_red.setAttribute('class', 'p-red');
                        p_description.setAttribute('class', 'p-description');
                        h3.innerHTML = bands[i]['name'];
                        h4.innerHTML = bands[i]['ciudad'];
                        p_red.innerHTML = bands[i]['gender'];
                        p_description.innerHTML = bands[i]['short'];
                        a.appendChild(h3);
                        div_band.appendChild(div_img_cover_all);
                        div_band.appendChild(a);
                        div_band.appendChild(h4);
                        div_band.appendChild(p_red);
                        div_band.appendChild(p_description);
                        div_main.appendChild(div_band);
                        row.appendChild(div_main);
                        console.log("a->", a);
                    }
//                    option.setAttribute('selected', 'selected');
//                    option.innerHTML = "--¿Dama o Caballero?--";
//                    select.appendChild(option);
                }
                if(result.status == 'dd')
                {
                    console.log("dd--->", result.dd);
                }

                if(result.status == 'errors')
                {
                    
                }
            }).fail(function(e){
                console.log("eerrrrrrrror");
                console.log(e.status);
                console.log(e.responseText);
            });
    }
    </script>

</body>
</html>
