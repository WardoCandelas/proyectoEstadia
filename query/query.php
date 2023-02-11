<?php 
function getExpedientes($con){

$dir = array();
$queryExpedientes="SELECT * FROM expedientes where estatus_expediente = '1'";
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



function getExpedienteEstatus($con, $id){

$dir = array();
$queryExpedientes="SELECT estatus_expediente FROM expedientes where id ='$id'";
$array=mysqli_query($con, $queryExpedientes);
while ($row = mysqli_fetch_assoc($array)) {

        $dir[] = $row;   
}

$dirJson = json_encode($dir);
$resultado = json_decode($dirJson, true);

return $resultado;
}

function borrar_directorio($dirname) {
        //si es un directorio lo abro
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
        //si no es un directorio devuelvo false para avisar de que ha habido un error
         if (!$dir_handle)
              return false;
        //recorro el contenido del directorio fichero a fichero
         while($file = readdir($dir_handle)) {
               if ($file != "." && $file != "..") {
                   //si no es un directorio elemino el fichero con unlink()
                    if (!is_dir($dirname."/".$file))
                         unlink($dirname."/".$file);
                    else //si es un directorio hago la llamada recursiva con el nombre del directorio
                         borrar_directorio($dirname.'/'.$file);
               }
         }
         closedir($dir_handle);
        //elimino el directorio que ya he vaciado
         rmdir($dirname);
         return true;
}