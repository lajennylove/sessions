@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Video de {{$user->name}}</div>
                    <div class="card-body">
                        @if($word == "index")
                        <a href="{{ url('/week', $week) }}" title="Back"><button class="btn btn-danger btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> regresar</button></a>
                        @elseif($word == "rejects")
                        <a href="{{ url('/week/'.$week.'/rejects') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> regresar</button></a>
                        @else
                        <a href="{{ url('/week/'.$week.'/noactive') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> regresar</button></a>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nombre</th><td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th><td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Clicks</th><td>{{ $user->clicks }}</td>
                                    </tr>
                                    <tr>
                                        <th>Votes</th><td>{{ $user->votes }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto</th><td><img src="{{ url('photos/'.$user->photo) }}" class="img-fluid" style="max-height:300px;"></td>
                                    </tr>
                                    <tr>
                                        <th>Categoría</th>
                                        <td>
                                            @if($cat_video == "na")
                                                @if($user->is_active == true)
                                                    {!! Form::open(['url' => '/week/'.$week.'/category/'.$user->id, 'class' => 'form-horizontal']) !!}
                                                        <div class="form-group{{ $errors->has('categories') ? ' has-error' : ''}}">
                                                            {!! Form::label('category', 'Categoría: ', ['class' => 'col-md-4 control-label']) !!}
                                                            <div class="col-md-6">
                                                                <select name="category_id" class="form-control">
                                                                    @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group{{ $errors->has('button') ? ' has-error' : ''}}">
                                                            {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
                                                            <div class="col-md-6">
                                                                <button class="btn btn-success form-control" type="submit">Guardar</button>
                                                            </div>
                                                        </div>
                                                    {!! Form::close() !!}
                                                @else
                                                    Sin Categorizar
                                                @endif
                                            @else
                                            {{$cat_video}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Día y Hora de creación</th><td>{{ $user->created_at }}</td>
                                    </tr>
                                    <tr style="height: 300px;">
                                       <th>Video</th> 
                                        <td  style="height: 300px;">
                                            <div class="embed-responsive embed-responsive-16by9"  style="height: 300px;">
                                                <video class="embed-responsive-item" controls>
                                                    <source src="{{ $user->video_url }}">
                                                </video>
                                            </div>
                                        </td>
                                    </tr>
                                    @if($user->is_active == false)
                                    <tr>
                                        <td><a href="{{url('week/'.$week.'/reject/'.$user->id)}}"><button class="btn btn-danger">Rechazar</button></a></td>
                                        <td>
                                        {!! Form::open(['url' => '/week/'.$week.'/accept/'.$user->id, 'class' => 'form-horizontal']) !!}
                                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : ''}}">
                                                {!! Form::label('category', 'Categoría: ', ['class' => 'col-md-4 control-label']) !!}
                                                <div class="col-md-6">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('button') ? ' has-error' : ''}}">
                                                {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
                                                <div class="col-md-6">
                                                    <button class="btn btn-success form-control" type="submit">Aprobar</button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
