@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
@endsection
@section('content')
<br>
<div class="logout">
    <a href="{{ url('profile_band/edit/'.$band->username) }}"><h3>Editar</h3></a>
</div>
<h1 class="h1-login">Tu PERFIL</h1>
<div class="row">
    <div class="col-md-2 col-xs-12"></div>
    <div class="col-md-8 col-xs-12">
        <form>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Username</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->username}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Email</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$user->email}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Género</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->gender}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Estado</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->ciudad}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">BIO</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->description}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Facebook</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->facebook}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Youtube</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$band->youtube}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">ID album BANDCAMP</label>
                <div class="col-sm-8">
                    <iframe style="border: 0; width: 100%; height: 120px;" src="https://bandcamp.com/EmbeddedPlayer/album={{$band->bandcamp}}/size=large/bgcol=333333/linkcol=e32c14/tracklist=false/artwork=none/transparent=true/" seamless></iframe>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Video de Youtube</label>
                <div class="col-sm-8">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="{{ url($band->youtube_url) }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-4 col-form-label red">Votos</label>
                <div class="col-sm-8">
                    <label class="align-left">{{$cont}}</label>
                </div>
            </div>
            
        </form>
    </div>
    <div class="col-md-2 col-xs-12"></div>
</div>
<style>
    #footer{position:relative; bottom:0; left:0; right:0;}
    .logout {position: absolute;top: 15px;left: 113px;}
    #i-home{top:0;}
    label{font-size: 1.3vw;}
    @media screen and (max-width: 780px)
    {
        #footer{position: relative;}
        .logout{top: 10px;left: 90px;}
        .social {display: block;float: right;}
        #navbarTogglerDemo01{display:block;}
        #i-home {top: -15px;}
        label{font-size: 6vw;}
        .red {text-align: left;}
        form{padding-left: 10px;}
    }
</style>
@endsection