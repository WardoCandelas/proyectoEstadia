<?php 
function getExpedientes($con){

$dir = array();
$queryExpedientes="SELECT * FROM expedientes where estatus_expediente != '0'";
$array=mysqli_query($con, $queryExpedientes);
while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;
}


function getExpedientesBusqueda($con, $q){
$dir = array();
$queryExpedientes="SELECT * FROM expedientes WHERE id LIKE '%$q%' OR nombreExpediente LIKE '%$q%' OR claveExpediente LIKE '%$q%' OR numeroExpediente LIKE '%$q%' OR yearExpediente LIKE '%$q%' and estatus_expediente != '0'";
$array=mysqli_query($con, $queryExpedientes);


while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;

}


function getExpedientesId($con, $id){
$dir = array();
$queryExpedientes="SELECT * FROM expedientes WHERE id = '$id'";
$array=mysqli_query($con, $queryExpedientes);


while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;

}

function getExpedientesValidacion($con){
$dir = array();
$queryExpedientes="SELECT * FROM expedientes WHERE estatus_expediente = '0'";
$array=mysqli_query($con, $queryExpedientes);


while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;

}

function getArchivosDeExpediente($con, $id){
$dir = array();
$queryExpedientes="SELECT nombre_archivo, ruta_archivo FROM archivos WHERE id_expediente = '$id'";
$array=mysqli_query($con, $queryExpedientes);


while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;

}

  

function getArchivosBusqueda($con, $q ,$id){
$dir = array();
$queryExpedientes="SELECT * FROM archivos WHERE id_archivo LIKE '%$q%' OR nombre_archivo LIKE '%$q%' and id_expediente = '$id'";
$array=mysqli_query($con, $queryExpedientes);


while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;

}