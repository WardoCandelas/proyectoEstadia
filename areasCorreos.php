<?php 
include "servicios.php";
include "conexion.php";
?>


<select class="form-control" name="areas">
  <option hidden>Areas</option>

  <?php foreach (getAreas($con) as $value) {
    echo "<option>".$value['nombreArea']."</option>";
  }  
  ?>
</select>




