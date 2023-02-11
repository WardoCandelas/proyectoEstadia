<?php 
session_start();
if(empty($_SESSION['id_usuario'])){
    header("location: login");
}
include "query/query.php";
include "conexionBD/conexionBD.php";


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>



<body>
<nav class="navbar navbar-light navbar-expand-md bg-danger justify-content-center fixed-top">
    <div class="container">
        <a href="https://www.isidrofabela.gob.mx/" class="navbar-brand d-flex w-50 me-auto">
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
            </ul>
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
             <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" style="color:white;"><b><?php echo date('d-m-Y');?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios/logout" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>


<?php 
$numElementos = 5;
 
// Recogemos el parametro pag, en caso de que no exista, lo seteamos a 1
if (isset($_GET['pag'])) {
    $pagina = $_GET['pag'];
} else {
    $pagina = 1;
}
 
// (($pagina - 1) * $numElementos) me indica desde donde debemos empezar a mostrar registros
$sql = "SELECT * FROM expedientes ORDER BY fecha DESC LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
// Ejecutamos la consulta
$resultado = mysqli_query($con, $sql);
 
// Contamos el número total de registros
$sql = "SELECT count(*) as id FROM expedientes  ORDER BY fecha DESC";
 
// Ejecutamos la consulta
$resultadoMaximo = mysqli_query($con, $sql);
 
// Recojo el numero de registros de forma rápida
$maximoElementos = mysqli_fetch_assoc($resultadoMaximo)['id'];

?>

<div class="contenedor-principal">

<!--SECCION IZQUIERDA DE LA INTERFAZ -->
<section class="main">
</section>

<!--SECCION DE EN MEDIO DE LA INTERFAZ-->
<section class="main-derecha" id="main-derecha" style="overflow-y: scroll;" >
  <div class="col justify-content-center" id="contenedorIndex">
        <script type="text/javascript" src="funciones/funciones.js"></script>
    <form name="buscarExpediente" id="buscarExpediente" method="post"><!--FORMULARIO DE BUSQUEDA DE EXPEDIENTES OEAC 31/1/23-->  
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Buscar expediente" id="q" name="q">
  <div class="input-group-append">
    <button class="btn btn-danger" style="color:white" type="submit" id="buscarb" name="buscarb"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div></div>
</form>
  
    <div class="card" id="cards">
      <div class="card-body">
      <h5 class="card-title">Expedientes <a type="button" href="javascript:void(0)" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="nuevoExpediente()"  style="color:white; text-align: right;"><i class="fa fa-pencil" aria-hidden="true"></i></a></h5>
      <p class="card-text"></p>
<div id="tabla">
<table class="table table-borderless">
<thead class="encabezadotabla">
<tr>
    <th></th>
    <th>Nombre</th>
    <th>Clave</th>
    <th>Numero</th>
    <th>Año</th>
    <th></th>
    <th></th>
</tr>
</thead>
<?php  
  while ($fila = mysqli_fetch_assoc($resultado)) {
?>
<tr>
 <td><img  class="expediente" src="https://cdn-icons-png.flaticon.com/512/3135/3135761.png"></td>
    <td><b><i><?php echo $fila['nombreExpediente']?></i></b></td>
    <td><?php echo $fila['claveExpediente']?></td>
    <td><?php echo $fila['numeroExpediente']?></td>
    <td><b><?php echo $fila['yearExpediente']?></b></td>

    <td>
        <?php if($fila['estatus_expediente'] == 1){ ?>
<p class="text-success"><b>
Aprobado
</b></p>
<?php } elseif ($fila['estatus_expediente'] == 2) { ?>
<p class="text-danger"><b>
No Aprobado
</b></p>
<?php } elseif ($fila['estatus_expediente'] == 0) { ?>
<p class="text-warning"><b>
En revisión
</b></p>
<?php } ?>
    </td>

    <td>
    <button type="button" class="btn btn-secondary" onclick="detalleArchivosExpediente('<?php echo $fila['id']; ?>')" ><i class="fa fa-eye" aria-hidden="true"></i></button>
    
    <button type="button" class="btn btn-secondary" onclick="nuevoArchivoFormulario('<?php echo $fila['id']; ?>')" data-bs-toggle="modal" data-bs-target="#myModalCarga"><i class="fa fa-plus" aria-hidden="true"></i></button>

    <button type="button" class="btn btn-secondary" onclick="editarExpediente('<?php echo $fila['id']; ?>')" data-bs-toggle="modal" data-bs-target="#modalEditarExpediente"><i class="fa fa-pencil" aria-hidden="true"></i></button>

    <button type="button" class="btn btn-secondary" onclick="eliminarExpediente('<?php echo $fila['id']; ?>')" data-bs-toggle="modal" data-bs-target="#modalEliminarExpediente"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

</tr>

<?php } ?>

</table>


<div style="text-align: right;">
    <?php
    // Si existe el parametro pag
    if (isset($_GET['pag'])) {
        // Si pag es mayor que 1, ponemos un enlace al anterior
        if ($_GET['pag'] > 1) {
            ?>
            <a href="index?pag=<?php echo $_GET['pag'] - 1; ?>"><button class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
        <?php
                // Sino deshabilito el botón
            } else {
                ?>
            <a href="#"><button class="btn btn-danger" disabled><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
        <?php
            }
            ?>
 
    <?php
    } else {
        // Sino deshabilito el botón
        ?>
        <a href="#"><button class="btn btn-danger" disabled><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
        <?php
    }
 
         
 
    // Si existe la paginacion 
    if (isset($_GET['pag']) && (($pagina * $numElementos) > $maximoElementos)) {
        // Si el numero de registros actual es superior al maximo
        if ((($pagina) * $numElementos) < $maximoElementos) {
            ?>
        <a href="index?pag=<?php echo $_GET['pag'] + 1; ?>"><button class="btn btn-secondary"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</button></a>
    <?php
            // Sino deshabilito el botón
        } else {
            ?>
        <a href="#"><button class="btn btn-danger" disabled><i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
    <?php
        }
 
        ?>
 
    <?php
        // Sino deshabilito el botón
    } else {
        ?>
        <a href="index?pag=2"><button class="btn btn-danger"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</button></a>
    <?php
    }
 
 
    ?>
 
 
</div>


</div>
      </div>
    </div>
  </div>
</section>


<!--SECCION IZQUIERDA DE LA INTERFAZ -->
<section class="main-izquierda">
</section>

 </div> 

<!-- The Modal -->
<div class="modal fade" id="myModal" data-backdrop="false" role="dialog"  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="imagenes/modal/carga1.png" width="60" height="60"> Nuevo Expediente</Expe></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrarModal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="contenedorModal"></div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>



<!-- The Modal -->
<div class="modal fade" id="myModalCarga" data-backdrop="false" role="dialog"  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="imagenes/modal/carga.png" width="60" height="60">Carga de archivos a expediente</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrarModal1"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="contenedorModalCarga"></div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="modalEditarExpediente" data-backdrop="false" role="dialog"  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="imagenes/modal/carga.png" width="60" height="60">Editar Expediente</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrarModal1"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="contenedorModalEditarExpediente"></div>

    </div>
  </div>
</div>


<div class="modal fade" id="modalEliminarExpediente" data-backdrop="false" role="dialog"  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="imagenes/modal/carga.png" width="60" height="60">Eliminar Expediente</h4>
       <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrarModal1"></button>-->
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="contenedorModalEliminarExpediente"></div>

    </div>
  </div>
</div>

</body>
</html>

<script>
        $("#buscarExpediente").submit(function(event) {
                var parametros = $(this).serialize();
                
                $.ajax({
                  type: "POST",
                  url: "buscador/buscarExpediente",
                  data: parametros,
                  beforeSend: function(objeto){
                    $("#tabla").html("Mensaje: Buscando...");
                  },
                  success: function(datos){
                    $("#tabla").html(datos);
              
            }
          });
                event.preventDefault();
              })


function cerrar(){
 
}
</script>