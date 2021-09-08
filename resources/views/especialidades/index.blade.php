@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.especialidades.create')}}" class="btn btn-success mb-3">Crear especialidades</a>
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
                    Litado de especialidades
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Medico</th>
                              
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($especialidades as $especialidad)
                              <tr>
                                <td>{{$especialidad->id}}</td>
                                <td>{{$especialidad->nombre}}</td>
                                <td>{{$especialidad->medico->nombre}} {{$especialidad->medico->apellido}}</td>
                                <td>
                                    <a href="{{route('admin.especialidades.edit',$especialidad)}}" class="btn btn-primary btn-sm">Editar</a>
                                    <form  method="post" action="{{route('admin.especialidades.destroy',$especialidad)}}">
                                      @csrf()
                                      @method('delete')
                                      <button type=submit  class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        {{$especialidades->links()}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection