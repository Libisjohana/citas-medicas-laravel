@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.eps.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Editar eps
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                             {!! Form::model($ep,['route'=>['admin.eps.update',$ep],'method'=>'put']) !!}
                                 <div class="form-group mb-2">
                                     {!! Form::label('nombre', 'Nombre') !!}
                                     {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre de la eps']) !!}
                                     @error('nombre')
                                         <span class="text-danger">{{$message}}</span>
                                     @enderror
                                 </div>
                                 <div class="form-group mb-2">
                                     {!! Form::label('descripcion', 'Descripcion') !!}
                                     {!! Form::textarea('descripcion', null, ['class'=>'form-control',"rows"=>"3",'placeholder'=>'Ingrese la descripcion de la eps']) !!}
                                 </div>
                                 <div class="form-group mb-2">
                                     {!! Form::submit('Actualizar eps', ['class'=>'btn btn-success' ]) !!}
                                 </div>
                             {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection