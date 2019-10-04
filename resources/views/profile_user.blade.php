@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
@endsection
@section('content')
<br>
<div class="logout">
    <a href="{{ url('logout') }}"><h3>Salir</h3></a>
</div>
<h1 class="h1-login">Tu PERFIL</h1>
<div class="row">
    <div class=" col-md-4 col-xs-12"></div>
    <div class="col-md-4 col-xs-12">
        <form>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label red">Nombre</label>
                <div class="col-sm-10">
                    <label class="align-left">{{$profile->name}}</label>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label red">Email</label>
                <div class="col-sm-10">
                    <label class="align-left">{{$user->email}}</label>
                </div>
            </div>
            
            
        </form>
    </div>
    <div class="col-md-4 col-xs-12"></div>
</div>
<style>
    #footer{position:relative; bottom:0; left:0; right:0;}
    .logout {position: absolute;top: 15px;left: 113px; display:none;}
    #i-home{top:0;}
    @media screen and (max-width: 780px)
    {
        .logout{top: 10px;left: 90px;}
        .social {display: block;float: right;}
        #navbarTogglerDemo01{display:block;}
        #i-home {top: -15px;}
        label{font-size: 6vw;}
        .red {text-align: left;}
    }
</style>
@endsection