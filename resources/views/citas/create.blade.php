@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.citas.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Crear cita
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            {!! Form::open(['route'=>'admin.citas.store']) !!}
                            <div class="form-group mb-2">
                                {!! Form::label('name', 'Fecha') !!}
                                {!! Form::datetimelocal('fecha', null, ['class'=>'form-control','placeholder'=>'Escoja una fecha','autofocus']) !!}
                                @error('fecha')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>               
                           
                           <div class="form-group mb-2">
                            {!! Form::label('medico', 'Seleccionar cita') !!}
                            {!! Form::select('id_especialidad', $especialidades, null, ['class' => 'form-select', 'id' =>'medico']) !!}
                            @error('id_medico')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                          
                                <div class="form-group mb-2">
                                    {!! Form::submit('Crear cita', ['class'=>'btn btn-success' ]) !!}
                                </div>
                            {!!Form::close() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
