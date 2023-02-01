<?php
include "../conexionBD/conexionBD.php";
session_start();

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
    
    <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Buscar archivo" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-danger" style="color:white" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div></div>
  
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Archivos</h5>
    
    <div class="row">
    <div class="col-md-3">	
      <div class="card">
  <div class="card-body">
    <h5 class="card-title">Archivo 1</h5>
    <?php

$miCuenta="SELECT ruta_archivo FROM archivos";

$miCuentaAction=mysqli_query($con, $miCuenta);
//echo $miCuentaAction;
while ($row=mysqli_fetch_array($miCuentaAction)){
    $imagen=$row['ruta_archivo'];
}
    ?>

<iframe src="archivos/areaPrueba/archivo.pdf" style="width:100%; height:100%;" frameborder="0" ></iframe>
    <div class="btn-wrapper text-center">
    <a class="btn btn-success text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger text-white" style=""><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
  </div>
</div>
</div>

<div class="col-md-3">
    <div class="card">
  <div class="card-body">
    <h5 class="card-title">Archivo 1</h5>
  </div>
</div>
</div>

<div class="col-md-3">
    <div class="card">
  <div class="card-body">
    <h5 class="card-title">Archivo 1</h5>
  </div>
</div>
</div>


<div class="col-md-3">
    <div class="card">
  <div class="card-body">
    <h5 class="card-title">Archivo 1</h5>
  </div>
</div>
</div>







  </div>
</div>
  

</div>