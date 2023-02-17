<?php

function getAreas($con){

$datos = array();
$consultaAreas="SELECT * FROM areas";
$array=mysqli_query($con, $queryExpedientes);
while ($row = mysqli_fetch_assoc($array)) {

        $datos[] = $row;   
}
$datosJson = json_encode($datos);
$resultado = json_decode($datosJson, true);

return $resultado;
}