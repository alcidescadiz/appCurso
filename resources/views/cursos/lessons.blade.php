@extends('layouts.app')
@section('content')
<div class="container">

  <a href="{{route('tareas')}}">Volver a Lessons</a>

    <br>

    @foreach ($tareas as $item)
    <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Alumno: {{$item->alumno}}
              <br>
              Materia: {{$item->materia}}
            </button>
          </h2>
        </div>
    
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            Objetivo:
            <br>
            <li>{{$item->objetivo}}</li>
            <br>
            Video:
            <br>
            <div style="text-align: center;"><iframe width="560" height="315"  src={{$item->linkvideo}} frameborder="0"></iframe></div>
              
            <br>
            Descripción de la tarea:
            <br>
            <li>{{$item->tarea}}</li>
            <br>
            {{$item->estatus}}
              
          </div>
        </div>
      </div>
        
    </div>
    @endforeach










    
</div>
@endsection