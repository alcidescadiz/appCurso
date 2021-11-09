@extends('layouts.app')
@section('content')
<div class="container">
    
    <h2>lista de hijos asociados a la familia</h2>


  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar un hijo
</button>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar hijo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="{{URL::to('/')}}/hijos" method="post">
          {!! csrf_field() !!}
          <div class="mb-3">
            <label for="" class="form-label">Id User</label>
            <input type="text" readonly
             class="form-control" id="" name='id_user' value="{{ Auth::user()->id }}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nombres</label>
            <input required type="text" class="form-control" id="" name='nombres' placeholder="Nombre del Alumno">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Apellidos</label>
            <input required type="text" class="form-control" id="" name='apellidos' placeholder="Apellidos del Alumno">
            <input  type="hidden" class="form-control" value="activo" name='estatus'>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Edad</label>
            <input required type="number" class="form-control" id="" name='edad'>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fecha de Nacimiento</label>
            <input required type="date" class="form-control" id="" name='fechanacimiento'>
          </div>
          <div class="modal-footer">
            <input type="submit" value="Registrar" class="btn btn-primary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        
      </div>

    </div>
  </div>
</div>  

  <br>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Edad</th>
            <th scope="col">Fecha Nacimiento</th>
            <th style="text-align: center" scope="col" colspan="2" >Acciones</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($hijos as $item )
          @if (Auth::user()->id === $item->id_user)
            <tr>
              <th>{{$i++}} </th>
              <td> {{$item->nombres}}</td>
              <td> {{$item->apellidos}} </td>
              <td> {{$item->edad}} </td>
              <td> {{$item->fechanacimiento}} </td>
              <td style="width: 20px; text-align: center">
                <a class="btn btn-link" href="editarhijos/{{$item->id}}">Editar</a>
              </td>
              <td style="width: 20px; text-align: center">  
                <form method="POST" action="{{ url("hijos/{$item->id}") }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#eliminar">
                   Eliminar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">appCursos</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h2>¿Desea eliminar los datos de Hijo?</h2>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </td>
            </tr>

          @endif
          @endforeach
        </tbody>
      </table>

</div>

<!-- Button trigger modal -->







@endsection