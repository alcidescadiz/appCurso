@extends('layouts.app')
@section('content')
<div class="container">

    <br>
    Seleccione el alumno para ver sus tareas asignadas:
    <br>
    @foreach ($hijos as $item)
    <li><a  href="tareas/{{$item->id}}">{{$item->nombres.' '.$item->apellidos}}</a></li>
    @endforeach



    <br>
        












    
</div>
@endsection