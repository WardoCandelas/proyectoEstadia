<?php 
include "../conexionBD/conexionBD.php";

date_default_timezone_set('America/Mexico_City');
//Recibimos las datos del formulario
$nombreExpediente = $_POST['no_e'];
$claveExpediente = $_POST['c_e'];
$numeroExpediente = $_POST['nu_e'];
$yearExpediente = $_POST['y_e'];
$observacionesExpediente = $_POST['o_e'];
$fechaActual = date('Y-m-d');
//Asignamos la ruta 
$micarpeta = "../archivos/".$nombreExpediente."-".$claveExpediente."-".$numeroExpediente."-".$yearExpediente;

//Validamos si la carpeta existe, si es asi, no la crea
if (!file_exists($micarpeta)) {
    //Creamos carpeta
    mkdir($micarpeta, 0777, true);
    //Insertamos los datos en la BD
    $insertExpediente = "INSERT INTO expedientes VALUES (null, '$nombreExpediente', '$claveExpediente', '$numeroExpediente', '$yearExpediente', '$observacionesExpediente', '0', '$fechaActual')";
    mysqli_query($con, $insertExpediente); 
    echo $insertExpediente;?>
<br>
<div class="alert alert-success" role="alert">
  Expediente Creado Correctamente!
</div>

<?php } else { ?>

    <div class="alert alert-danger" role="alert">
  Error: El Expediente ya existe!
</div>

<?php } ?>