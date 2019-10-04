@extends('layouts.sessions')
@section('header')
<link rel="stylesheet" href="{{ url('css/layout.css')}}">
<link rel="stylesheet" href="{{ url('css/redes.css')}}">
@endsection
@section('content')
<br>
<h1 class="h1-login">Registro</h1>
<div class="row" id="row-register-band">
    <div class="col-md-3 col-xs-12"></div>
    <div class="col-md-6 col-xs-12">
        <form method="POST" action="{{ url('/registro') }}" class="form-horizontal"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Username*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" placeholder="te recomendamos poner el nombre de tu banda sin espacios" name="username" value="{{ old('username') }}" pattern="[^\s]*">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabeld" class="col-sm-2 col-form-label">Email*</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="colFormLabeld" placeholder="correo para que puedas accesar" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelt" class="col-sm-2 col-form-label">Contraseña*</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="colFormLabelt" placeholder="No la olvides" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    @if ($errors->any())
                    <br>
                        <span class="help-block">
                            <strong>No olvides volver a escribir tu contraseña</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabelc" class="col-sm-2 col-form-label">Nombre de la banda*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabelc" placeholder="¿Cómo se llama tu banda?" name="name" value="{{ old('name') }}">
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
                        @if(old('gender') == "rock")
                        <option value="rock" selected>Rock</option>
                        @else
                        <option value="rock">Rock</option>
                        @endif
                        @if(old('gender') == "punk")
                        <option value="punk" selected>Punk</option>
                        @else
                        <option value="punk">Punk</option>
                        @endif
                        @if(old('gender') == "metal")
                        <option value="metal" selected>Metal</option>
                        @else
                        <option value="metal">Metal</option>
                        @endif
                        @if(old('gender') == "pop")
                        <option value="pop" selected>Pop</option>
                        @else
                        <option value="pop">Pop</option>
                        @endif
                        @if(old('gender') == "electronico")
                        <option value="electronico" selected>Electrónico</option>
                        @else
                        <option value="electronico">Electrónico</option>
                        @endif
                        @if(old('gender') == "hip-hop")
                        <option value="hip-hop" selected>Hip-Hop</option>
                        @else
                        <option value="hip-hop">Hip-Hop</option>
                        @endif
                        @if(old('gender') == "jazz")
                        <option value="jazz" selected>Jazz</option>
                        @else
                        <option value="jazz">Jazz</option>
                        @endif
                        @if(old('gender') == "reggae")
                        <option value="reggae" selected>Reggae</option>
                        @else
                        <option value="reggae">Reggae</option>
                        @endif
                        @if(old('gender') == "alternativo")
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
                            @if(old('ciudad') == $state->state)
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
                    <textarea  class="form-control" cols="20" rows="5" name="description">{{ old('description') }}</textarea>
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
                    <input type="text" class="form-control" id="colFormLabel8" placeholder="Tu username de Facebook" name="facebook" value="{{ old('facebook') }}">
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
                    <input type="text" class="form-control" id="colFormLabel9" placeholder="Tu canal de Youtube ejmplo: https://www.youtube.com/channel/UCMkSob52mENw8TZCOoGmayw" name="youtube" value="{{ old('youtube') }}">
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
                    <input type="text" class="form-control" id="colFormLabel10" placeholder="No olvides ponerlo" name="bandcamp" value="{{ old('bandcamp') }}">
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
                    <input type="text" class="form-control" id="colFormLabel11" placeholder="embed code de video en YouTube" name="youtube_url" value="{{ old('youtube_url') }}">
                    <i class="fas fa-info-circle float-right"  data-toggle="modal" data-target="#videoYoutube"></i>
                    @if ($errors->has('youtube_url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube_url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel12" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="image-upload">
                      <label for="file-input" class="label-upload">
                        <img src="{{ url('images/cover.png') }}" style="pointer-events: none;" class="img-fluid mx-auto d-block" />
                        
                      </label>

                      <input id="file-input" type="file" name="cover" />
                    

                    </div>
                    @if ($errors->has('cover'))
                    <br>
                        <span class="help-block">
                            <strong>{{ $errors->first('cover') }}</strong>
                        </span>
                    @endif
                    @if ($errors->any())
                    <br>
                        <span class="help-block">
                            <strong>No olvides volver a seleccionar tu portada</strong>
                        </span>
                    @endif
                    
                </div>
            </div>
            <div class="form-group row" id="for-image" style="display:none;">
                <label for="colFormLabel12" class="col-sm-2 col-form-label">Tu portada</label>
                <div class="col-sm-10">
                        <img id="blah" src="#" alt="" class="img-fluid mx-auto d-block" style="display:none;" />
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel13" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="accept">
                      <label class="col-form-label" for="defaultCheck1">
                        Acepto <a href="{{ url('tyc') }}">Términos y Condiciones</a>
                      </label>
                    </div>
                    @if ($errors->has('accept'))
                    <br>
                        <span class="help-block">
                            <strong>{{ $errors->first('accept') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel13" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="review">
                      <label class="col-form-label" for="defaultCheck1">
                        He revisado mi información (no podrás actualizar)
                      </label>
                    </div>
                    @if ($errors->has('review'))
                    <br>
                        <span class="help-block">
                            <strong>{{ $errors->first('review') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="colFormLabel14" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit"><img src="{{ url('images/inscribete_login.png') }}"  class="img-fluid mx-auto d-block"></button>
                    <p>* campos obligatorios</p>
                    <p>No podrás actualizar tu información revisala bien</p>
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

@endsection