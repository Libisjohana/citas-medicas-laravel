@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
           
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
                    Litado de pacientes
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Apellido</th>
                              <th scope="col">Telefono</th>
                              <th scope="col">Direccion</th>
                              <th scope="col">Eps</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($pacientes as $paciente)
                              <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->apellido}}</td>
                                <td>{{$paciente->telefono}}</td>
                                <td>{{$paciente->direccion}}</td>
                                <td>{{$paciente->eps->nombre}}</td>
                                <td>
                                    <a href="{{route('admin.pacientes.edit',$paciente)}}" class="btn btn-primary btn-sm">Editar</a>
                                    <form  method="post" action="{{route('admin.pacientes.destroy',$paciente)}}">
                                      @csrf()
                                      @method('delete')
                                      <button type=submit  class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        {{$pacientes->links()}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection