@extends('plantilla')
@section('contenido')
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-8 offset-lg-2">
            <div class="gap-2 mb-2 d-grid">
              <a href="{{ route('pregrados.create') }}" class="btn btn-dark">
                Añadir Pregrado
              </a> 
              
              <div class= "registros mt-5">
                
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Plan de Estudio</th>
                      <th class="col">Duración</th>
                      <th class="col">Facultad</th>
                      <th class="col">Título</th>
                      <th class="col">Estado</th>
                      <th class="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pregrado as $pre)                     
                    <tr>
                      <th scope="row">{{ $pre->id}}</th>
                      <td> {{ $pre->nombre}}</td>
                      <td>
                        <img src="{{asset('storage'. $pre->img)}}" alt="" width="100">
                      </td>
                      <td>{{ $pre->plasEs}}</td>
                      <td>{{ $pre->duracion}}</td>
                      <td>{{ $pre->facultad}}</td>
                      <td>{{ $pre->titulo}}</td>
                      <td>{{ $pre->estado == 1 ? 'Activo' : 'Inactivo'}}</td>  
                      <td>
                      <a href="{{ route('pregrados.edit', $pre->id)}}" class="btn btn-success">
                      Editar  
                      </a>  
                      <form action="{{ route('pregrados.destroy', $pre->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button  class="btn btn-danger" type="submit">Eliminar</button>              
                      </form>

                      </td>                 
                    </tr>                  
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection