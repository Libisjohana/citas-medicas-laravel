@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.medicos.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Editar medicos
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                             {!! Form::model($medico,['route'=>['admin.medicos.update',$medico],'method'=>'put']) !!}
                             <div class="form-group mb-2">
                                 {!! Form::label('name', 'Nombre') !!}
                                 {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre ','autofocus']) !!}
                                 @error('name')
                                     <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                             <div class="form-group mb-2">
                                {!! Form::label('apellido', 'Apellido') !!}
                                {!! Form::text('apellido', null, ['class'=>'form-control','placeholder'=>'Ingrese el apellido']) !!}
                                @error('apellido')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                {!! Form::label('telefono', 'Telefono') !!}
                                {!! Form::text('telefono', null, ['class'=>'form-control','placeholder'=>'Ingrese el numero de telefono']) !!}
                                @error('telefono')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                         
                         
                            <div class="form-group mb-2">
                                {!! Form::label('hora_inicio', 'Hora de inicio') !!}
                                {!! Form::time('hora_inicio', null, ['class'=>'form-control','placeholder'=>'Ingrese la hora de inicio']) !!}
                                @error('hora_inicio')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                {!! Form::label('hora_salida', 'Hora de salida') !!}
                                {!! Form::time('hora_salida', null, ['class'=>'form-control','placeholder'=>'Ingrese la hora de salida']) !!}
                                @error('hora_inicio')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                                 <div class="form-group mb-2">
                                     {!! Form::submit('Editar Medico', ['class'=>'btn btn-success' ]) !!}
                                 </div>
                             {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection