@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.especialidades.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Crear especialidad
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                            {!! Form::open(['route'=>'admin.especialidades.store']) !!}
                                <div class="form-group mb-2">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre ','autofocus']) !!}
                                    @error('nombre')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            
                           <div class="form-group mb-2">
                               {!! Form::label('medico', 'Seleccionar medico') !!}
                               {!! Form::select('id_medico', $medicos, null, ['class' => 'form-select', 'id' =>'medico']) !!}
                               @error('id_medico')
                                   <span class="text-danger">{{$message}}</span>
                               @enderror
                           </div>
                                <div class="form-group mb-2">
                                    {!! Form::submit('Crear Especialidad', ['class'=>'btn btn-success' ]) !!}
                                </div>
                            {!!Form::close() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
