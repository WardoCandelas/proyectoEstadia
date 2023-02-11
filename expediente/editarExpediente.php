
<?php 
include "../query/query.php";
include "../conexionBD/conexionBD.php";


$idExpediente = $_POST['id'];
foreach (getExpedientesId($con, $idExpediente) as $value) { ?>
<form class="" id="editarExpediente" name="editarExpediente">
	
<div class="row">
<div class="col-md-6">	
<input class = "form-control" type = "text" placeholder = "Nombre" name="no_e" required value="<?php echo $value['nombreExpediente']?>">
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Clave" name="c_e" required value="<?php echo $value['claveExpediente']?>">
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Número" name="nu_e" required value="<?php echo $value['numeroExpediente']?>">
</div>
</div>

<br>

<div class="row">
<div class="col-md-6">	
<input class = "form-control" type = "text"  maxlength="4" pattern="\d{4}" placeholder = "Año" name="y_e" required value="<?php echo $value['yearExpediente']?>">
</div>
<div class="col-md-6">	
<textarea class = "form-control" placeholder = "Observaciones" name="o_e" value="<?php echo $value['observacionesExpediente']?>"></textarea></div><br><br>
<div class="col-md-6">	
<button type="" name="" id="" class="btn btn-danger">Actualizar</button>
</div>

</div>
</form>

<?php } ?>


<div id="containerNuevoExpediente"></div>

<script type="text/javascript" src="funciones/funciones.js"></script>


