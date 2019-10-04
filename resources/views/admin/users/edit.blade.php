@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Banda</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/band/'.$band->id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/band/'.$band->id) }}" class="form-horizontal"  enctype="multipart/form-data">
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
                                <div class="col-sm-10">
                                    
                                    <input type="text" class="form-control" id="colFormLabel8" placeholder="Tu username de Facebook" name="facebook" value="{{ $band->facebook }}">
                                    @if ($errors->has('facebook'))
                                    <br>
                                    <label for="colFormLabel8" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                    </div>
                                    @endif
                                </div>
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
                                    <button class="btn btn-success" type="submit">Actualizar</button>
                                    <p>* campos obligatorios</p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
