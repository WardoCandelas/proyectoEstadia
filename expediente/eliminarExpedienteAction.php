<?php
include "../query/query.php";
include "../conexionBD/conexionBD.php";

$idExpediente = 2;

foreach (getExpedientesId($con, $idExpediente) as $value) { 
if(file_exists("../archivos/".$value['nombreExpediente']."-".$value['claveExpediente']."-".$value['numeroExpediente']."-".$value['yearExpediente'])){
   
$directorio = "../archivos/".$value['nombreExpediente']."-".$value['claveExpediente']."-".$value['numeroExpediente']."-".$value['yearExpediente'];

borrar_directorio($directorio);

    $deleteRutaExpediente = "DELETE FROM expedientes WHERE id = '$idExpediente'";
mysqli_query($con, $deleteRutaExpediente);


$deleteArchivosExpediente = "DELETE FROM archivos WHERE id_expediente = '$idExpediente'";
mysqli_query($con, $deleteArchivosExpediente);
}
}
