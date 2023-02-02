
<?php 
include "../conexionBD/conexionBD.php";
include "../query/query.php";


session_start();
?>
<script type="text/javascript" src="funciones/funciones.js"></script>
<style type="text/css" src>
<style>
    table{
        width: 100%;
        height: 100%;
    }

    .expediente{
        width: 100%;
        height: 100%;
         
    }
</style>



<form name="buscar" id="buscar"><!--FORMULARIO DE BUSQUEDA DE EXPEDIENTES OEAC 31/1/23-->  
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Buscar expediente" id="q" name="q">
  <div class="input-group-append">
    <button class="btn btn-danger" style="color:white" type="submit" id="buscarb" name="buscarb"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div></div>
</form>

 <div class="card" style="" id="expediente">
  <div class="card-body">
    <h5 class="card-title">Expedientes</h5>

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
foreach (getExpedientes($con) as $value) {
?>
<tr>
 <td><img  class="expediente" src="https://cdn-icons-png.flaticon.com/512/3135/3135761.png"></td>
    <td><b><?php echo $value['nombreExpediente']?></b></td>
    <td><?php echo $value['claveExpediente']?></td>
    <td><b><?php echo $value['numeroExpediente']?></b></td>
    <td><b><?php echo $value['yearExpediente']?></b></td>
    <td><button type="button" class="btn btn-danger" onclick="nuevoArchivoFormulario('<?php echo $value['id']; ?>')"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></button></td>
</tr>

<?php } ?>



    

</table>
</div>
</div>



