@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
<link rel="stylesheet" href="{{ url('css/redes.css')}}">
@endsection
@section('content')
<div class="logout">
    <a href="{{ url('profile_band') }}"><h3>Regresar</h3></a>
</div>
<br>
<h1 class="h1-login">Editar</h1>
<div class="row" id="row-register-band">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-md-6 col-xs-12">
        <form method="POST" action="{{ url('/profile_band/edit', $band->username) }}" class="form-horizontal"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="colFormLabelc" class="col-sm-2 col-form-label">Nombre de la banda*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabelc" placeholder="¿Cómo se llama tu banda?" name="name" value="{{ $band->name }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel5" class="col-sm-2 col-form-label">Género*</label>
                <div class="col-sm-10">
                    <select class="custom-select form-control" id="colFormLabel5" name="gender">
                        @if($band->gender == "rock")
                        <option value="rock" selected>Rock</option>
                        @else
                        <option value="rock">Rock</option>
                        @endif
                        @if($band->gender == "punk")
                        <option value="punk" selected>Punk</option>
                        @else
                        <option value="punk">Punk</option>
                        @endif
                        @if($band->gender == "metal")
                        <option value="metal" selected>Metal</option>
                        @else
                        <option value="metal">Metal</option>
                        @endif
                        @if($band->gender == "pop")
                        <option value="pop" selected>Pop</option>
                        @else
                        <option value="pop">Pop</option>
                        @endif
                        @if($band->gender == "electronico")
                        <option value="electronico" selected>Electrónico</option>
                        @else
                        <option value="electronico">Electrónico</option>
                        @endif
                        @if($band->gender == "hip-hop")
                        <option value="hip-hop" selected>Hip-Hop</option>
                        @else
                        <option value="hip-hop">Hip-Hop</option>
                        @endif
                        @if($band->gender == "jazz")
                        <option value="jazz" selected>Jazz</option>
                        @else
                        <option value="jazz">Jazz</option>
                        @endif
                        @if($band->gender == "reggae")
                        <option value="reggae" selected>Reggae</option>
                        @else
                        <option value="reggae">Reggae</option>
                        @endif
                        @if($band->gender == "alternativo")
                        <option value="alternativo" selected>Alternativo</option>
                        @else
                        <option value="alternativo">Alternativo</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel6" class="col-sm-2 col-form-label">Estado*</label>
                <div class="col-sm-10">
                    <select class="custom-select form-control" id="colFormLabel6" name="ciudad">
                        @foreach($states as $state)
                            @if($band->ciudad == $state->state)
                                <option value="{{$state->state}}" selected>{{$state->state}}</option>
                            @else
                                <option value="{{$state->state}}">{{$state->state}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel7" class="col-sm-2 col-form-label">BIO*</label>
                <div class="col-sm-10">
                    <textarea  class="form-control" cols="20" rows="5" name="description">{{ $band->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel8" class="col-sm-2 col-form-label">facebook*</label>
                <div class="input-group col-sm-10">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="colFormLabel8" placeholder="Tu username de Facebook" name="facebook" value="{{ $band->facebook }}">
                </div>
                    @if ($errors->has('facebook'))
                    <br>
                <label for="colFormLabel8" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                </div>
                    @endif
            </div><div class="form-group row">
                <label for="colFormLabel9" class="col-sm-2 col-form-label">youtube*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel9" placeholder="Tu canal de Youtube ejmplo: https://www.youtube.com/channel/UCMkSob52mENw8TZCOoGmayw" name="youtube" value="{{ $band->youtube }}">
                    @if ($errors->has('youtube'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel10" class="col-sm-2 col-form-label">Id del Album (bandcamp)*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel10" placeholder="No olvides ponerlo" name="bandcamp" value="{{ $band->bandcamp }}">
                    <i class="fas fa-info-circle float-right"  data-toggle="modal" data-target="#videoBandcamp"></i>
                    @if ($errors->has('bandcamp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bandcamp') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel11" class="col-sm-2 col-form-label">Embed de youtube*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel11" placeholder="embed code de video en YouTube" name="youtube_url" value="{{ $band->youtube_url }}">
                    <i class="fas fa-info-circle float-right"  data-toggle="modal" data-target="#videoYoutube"></i>
                    @if ($errors->has('youtube_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube_url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel14" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-red" type="submit">Actualizar</button>
                    <p>* campos obligatorios</p>
                </div>
            </div>
            
        </form>
    </div>
    <div class="col-md-3 col-xs-12"></div>
</div>
<div class="modal fade" id="videoBandcamp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="embed-responsive embed-responsive-21by9">
            <video  class="mx-auto d-block embed-responsive-item" controls>
                <source src="{{ url('video/bandcamp.mp4') }}" type="video/mp4">
                <img src="{{ url('video/bandcamp.gif') }}" class="img-fluid mx-auto d-block">
            </video>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="videoYoutube" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-21by9">
            <video  class="mx-auto d-block embed-responsive-item" controls>
                <source src="{{ url('video/youtube.mp4') }}" type="video/mp4">
                <img src="{{ url('video/youtube.gif') }}" class="img-fluid mx-auto d-block">
            </video>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
      $('#blah').attr('style', 'display:block !Important;max-height: 100px;');
      $('#for-image').attr('style', 'display:block !Important;');
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file-input").change(function() {
  readURL(this);
});
</script>
<style>
    .logout {position: absolute;top: 15px;left: 113px;}
    #footer{position:relative; bottom:0; left:0; right:0;}
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