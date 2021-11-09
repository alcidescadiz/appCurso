@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cursos disponbles:</h2>
    <div class="row justify-content-center">
      @foreach ($cursos as $item) 
      <div class="card" style="width: 18rem;">
        <img src="{{$item->imagen}}" class="card-img-top" alt="...">
        <div class="card-body"  style="text-align: center">
          <h5 class="card-title">{{$item->materia}}</h5>
          <p class="card-text">
            Número de tareas: {{$item->tareas}}
            <br>
            Horas académicas: {{$item->horas}}</p>
          <a href="{{route('pagos')}}" class="btn btn-primary">Comprar por: {{$item->costo}} Bs</a>
        </div>
      </div>
      @endforeach
       
    </div>
</div>
@endsection
