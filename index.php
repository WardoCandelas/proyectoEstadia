<?php 
session_start();
//Validamos si el usuario esta logeado, para que no pueda acceder a el index
if(empty($_SESSION['id_usuario'])){
    header("location: login");
}
?>

<!DOCTYPE html>
<html lang="es">

	<head><!-- CSS only -->
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="estilos/estilos.css" rel="stylesheet"></link>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel=icon href='imagenes/icono/icono.ico' sizes="64x64" type="image/ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="funciones/funciones.js"></script>
</head>



<body>
<nav class="navbar navbar-light navbar-expand-md bg-danger justify-content-center fixed-top">
    <div class="container">
        <a href="index" class="navbar-brand d-flex w-50 me-auto">
            <img src="imagenes/navbar/icono.png" height="30" alt="CoolBrand">
        </a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center">
                <li class="nav-item active">
                    <a href="index" class="nav-item nav-link active" style="color:white;"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-item nav-link" onclick="avisos()" style="color:white;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                      <a  href="javascript:void(0)" class="nav-item nav-link" onclick="nuevoExpediente()" style="color:white;"><i class="fa fa-folder" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-item nav-link" onclick="validarArchivo()" style="color:white;"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
             <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" style="color:white;"><b><?php echo date('d-m-Y');?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios/logout" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">Item</a></li>
                        <li><a class="dropdown-item" href="#">Item</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Item</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="contenedor-principal">

<!--SECCION IZQUIERDA DE LA INTERFAZ -->
<section class="main">
</section>

<!--SECCION DE EN MEDIO DE LA INTERFAZ-->
<section class="main-derecha" id="main-derecha" style="overflow-y: scroll;" >
  <div class="col justify-content-center">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Buscar archivo" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-danger" style="color:white" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    </div>
  
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Archivos</h5>
      <p class="card-text">Aqui ira un listado de archivos.</p>
      </div>
    </div>
  </div>
</section>

<!--SECCION IZQUIERDA DE LA INTERFAZ -->
<section class="main-izquierda">
</section>

 </div> 




</body>
</html>

