<?php
?>
<script type="text/javascript" src="funciones/funciones.js"></script>
<form class="form-control" id="nuevoExpediente" name="nuevoExpediente">


<div class="row">
<div class="col-md-6">
<select class="form-control" >
<option>Area</option>
</select>
</div>
</div>
<br>


<div class="row">
<div class="col-md-6">	
<input class = "form-control" type = "text" placeholder = "Nombre expediente" name="no_e" required>
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Clave expediente" name="c_e" required>
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Número expediente" name="nu_e" required>
</div>
</div>
<br>	
<div class="row">
<div class="col-md-6">	
<textarea class = "form-control" placeholder = "Observaciones" name="o_e" ></textarea><br>
<button type="submit" name="reinscripcionFormBoton" id="reinscripcionFormBoton" class="btn btn-danger">Registrar</button>
</div>

<div class="col-md-3">	
<input class = "form-control" type = "text"  maxlength="4" pattern="\d{4}" placeholder = "Año" name="y_e" required>
</div>
</div>
    



</form>
<div id="expediente"></div>