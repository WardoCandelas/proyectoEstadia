
<?php 
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();

$q = $_POST['q'];
$idExpediente = $_POST['idExpediente'];
?>

<script type="text/javascript" src="funciones/funciones.js"></script>

<?php 
foreach (getArchivosBusqueda($con, $q, $idExpediente) as $value) {
?>
<div class="col-md-3" >
<div class="card" style="height: auto;">
  <div class="card-body">
    <h5 class="card-title"></h5> 
<iframe src="<?php echo $value['ruta_archivo'];?>" style="width:100%; height:50%; overflow:hidden"  scrolling="no"></iframe>
<br>
        <br>
        <p class="card-text"><?php echo str_replace( ".pdf", '', $value['nombre_archivo'])?></p>
    <div class="btn-wrapper text-center">
      <a href="<?php echo $value['ruta_archivo'];?>" class="btn btn-danger text-white" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <!--<a class="btn btn-success text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger text-white" style=""><i class="fa fa-times" aria-hidden="true"></i></a>-->

  </div>
</div>
</div>
</div>
<?php } ?>

