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
<meta property="og:url"                content="{{ url('band/'.$band->username) }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $band->name }}" />
<meta property="og:description"        content="Vota por nuestra banda para tocar en #HouseOfVans #SessionsMX" />
<meta property="og:image"              content="{{ url('/images/share.png') }}" />
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    

    <section id="bands">
        <div class="container">            
            <div class="container-fluid d-flex flex-column grow">
                <div class="row">
                    <div class="col-md-2 col-xs-12  main none">
                        @foreach($bands_one as $bnd)
                        <div class="div-band padding-5 back-center">
                            <a href="{{url('/band/'.$bnd->username)}}"><img src="{{ url('images/logo_postersHome.png') }}" class="img-fluid mx-auto d-block" class="img-logo-band"></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><h3 class="h3-bands-band">{{$bnd->name}}</h3></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><h4 class="h4-state">{{$bnd->ciudad}}</h4></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><div class="img-cover-all" style='background-image:url("{{url('bandas/'.$bnd->cover_url)}}");object-fit: fill;'></div></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><p class="p-black">{{$bnd->gender}}</p></a>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="col-md-8 col-xs-12  main">
                        <div class="div-band">
                            <nav class="nav nav-pills nav-fill float-left" id="nav-bands-band">
                              <a class="nav-item nav-link active-fill font-2" href="{{ url('/') }}">Home</a>
                              <a class="nav-item nav-link font-2" href="{{ url('/bandas') }}">Más bandas</a>
                            </nav>
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.12';
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="" data-href="{{ url('band/'.$band->username) }}" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsessions.vans.com.mx%2Fband%2F{{$band->username}}" class="fb-xfbml-parse-ignore"><img src="{{ url('images/fbshare.jpg') }}" class="float-right"></a></div>
                            <br>
                            <br>
                            <a href="https://twitter.com/share?text=Vota%20por%20nuestra%20banda%20para%20tocar%20en%20House%20Of%20Vans%20CDMX&hashtags=HouseOfVans,SessionsMX&url={{ url('band/'.$band->username) }}" target="_blank">
                                <img src="{{ url('images/twshare.jpg') }}" class="float-right">
                            </a>
                            
                            <a href="{{url('/')}}"><img src="{{ url('images/Logo.png') }}" class="img-fluid mx-auto d-block"></a>
                            <h3 class="h3-inscritos h3-name-band mx-auto d-block">{{$band->name}}</h3>
                            <h4 class="state-inscritos ">{{$band->ciudad}}. {{$band->gender}}</h4>
                            <div class="img-cover-band" style='background:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url("{{url('bandas/'.$band->cover_url)}}");object-fit: fill;' id="video-band">
                                <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="{{ url($band->youtube_url) }}" allowfullscreen></iframe>
                                </div>
                                <p id="bio-band">{{$band->description}}</p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-xs-12 padding-0 align-center"><img src="{{ url('images/fb_band.png') }}"><a href="https://www.facebook.com/{{$band->facebook}}" target="_blank">facebook.com/{{$band->facebook}}</a></div>
                                <div class="col-md-6 col-xs-12 padding-0 align-center"><img src="{{ url('images/yt_band.png') }}">&nbsp;<a href="{{$band->youtube}}" target="_blank">youtube.com/{{$band->short}}</a></div>
                            </div>
                            <div class="row" id="music">
                                <div class="col-md-8 col-xs-12" id="div-bandcamp">
                                    <iframe style="border: 0; width: 100%; height: 120px;" src="https://bandcamp.com/EmbeddedPlayer/album={{$band->bandcamp}}/size=large/bgcol=333333/linkcol=e32c14/tracklist=false/artwork=none/transparent=true/" seamless><a href="http://liluglymane.bandcamp.com/album/thing-s-thatare-stuff"></a></iframe>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="row">
                                        <div class="col-6 padding-0">
                                            @guest
<!--                                            <a href="{{ url('/login') }}"><div id="btn-login" class="btn-red btn-votar mx-auto d-block">Log in</div></a>-->
                                            <a href="{{ url('/login') }}"><img src="{{ url('images/votar.png') }}" class="btn-votar img-fluid mx-auto d-block" id="btn-login"></a>
                                            @else
                                                {{--@if($exist == "no")--}}
                                                    <button class="btn-votar" onclick="votar(event);" id="btn-votar"><img src="{{ url('images/votar.png') }}" class="img-fluid mx-auto d-block"></button>
                                                {{--@endif--}}
                                            @endguest
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ url('images/rayo.png') }}" class="img-fluid mx-auto d-block" id="img-rayo">
                                        </div>
                                        <div class="col-3">
                                            <p class="count" id="count">{{$votes}}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12  main none">
                        @foreach($bands_two as $bnd)
                        <div class="div-band padding-5 back-center">
                            <a href="{{url('/band/'.$bnd->username)}}"><img src="{{ url('images/logo_postersHome.png') }}" class="img-fluid mx-auto d-block" class="img-logo-band"></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><h3 class="h3-bands-band">{{$bnd->name}}</h3></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><h4 class="h4-state">{{$bnd->ciudad}}</h4></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><div class="img-cover-all" style='background-image:url("{{url('bandas/'.$bnd->cover_url)}}");object-fit: fill;'></div></a>
                            <a href="{{url('/band/'.$bnd->username)}}"><p class="p-black">{{$bnd->gender}}</p></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    @include('footer')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="btn btn-red mx-auto d-block">Ya has votado por esta banda</div>
      </div>
    </div>
  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    @guest
    @else
    <script>
    function votar(e)
    {
        e.preventDefault();
        var token = "{{ csrf_token() }}";
        var datos = {};
        datos.band_id = {{$band->id}};
        datos.user_id = {{$user->id}};
        console.log("datos---->", datos);
        var dataString = JSON.stringify(datos);
        $.ajax({
            method: "POST",
            url: '/api/vote',
            dataType : 'jsonp',
            data: dataString,
            contentType: 'application/json; charset=utf-8',
            _token:token}).done(function(result){
                if(result.status == "success")
                {
//                    $('#btn-votar').remove();
                    $('#count').html(result.count);
                }
                if(result.status == 'ya')
                {
                    $('#exampleModalCenter').modal('show');
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
    @endguest
    <script>
        
    
var myConfObj = {
  iframeMouseOver : false
}
window.addEventListener('blur',function(){
  if(myConfObj.iframeMouseOver){
    var token = "{{ csrf_token() }}";
        var datos = {};
        datos.band_id = {{$band->id}};
        console.log("datos---->", datos);
        var dataString = JSON.stringify(datos);
        $.ajax({
            method: "POST",
            url: '/api/click',
            dataType : 'jsonp',
            data: dataString,
            contentType: 'application/json; charset=utf-8',
            _token:token}).done(function(result){
                if(result.status == "success")
                {
//                    $('#btn-votar').remove();

                }
                if(result.status == 'ya')
                {

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
});

document.getElementById('div-bandcamp').addEventListener('mouseover',function(){
   myConfObj.iframeMouseOver = true;
});
document.getElementById('div-bandcamp').addEventListener('mouseout',function(){
    myConfObj.iframeMouseOver = false;
});
    </script>
    @include('analytics')
    <style>
        @media screen and (max-width: 780px)
        {
            .none{display: none;}
            .btn-red{font-size:20px;}
        }
    </style>
    
</body>
</html>
