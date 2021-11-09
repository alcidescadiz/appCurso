<div>
<h1>Nombre de la Empresa</h1>
<h2>Recibo de pago:</h2>
<br>
Fecha de pago: {{$pagos[0]->fecha}}
<br>
Número de pago: {{$pagos[0]->id}}
<br>
Curso adquirido: {{$pagos[0]->materia}}
<br>
Beneficiario del curso: {{$pagos[0]->alumno}}
<br>
Tipo de pago: {{$pagos[0]->tipopago}}
<br>
Monto cancelado: {{$pagos[0]->costo}}
<br>

</div>