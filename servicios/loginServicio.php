<?php
include "../conexionBD/conexionBD.php";
include "encrip.php";

session_start();


$email=mysqli_real_escape_string($con,(strip_tags($_POST["user_name"],ENT_QUOTES)));
$password=mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)));

$emailEncry = $encriptar($email);
$passwEncry = $encriptar($password);

$query = "SELECT * FROM usuarios WHERE  usuario='$emailEncry' AND password = '$passwEncry';";
$queryAction = mysqli_query($con, $query); 

		if ($row = mysqli_fetch_array($queryAction)) {
			

				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['rol'] = $row['privilegios'];
				//$_SESSION['user_name'] = $row['nombre_alumno'];
				
			header("location: ../index");
				

		}else{
			$invalid=sha1(md5("contrasena o usuario invalido"));
			header("location: ../login?invalid");
			?>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

		<?php 
}


