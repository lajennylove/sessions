@extends('layouts.index')
@section('header')
<link rel="stylesheet" href="{{ url('css/index.css')}}">

@endsection
@section('content')
    <section id="header">
        <nav class="navbar social">
            <ul class="nav list-inline ml-auto">
              <li class="list-inline-item li"><a href="https://twitter.com/vans_mx" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item li"><a href="https://www.facebook.com/VansMexico" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item li" style="margin-right:13px;"><a href="https://www.instagram.com/vans_mx/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item li"><a href="https://www.youtube.com/user/videosvans" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </nav>
        <br>
        <img src="{{ url('/images/Logo.png') }}" class="img-fluid mx-auto d-block" id="img-logo">
        <br>
        @include('menu')
        <div class="container" id="text-header">
            <p id="p-header"> SESSIONS es la plataforma en la que Vans México buscará a la banda más OFF THE WALL entre la escena emergente del país </p>
            <div class="row">
                <div class="col-md-6 col-xs-12 right">
                    <p class="hashtag">#HouseOfVans</p>
                </div>
                <div class="col-md-6 col-xs-12 left">
                    <p class="hashtag">#SessionsMX</p>
                </div>
            </div>
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
<!--
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="stop();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9" id="div-video">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2xHi44NEU2c?rel=0&autoplay=1" frameborder="0" allow="autoplay" id="video" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
-->
    </section>
    @include('footer')
<style>
    .slicknav_menu{display: none;}
@media screen and (max-width: 780px)
{
    body {max-height: auto;overflow: scroll;}
    #nav-bands {display: block;}
    #text-header {position:relative;}
    .nav-fill .nav-item{margin-bottom: 2px;}
}
    
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
//    $('#exampleModalCenter').modal('show');
});
function stop()
{
    $('#exampleModalCenter').modal('hide');
    $("#div-video").empty();

}
</script>
  @endsection