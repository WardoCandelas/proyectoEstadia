<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();

//Recibimos expediente a validar
$idExpediente = $_POST['id'];

//Recibimos valor de identificacion Aprobar/No aprobar
$aprobarDesaprobar = $_POST['accion'];

if ($aprobarDesaprobar == 1) {
$aprobar = "UPDATE expedientes SET estatus_expediente = '1' WHERE id = '$idExpediente'";
mysqli_query($con, $aprobar);
?>
<div class="alert alert-success" id="alertaValidacion" role="alert">
Expediente Aprobado!
</div>
<?php }

else {
$noAprobar = "UPDATE expedientes SET estatus_expediente = '2' WHERE id = '$idExpediente'";
mysqli_query($con, $noAprobar);
?>
<div class="alert alert-danger" id="alertaValidacion" role="alert">
Expediente No Aprobado!
</div>
<?php }




