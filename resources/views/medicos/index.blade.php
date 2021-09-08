@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.medicos.create')}}" class="btn btn-success mb-3">Crear medicos</a>
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
                    Litado de medicos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apelldio</th>
                              <th scope="col">Telefono</th>
                              <th scope="col">Hora inicio</th>
                              <th scope="col">Hora salida</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($medicos as $medico)
                              <tr>
                                <td>{{$medico->id}}</td>
                                <td>{{$medico->nombre}}</td>
                                <td>{{$medico->apellido}}</td>
                                <td>{{$medico->telefono}}</td>
                                <td>{{$medico->hora_inicio}}</td>
                                <td>{{$medico->hora_salida}}</td>
                                
                                <td>
                                    <a href="{{route('admin.medicos.edit',$medico)}}" class="btn btn-primary btn-sm">Editar</a>
                                    <form  method="post" action="{{route('admin.medicos.destroy',$medico)}}">
                                      @csrf()
                                      @method('delete')
                                      <button type=submit  class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        {{$medicos->links()}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection