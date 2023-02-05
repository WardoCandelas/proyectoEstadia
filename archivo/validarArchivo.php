<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();


//aqui va la parte de validar archivos
?>
 <div class="card" style="" id="expediente">
  <div class="card-body">
    <h5 class="card-title">Validar Expedientes</h5>

<table class="table table-borderless">
<thead class="encabezadotabla">
<tr>
    <th></th>
    <th>Nombre</th>
    <th>Clave</th>
    <th>Numero</th>
    <th>Año</th>
    <th></th>
</tr>
</thead>
<?php  
foreach (getExpedientesValidacion($con) as $value) {
?>
<tr>
 <td><img  class="expediente" src="https://cdn-icons-png.flaticon.com/512/3135/3135761.png"></td>
    <td><b><?php echo $value['nombreExpediente']?></b></td>
    <td><?php echo $value['claveExpediente']?></td>
    <td><b><?php echo $value['numeroExpediente']?></b></td>
    <td><b><?php echo $value['yearExpediente']?></b></td>
    <td><button type="button" class="btn btn-danger" onclick="detalleArchivosExpediente('<?php echo $value['id']; ?>')"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></button></td>
</tr>

<?php } ?>



    

</table>
</div>
</div>

