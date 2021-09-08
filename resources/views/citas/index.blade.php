@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
          @can('admin.citas.create')
          <a href="{{route('admin.citas.create')}}" class="btn btn-success mb-3">Nueva cita</a>
          @endcan
            @if (session('info'))
            <div class="alert alert-primary" role="alert">
              <strong>{{session('info')}}</strong>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              <strong>{{session('success')}}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Litado de citas
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">paciente</th>
                              <th scope="col">Fecha y hora de la cita</th>
                              
                              <th scope="col">especialidad</th>
                           
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($citas as $cita)
                              <tr>
                                <td>{{$cita->id}}</td>
                                <td>{{$cita->paciente->nombre}} {{$cita->paciente->apellido}}</td>                               
                                <td>{{$cita->fecha}}</td>
                                <td>{{$cita->especialidad->nombre}}</td>                               
                                <td>
                                    {{-- <a href="{{route('admin.citas.edit',$cita)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                    <form  method="post" action="{{route('admin.citas.destroy',$cita)}}">
                                      @csrf()
                                      @method('delete')
                                      <button type=submit  class="btn btn-danger btn-sm">Cancelar</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        {{$citas->links()}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection