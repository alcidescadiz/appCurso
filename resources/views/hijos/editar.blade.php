@extends('layouts.app')
@section('content')


    <div class="container">   
      @if ( Auth::user()->id != $hijo->id_user)
      <a href="{{ url('hijos') }}">Volver </a>
      @else   
      <h2>Editar los datos del alumno:</h2>  
          <form class="" action="{{ url('actualizar/'.$hijo->id.'/edit')}}" method="POST"  style="width: 450px">
            @csrf
            {{ method_field('PUT')}}
            <div class="mb-3">
              <label for="" class="form-label">Id User</label>
              <input type="text" readonly
              class="form-control" id="" name='id_user' value="{{ Auth::user()->id }}">
  
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Nombres</label>
              <input type="text" class="form-control" value="{{ $nombres }}"  name='nombres' placeholder="Nombre del Alumno">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Apellidos</label>
              <input type="text" class="form-control" value="{{ $hijo->apellidos }}"  name='apellidos' placeholder="Apellidos del Alumno">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Edad</label>
              <input type="number" class="form-control" value="{{ $hijo->edad }}"  name='edad'>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" value="{{ $fecha }}"  name='fechanacimiento'>
            </div>

              <button type="submit" class="btn btn-primary">Editar</button>
              <a class="btn btn-primary" href="{{route('hijos')}}"> Cancelar</a>
            </div>
          </form>
          @endif
      </div>      


  @endsection