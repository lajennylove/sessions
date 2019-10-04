@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
<link rel="stylesheet" href="{{ url('css/redes.css')}}">
@endsection
@section('content')
<br>
<h1 class="h1-login">Log In</h1>
<div class="row" id="row-login">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-md-6 col-xs-12">
        <form method="POST" action="{{ url('/log_in/user') }}" class="form-horizontal"  enctype="multipart/form-data">
            {{ csrf_field() }}
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
                    <button type="submit" class="btn-red">Login</button>
                    <p>* campos obligatorios</p>
                </div>
            </div>
            <hr>
            <a href="{{ url('/redirect')}}" class=""><img src="{{ url('images/login_facebook.png') }}" class="img-fluid mx-auto d-block" id="img-login-facebook" style=""></a>
            <br>
        </form>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>
@endsection