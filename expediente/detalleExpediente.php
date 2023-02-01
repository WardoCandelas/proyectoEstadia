 <?php
include "../query/query.php";
include "../conexionBD/conexionBD.php";
 ?>

 <div class="row">
<?php foreach (getArchivosDeExpediente($con, $_POST['id']) as $value) {
?> 
   
    <div class="col-md-3">
  <iframe src="<?php echo $value['ruta_archivo']?>" style="width:100%; height:100%;" frameborder="0" ></iframe>
  <a class="btn btn-danger" href="<?php echo $value['ruta_archivo']?>" download="<?php echo $value['nombre_archivo']?>">Descargar</a>
</div>
<?php }



