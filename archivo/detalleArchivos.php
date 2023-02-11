<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();
$privilegios = $_SESSION['rol'];

//Recibimos el ID del expediente a consultar
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
  <input type="text" class="form-control" placeholder="Buscar archivo" id="q" name="q" aria-label="" aria-describedby="basic-addon2" required>
  <input type="hidden" name="idExpediente" value="<?php echo $idexp;?>">
  <div class="input-group-append">
    <button class="btn btn-danger" style="color:white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div></div>
</form>
</div>  


<?php if($privilegios == 1){ ?>
<div class="col justify-content-center">
<?php foreach (getExpedientesId($con, $idexp) as $value) { ?>
<h4 style="text-align: center; color: red;"><button type="button" id="btnValidar" class="btn btn-success" onclick="validarExpedientes('<?php echo $idexp; ?>', '1')" ><i class="fa fa-check" aria-hidden="true"></i></button> Expediente -> <?php echo $value['nombreExpediente']?> 
<button type="button" id="btnNoValidar" class="btn btn-danger" onclick="validarExpedientes('<?php echo $idexp; ?>', '0')" ><i class="fa fa-times" aria-hidden="true"></i></button></h4>
<?php } ?>
</div>

<div id="estatusActual"> 
<?php foreach (getExpedienteEstatus($con, $idexp) as $value) { 
if($value['estatus_expediente'] == 1){ ?>
<script>
    $('#btnValidar').attr("disabled", true);
</script>
<?php } elseif ($value['estatus_expediente'] == 2) { ?>
<script>
    $('#btnNoValidar').attr("disabled", true);
</script>
<?php } 
}?>
</div>
<div id="validacion"></div>

<?php } else {?>
<div class="col justify-content-center">
<?php foreach (getExpedientesId($con, $idexp) as $value) { ?>
<h4 style="text-align: center; color: red;">Expediente -> <?php echo $value['nombreExpediente']?></h4>
<?php } ?>
</div>
<?php } ?>  
<div class="row" id="tablaArchivos" style="overflow-y: scroll;   max-height: 100vh; overflow: auto;">
    <?php

$miCuenta="SELECT ruta_archivo, nombre_archivo FROM archivos where id_expediente = '$idexp'";

$miCuentaAction=mysqli_query($con, $miCuenta);
//echo $miCuenta;

if(mysqli_num_rows($miCuentaAction) >= 1){

while ($row=mysqli_fetch_array($miCuentaAction)){
    $imagen=$row['ruta_archivo'];
    $nombreArchivo=$row['nombre_archivo'];
    ?>
<div class="col-md-3">
<div class="card" style="height: auto;">
  <div class="card-body">
    <h5 class="card-title"></h5> 
<iframe src="<?php echo $imagen;?>" style="width:100%; height:50%; overflow:hidden"  scrolling="no"></iframe>
<br>
        <br>
<div class="col justify-content-center">
        <p class="card-text"><?php echo str_replace( ".pdf", '', $nombreArchivo)?></p>
      </div>
    <div class="btn-wrapper text-center">
      <a href="<?php echo $imagen;?>" class="btn btn-danger text-white" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
    <!--<a class="btn btn-success text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger text-white" style=""><i class="fa fa-times" aria-hidden="true"></i></a>-->

  </div>
</div>
</div>
</div>

<?php }
}else{ ?>

 <div class="alert alert-warning" id="alerta" role="alert">
  El Expediente no contiene archivos!
</div>



<?php }

?>



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


 function validarExpedientes(id, accion){

        $.ajax({
          type: "POST",
          url: "expediente/validarExpediente",
          data: "id="+id+'&accion='+accion,
          beforeSend: function(objeto){
            $("#validacion").html("Mensaje: Cargando...");
            
          },
          success: function(datos){
            $("#validacion").html(datos);
            
   setTimeout( function(){ 
   
if (accion = 1) {
$('#btnValidar').attr("disabled", true);
}
else{
  $('#btnNoValidar').attr("disabled", true);
}
    $("#alertaValidacion").hide();
  }  , 2000 );


              }
            });
        event.preventDefault();
    
 }
</script>