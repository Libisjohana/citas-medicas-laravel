@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.citas.index')}}" class="btn btn-primary mb-3">Regresar</a>
            <div class="card">
                <div class="card-header">
                    Editar citas
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                             {!! Form::model($cita,['route'=>['admin.citas.update',$cita],'method'=>'put']) !!}
                             <div class="form-group mb-2">
                                {!! Form::label('name', 'Fecha') !!}
                                {!! Form::datetimelocal('fecha', null, ['class'=>'form-control','placeholder'=>'Escoja una fecha','autofocus']) !!}
                                @error('fecha')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>               
                           
                           <div class="form-group mb-2">
                            {!! Form::label('cita', 'Seleccionar cita') !!}
                            {!! Form::select('id_especialidad', $especialidades, null, ['class' => 'form-select', 'id' =>'cita']) !!}
                            @error('id_medico')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                                 <div class="form-group mb-2">
                                     {!! Form::submit('Editar cita', ['class'=>'btn btn-success' ]) !!}
                                 </div>
                             {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection