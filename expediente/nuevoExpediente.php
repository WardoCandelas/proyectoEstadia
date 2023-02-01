<?php


?>

<form class="form-control" id="nuevoArchivo" name="nuevoArchivo">


<div class="row">
<div class="col-md-6">
<select class="form-control" required>
<option>Area</option>
</select>
</div>
</div>
<br>


<div class="row">
<div class="col-md-6">	
<input class = "form-control" type = "text" placeholder = "Nombre expediente" required>
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Clave expediente" required>
</div>
<div class="col-md-3">	
<input class = "form-control" type = "text" placeholder = "Número expediente" required>
</div>
</div>
<br>	
<div class="row">
<div class="col-md-6">	
<textarea class = "form-control" placeholder = "Observaciones" required></textarea><br>
<button type="submit" name="reinscripcionFormBoton" id="reinscripcionFormBoton" class="btn btn-danger">Registrar</button>
</div>

<div class="col-md-3">	
<input class = "form-control" type = "text"  maxlength="4" pattern="\d{4}" placeholder = "Año" required>
</div>

<div class="col-md-3">	
<input class = "form-control" type = "number"  placeholder = "Hojas" required> 
</div></div>
    



</form>