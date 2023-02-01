<?php 
function getExpedientes($con){

$dir = array();
$queryExpedientes="SELECT * FROM archivos_listado";
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
$queryExpedientes="SELECT * FROM archivos_listado WHERE id LIKE '%$q%'";
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

  

