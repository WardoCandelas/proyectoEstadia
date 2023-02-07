<?php
include "../conexionBD/conexionBD.php";
session_start();


$idexp = $_POST['id']
?>


<style>
	.btn-wrapper {
  position: relative;
  	display: flex;
    align-items: center;
    justify-content: space-between;
}
  .btn-success {
  	left: ;
}

.abc{
  width: 100%;
          height: auto;
          position: relative;
          display: inline-block;
}
</style>

<div class="col justify-content-center">
      <form name="buscarArchivo" id="buscarArchivo" method="post"><!--FORMULARIO DE BUSQUEDA DE archivos OEAC 31/1/23-->  
    <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Buscar archivo" id="q" name="q" aria-label="" aria-describedby="basic-addon2">
  <input type="hidden" name="idExpediente" value="<?php echo $idexp;?>">
  <div class="input-group-append">
    <button class="btn btn-danger" style="color:white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div></div>
</form>
  
<div class="row" id="tablaArchivos">
    <?php

$miCuenta="SELECT ruta_archivo FROM archivos where id_expediente = '$idexp'";

$miCuentaAction=mysqli_query($con, $miCuenta);
//echo $miCuentaAction;
while ($row=mysqli_fetch_array($miCuentaAction)){
    $imagen=$row['ruta_archivo'];
    ?>
<div class="col-md-3" >
<div class="card" style="height: auto;">
  <div class="card-body">
    <h5 class="card-title">Archivos</h5> 
<iframe src="<?php echo $imagen;?>" style="width:100%; height:50%; overflow:hidden"  scrolling="no"></iframe>
<br>
        <br>
    <div class="btn-wrapper text-center">
      <a href="<?php echo $imagen;?>" class="btn btn-danger text-white" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <!--<a class="btn btn-success text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger text-white" style=""><i class="fa fa-times" aria-hidden="true"></i></a>-->

  </div>
</div>
</div>
</div>

<?php } ?>



</div>
</div>


<script>
        $("#buscarArchivo").submit(function(event) {
                var parametros = $(this).serialize();
                
                $.ajax({
                  type: "POST",
                  url: "buscador/buscarArchivo",
                  data: parametros,
                  beforeSend: function(objeto){
                    $("#tablaArchivos").html("Mensaje: Buscando...");
                  },
                  success: function(datos){
                    $("#tablaArchivos").html(datos);
              
            }
          });
                event.preventDefault();
              })


function cerrar(){
 
}
</script>