@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.eps.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Editar usuario
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="h5">Nombre:</p>
                            <p class="form-control">{{$usuario->name}}</p>
                            <h2 class="h5">Listado de roles</h2>
                             {!! Form::model($usuario,['route'=>['admin.users.update',$usuario],'method'=>'put']) !!}
                                 
                                 @foreach($roles as $role)
                                    <div>
                                        <label for="">
                                            {!! Form::checkbox("roles[]", $role->id, null, ['class'=>'mr-1']) !!}
                                            {{$role->name}}
                                        </label>
                                    </div>
                                 @endforeach
                                 <div class="form-group mb-2">
                                     {!! Form::submit('Asignar role', ['class'=>'btn btn-success' ]) !!}
                                 </div>
                             {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection