@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.medicos.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Crear medico
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            {!! Form::open(['route'=>'admin.medicos.store']) !!}
                            <div class="form-group mb-2">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre ','autofocus']) !!}
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
                            {!! Form::label('email', 'Correo') !!}
                            {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Ingrese el numero de telefono']) !!}
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                           <div class="form-group mb-2">
                            {!! Form::label('password', 'Contraseña') !!}
                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese la contraseña']) !!}
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            {!! Form::label('password', 'Repite contraseña') !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Repite la contraseña']) !!}
                            @error('password_confirmation')
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
                                    {!! Form::submit('Crear Medico', ['class'=>'btn btn-success' ]) !!}
                                </div>
                            {!!Form::close() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
