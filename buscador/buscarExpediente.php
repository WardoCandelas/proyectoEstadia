<?php 
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();

$q = $_POST['q'];
?>

<script type="text/javascript" src="funciones/funciones.js"></script>
<table class="table table-borderless">
<thead class="encabezadotabla">
<tr>
    <th></th>
    <th>Nombre</th>
    <th>Clave</th>
    <th>Numero</th>
    <th>Año</th>
    <th></th>
    <th></th>
</tr>
</thead>
<?php 
foreach (getExpedientesBusqueda($con, $q) as $value) {
?>
<tr>
 <td><img  class="expediente" src="https://cdn-icons-png.flaticon.com/512/3135/3135761.png"></td>
    <td><b><?php echo $value['nombreExpediente']?></b></td>
    <td><?php echo $value['claveExpediente']?></td>
    <td><b><?php echo $value['numeroExpediente']?></b></td>
    <td><b><?php echo $value['yearExpediente']?></b></td>
    <td>
        <?php if($value['estatus_expediente'] == 1){ ?>
<p class="text-success"><b>
Aprobado
</b></p>
<?php } elseif ($value['estatus_expediente'] == 2) { ?>
<p class="text-danger"><b>
No Aprobado
</b></p>
<?php } elseif ($value['estatus_expediente'] == 0) { ?>
<p class="text-warning"><b>
En revisión
</b></p>
<?php } ?>
    </td>
   <td><button type="button" class="btn btn-secondary" onclick="detalleArchivosExpediente('<?php echo $value['id']; ?>')" ><i class="fa fa-eye" aria-hidden="true"></i></button> <button type="button" class="btn btn-secondary" onclick="nuevoArchivoFormulario('<?php echo $value['id']; ?>')" data-bs-toggle="modal" data-bs-target="#myModalCarga"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
</tr>

<?php } ?>

