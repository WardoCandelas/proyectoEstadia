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
    <h5 class="card-title"> Expedientes</h5>



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
    <td><button type="button" class="btn btn-danger" onclick="detalleArchivosExpediente('<?php echo $value['id']; ?>')"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></button></td>
</tr>

<?php } ?>



    

</table>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



