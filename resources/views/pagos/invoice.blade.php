
@extends('layouts.app')
@section('content')
<div class="container">
   
    <h2>Descargar pagos en pdf</h2>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Fecha</th>
          <th scope="col">Curso</th>
          <th scope="col">Alumno</th>
          <th scope="col">Tipo de pago</th>
          <th scope="col">Monto</th>
          <th scope="col">Verificación</th>
          <th scope="col">Descargar Pdf</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pagos as $item)
        @if (Auth::user()->id === $item->id_user)
        <tr>
          <th> {{$item->id}}</th>
          <td> {{$item->fecha}}</td>
          <td> {{$item->materia}}</td>
          <td> {{$item->alumno}}</td>
          <td> {{$item->tipopago}}</td>
          <td> {{$item->costo}}</td>
          <td> {{$item->verificar}}</td>
          <td> <a  href="print/{{$item->id}}" target="_blank" >Ver</a></td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>






</div>
@endsection