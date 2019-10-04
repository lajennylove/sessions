@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Bandas</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Total de bandas: {{$total}}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ url('/admin/download') }}" class="btn btn-success btn-sm" title="Add New User">
                                    <i class="fa fa-download" aria-hidden="true"></i> Descargar
                                </a>    
                            </div>
                            <div class="col-md-4">
                        
                                {!! Form::open(['method' => 'GET', 'url' => '/admin', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!} 
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th><th>Clicks</th>
                                        <th>Votes</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bands as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->clicks }}</td>
                                        <td>{{ $item->votes }}</td>
                                        
                                        <td>
                                            <a href="{{ url('/admin/band/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/edit/' . $item->id) }}" title="View User"><button class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $bands->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
