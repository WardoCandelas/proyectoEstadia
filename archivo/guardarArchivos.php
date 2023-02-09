<?php
include "../conexionBD/conexionBD.php";

session_start();

 $idExpediente = $_POST['idExpediente'];
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = "../archivos/".$_POST['rutaExpediente']; //Declaramos un  variable con la ruta donde guardaremos los archivos
			

					
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				$directorioInsert = "archivos/".$_POST['rutaExpediente']."/".$filename;
				$insertArchivos = "INSERT INTO archivos VALUES(null, '$idExpediente', '$filename', '$directorioInsert');";
				mysqli_query($con, $insertArchivos);
			?>
			<div class="alert alert-success" id="alerta" role="alert">
  			El archivo <?php echo $filename; ?>, se ha almacenado de forma exitosa.<br>
			</div>

<?php 

				
				} else {	
				?>
			<div class="alert alert-success" id="alerta" role="alert">
  			Ha ocurrido un error con el archivo <?php echo $filename; ?>, intentalo de nuevo<br>
			</div>

<?php 
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
?>