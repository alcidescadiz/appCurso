@extends('layouts.app')
@section('content')
<div class="container">

   <h3> Registrar y mostrar pagos de cursos</h3>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Realizar un pago
</button>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Realizar un pago:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  action="{{URL::to('/')}}/pagos"  method="post">
          {!! csrf_field() !!} 
          <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input required type="date"  class="form-control" name='fecha' value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Id User</label>
            <input type="text" readonly class="form-control" name='id_user' value="{{ Auth::user()->id }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Beneficiario del curso:</label>
            <select class="form-control" id="" rows="3" name="id_hijos">
              @foreach ($hijos as $item)
              @if (Auth::user()->id === $item->id_user)
              <option value="{{$item->id}}">{{$item->nombres." ".$item->apellidos}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Curso a comprar:</label>
            <select class="form-control" id="cursos" rows="3" name="id_cursos" onchange="selectcosto()">
              <option value=""></option>
              @foreach ($cursos as $item)
    
              <option value="{{$item->id}}">{{$item->materia}}</option>
    
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Costo del curso:</label>
            <select type="number"  value=""  class="form-control" name='' id="costoc" disabled>
              <option value=""></option>
            @foreach ($cursos as $item)
            <option value="{{$item->id}}">{{$item->costo}}</option>
            @endforeach
            </select>
            <input type="hidden" name="costo" id="monto">
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo de pago:</label>
            <select class="form-control" id="" rows="3" name="tipopago">
              <option value="pagomovil">Pago Movil</option>
              <option value="transferencia">Transferencia</option>
            </select>
          </div>
          <input type="hidden"  class="form-control" name='verificar' value="pendiente...">
          <input type="hidden"  class="form-control" name='estatus' value="iniciado">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Procesar pago</button>
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
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Curso</th>
            <th scope="col">Alumno</th>
            <th scope="col">Tipo de pago</th>
            <th scope="col">Monto</th>
            <th scope="col">Verificación</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pagos as $item)
          @if (Auth::user()->id === $item->id_user)
          <tr>
            <th> {{$i++}}</th>
            <td> {{$item->fecha}}</td>
            <td> {{$item->materia}}</td>
            <td> {{$item->alumno}}</td>
            <td> {{$item->tipopago}}</td>
            <td> {{$item->costo}}</td>
            <td> {{$item->verificar}}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    
</div>
<script>
    function selectcosto(){
    
    idselect=document.getElementById("cursos").value;
    document.getElementById("costoc").value = idselect;
    //alert(idselect)
    //el valor de texto del select producto
    combo = document.getElementById("costoc");
    selected = combo.options[combo.selectedIndex].text;
    document.getElementById("monto").value = selected;
    //alert('hi');
    }
</script>
@endsection