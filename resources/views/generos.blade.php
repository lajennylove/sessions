@extends('layouts.index')
@section('header')

@endsection
@section('content')
    <section id="bands">
        <nav class="navbar navbar-expand-lg navbar-light float-left" id="i-home" style="    position: absolute;top: 42px;">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active" style="font-size: 30px;">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home float-left" style="color:#fff;"></i></a>
                </li>
            </ul>
        </div>
    </nav>
        <div class="container">
            <nav class="nav nav-pills nav-fill" id="nav-bands">
              <a class="nav-item nav-link font-2" id="all" href="{{ url('generos/all') }}">VER TODOS</a>
              <a class="nav-item nav-link font-2" id="rock" href="{{ url('generos/rock') }}">ROCK</a>
              <a class="nav-item nav-link font-2" id="punk" href="{{ url('generos/punk') }}">PUNK</a>
              <a class="nav-item nav-link font-2" id="metal" href="{{ url('generos/metal') }}">Metal</a>
              <a class="nav-item nav-link font-2" id="pop" href="{{ url('generos/pop') }}">Pop</a>
              <a class="nav-item nav-link font-2" id="electronico" href="{{ url('generos/electronico') }}">Electrónico</a>
              <a class="nav-item nav-link font-2" id="hip-hop" href="{{ url('generos/hip-hop') }}">Hip-Hop</a>
              <a class="nav-item nav-link font-2" id="jazz" href="{{ url('generos/jazz') }}">Jazz</a>
              <a class="nav-item nav-link font-2" id="reggae" href="{{ url('generos/reggae') }}">Reggae</a>
              <a class="nav-item nav-link font-2" id="alternativo" href="{{ url('generos/alternativo') }}">Alternativo</a>
            </nav>

                <div class="row" id="bands-by-gender">
                    @foreach($bands as $item)
                    <div class="col-md-3 col-xs-12 main">
                        <div class="div-band bands-all">
                            <div class="img-cover-all" style='background-image:url("{{url('bandas/'.$item->cover_url)}}");object-fit: fill;'></div>
                            <a href="{{ url('band/'.$item->username) }}"><h3 class="h3-bands">{{$item->name}}</h3></a>
                            <h4 class="h4-state">{{$item->ciudad}}</h4>
                            <p class="p-red">{{$item->gender}}</p>
                            <p class="p-description">{{$item->short}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            <div class="row">
                <div class="col-md-4 col-xs-12" id="paginate"></div>
                <div class="col-md-4 col-xs-12" id="paginate">
                    {{ $bands->links() }}
                </div>
                <div class="col-md-4 col-xs-12" id="paginate"></div>
            </div>

        </div>
        
    </section>
    @include('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    <script>
//    function buscar(gender)
//    {
//        var token = "{{ csrf_token() }}";
//        var datos = {};
//        datos.gender = gender;
//        console.log("datos---->", datos);
//        var dataString = JSON.stringify(datos);
//        $.ajax({
//            method: "POST",
//            url: '/api/buscar',
//            dataType : 'jsonp',
//            data: dataString,
//            contentType: 'application/json; charset=utf-8',
//            _token:token}).done(function(result){
//                if(result.status == "success")
//                {
//                    $("#bands-by-gender").empty();
//                    let x = document.getElementsByClassName("active-fill");
//
//                    if(x.length > 1){
//                        // Removing a class with VanillaJS
//                        x[1].classList.remove("active-fill");
//                    }
//                    var gender = result.gender;
//                    $('#'+gender).addClass("active-fill");
//                    var bands = result.bands;
//                    var row = document.getElementById('bands-by-gender');
//                    console.log('row->', row);
//                    console.log('lenght->', bands.length);
//                    
//                    for(var i=0; i<bands.length; i++)
//                    {
//                        var link = "{{ url('band') }}"+"/"+bands[i]['username'];
//                        console.log("link->", link);
//                        
//                        var div_main = document.createElement('div');
//                        var div_band = document.createElement('div');
//                        var div_img_cover_all = document.createElement('div');
//                        var h3 = document.createElement('h3');
//                        var a = document.createElement('a');
//                        var h4 = document.createElement('h4');
//                        var p_red = document.createElement('p');
//                        var p_description = document.createElement('p');
//                        div_main.setAttribute('class', 'col-md-3 main col-xs-12');
//                        div_band.setAttribute('class', 'div-band bands-all');
//                        div_img_cover_all.setAttribute('class', 'img-cover-all');
//                        div_img_cover_all.setAttribute('style', 'background-image:url("https://s3.amazonaws.com/videosvansrsschilaquil/'+bands[i]['cover_url']+'")');
//                        a.setAttribute('href', link);
//                        h3.setAttribute('class', 'h3-bands');
//                        h4.setAttribute('class', 'h4-state');
//                        p_red.setAttribute('class', 'p-red');
//                        p_description.setAttribute('class', 'p-description');
//                        h3.innerHTML = bands[i]['name'];
//                        h4.innerHTML = bands[i]['ciudad'];
//                        p_red.innerHTML = bands[i]['gender'];
//                        p_description.innerHTML = bands[i]['short'];
//                        a.appendChild(h3);
//                        div_band.appendChild(div_img_cover_all);
//                        div_band.appendChild(a);
//                        div_band.appendChild(h4);
//                        div_band.appendChild(p_red);
//                        div_band.appendChild(p_description);
//                        div_main.appendChild(div_band);
//                        row.appendChild(div_main);
//                        console.log("a->", a);
//                    }
////                    option.setAttribute('selected', 'selected');
////                    option.innerHTML = "--¿Dama o Caballero?--";
////                    select.appendChild(option);
//                }
//                if(result.status == 'dd')
//                {
//                    console.log("dd--->", result.dd);
//                }
//
//                if(result.status == 'errors')
//                {
//                    
//                }
//            }).fail(function(e){
//                console.log("eerrrrrrrror");
//                console.log(e.status);
//                console.log(e.responseText);
//            });
//    }
    </script>

@endsection
@section('footer')
<script>
$( document ).ready(function() {
    var gender = "{{ $gender }}";
    $('#'+gender).addClass("active-fill");
});
</script>
<style>
@media screen and (max-width: 780px)
{
    #i-home {display:none}
}
</style>
@endsection
