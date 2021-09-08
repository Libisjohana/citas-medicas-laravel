@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.eps.create')}}" class="btn btn-success mb-3">Crear eps</a>
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
                    Litado de eps
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Activo</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($eps as $ep)
                              <tr>
                                <td>{{$ep->id}}</td>
                                <td>{{$ep->nombre}}</td>
                                <td>{{$ep->descripcion}}</td>
                                <td>{{$ep->activo}}</td>
                                <td>
                                    <a href="{{route('admin.eps.edit',$ep)}}" class="btn btn-primary btn-sm">Editar</a>
                                    <form  method="post" action="{{route('admin.eps.destroy',$ep)}}">
                                      @csrf()
                                      @method('delete')
                                      <button type=submit  class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            
                          </tbody>
                        </table>
                        {{$eps->links()}}
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection