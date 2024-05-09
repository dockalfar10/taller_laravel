@extends('plantilla')

@section('contenido')

    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-8 offset-lg-2">
            <div class="gap-2 mb-2 d-grid">
              <a href="{{ route('pregrados.index')}}" class="btn btn-outline-secondary mb-3">
                Volver a Pregrados 
              </a>

                <div class="formulario">
                  <form class="was-validated" enctype="multipart/form-data" method="POST" action="{{route('pregrados.update', $pregrado->id)}}">
                    @csrf
                    @method('PUT')
    
                      <div class="mb-3">
                        <label for="validationServer05" class="form-label">Nombre</label>
                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="nombre" value="{{$pregrado->nombre}}">                    
                      </div>
    
                      <div class="mb-3">
                        
                        <input type="file" class="form-control" id="img" name="img">
                        <div class="invalid-feedback">Agregue una imagen.</div>
                        @if ($pregrado->img)
                            <img src="{{ asset('storage/' . $pregrado->img) }}" alt="{{ $pregrado->nombre }}" width="200">
                        @endif
                    </div>                    
    
                      <div class="mb-3">
                        <label for="validationServer05" class="form-label">Plan de Estudio</label>
                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="plasEs" value="{{$pregrado->plasEs}}">                    
                      </div>                
                  
    
                      <div class="mb-3">
                        <label for="validationServer05" class="form-label">Duración</label>
                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="duracion" value="{{$pregrado->duracion}}" >                    
                      </div>
    
                      
                      <div class="mb-3">
                        <label for="validationServer05" class="form-label">Facultad</label>
                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="facultad" value="{{$pregrado->facultad}}" >                    
                      </div>
    
                      <div class="mb-3">
                        <label for="validationServer05" class="form-label">Título</label>
                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="titulo" value="{{$pregrado->titulo}}" >                    
                      </div>         
              
                  
                    <div class="mb-3">
                        <label for="validationServer05" class="form-label">Estado</label>
                      <select class="form-select" required aria-label="select example" name="estado">
                        <option value="" disabled>Estado</option>
                        <option value="1" {{ $pregrado->estado == 1 ? 'selected' : ''}}>Activo</option>
                        <option value="2" {{ $pregrado->estado == 2 ? 'selected' : ''}}>Inactivo</option>                    
                      </select>
                      <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                  
                    
                  
                    <div class="mb-3">
                      <button class="btn btn-primary" type="submit" >Enviar Pregrado</button>
                    </div>
                  </form>
                </div>
                

            </div>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Pregado</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="was-validated" enctype="multipart/form-data" method="POST" action="{{url('pregrados')}}">
                @csrf

                  <div class="mb-3">
                    <label for="validationServer05" class="form-label">Nombre</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="nombre">                    
                  </div>

                  <div class="mb-3">
                    <input type="file" class="form-control" aria-label="file example" required name="img">
                    <div class="invalid-feedback">Agregue una imagen</div>
                  </div>

                  <div class="mb-3">
                    <label for="validationServer05" class="form-label">Plan de Estudio</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="plasEs">                    
                  </div>                
              

                  <div class="mb-3">
                    <label for="validationServer05" class="form-label">Duración</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="duracion">                    
                  </div>

                  
                  <div class="mb-3">
                    <label for="validationServer05" class="form-label">Facultad</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="facultad">                    
                  </div>

                  <div class="mb-3">
                    <label for="validationServer05" class="form-label">Título</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required name="titulo">                    
                  </div>         
          
              
                <div class="mb-3">
                    <label for="validationServer05" class="form-label">Estado</label>
                  <select class="form-select" required aria-label="select example" name="estado">
                    <option value="" disabled>Estado</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>                    
                  </select>
                  <div class="invalid-feedback">Example invalid select feedback</div>
                </div>
              
                
              
                <div class="mb-3">
                  <button class="btn btn-primary" type="submit" >Enviar Pregrado</button>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection