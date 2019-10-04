@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
<link rel="stylesheet" href="{{ url('css/redes.css')}}">
@endsection
@section('content')

<br>
<h1 class="h1-login">Registro</h1>
<div class="row" id="row-login">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-md-6 col-xs-12">
        <br>
        <a href="{{ url('/redirect')}}" class=""><img src="{{ url('images/login_facebook.png') }}" class="img-fluid mx-auto d-block" id="img-login-facebook"></a>
        <hr>
        <br>
        <form method="POST" action="{{ url('/registro/user') }}" class="form-horizontal"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Nombre*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="Te servira para compartir tu página" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="colFormLabel" placeholder="correo para que puedas accesar" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Contraseña*</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="colFormLabel" placeholder="No la olvides" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit"><img src="{{ url('images/inscribete_login.png') }}"  class="img-fluid mx-auto d-block"></button>
                    <p>* campos obligatorios</p>
                </div>
            </div>
            
        </form>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>
@endsection