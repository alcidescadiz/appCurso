@extends('layouts.app')
@section('content')
<div class="container">

    <br>

   <h2>Cursos registrados: {{  count($cursos) }}</h2>
   @foreach ($cursos as $item)
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <h3 class="fw-bold">{{$item->materia}}</h3>
            Adquirido para: {{$item->alumno}}
            <br>
            Fecha de inicio: {{$item->fecha}} 
          </div>
          <span class="badge bg-success rounded-pill">horas: 55</span>
        </li>
    </ol>
    @endforeach













    
</div>
@endsection