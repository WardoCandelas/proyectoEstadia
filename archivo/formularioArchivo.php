<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();


$expedienteId = $_POST['id'];
?>
   <div class="container">     
            <div class="panel panel-primary">
                <div class="panel-body">
                    
                    <form name="form1" id="form1" method="post" enctype="multipart/form-data">
                    	<?php
                        foreach (getExpedientesId($con, $expedienteId) as $value) {
                        $rutaExpediente = $value['nombreExpediente']."-".$value['claveExpediente']."-".$value['numeroExpediente']."-".$value['yearExpediente'];   
} ?>                      
<h4 class="text-center">Cargar Multiple Archivos -> <?php echo $rutaExpediente ?></h4>
              
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Archivos</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="rutaExpediente" value="<?php echo $rutaExpediente; ?>">
                                <input type="file" class="form-control" id="file-upload" name="archivo[]" multiple="">
                            </div>
                            
                            <button type="submit" id="b1" class="btn btn-primary">Cargar</button>
                        </div>
                        
                    </form>
                    <div id="resultado"></div>
                </div>
            </div>
        </div>

<script>

         $("#form1").submit(function(event) {
                
event.preventDefault();
                //var parametros = $(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "archivo/guardarArchivos",
                  data: new FormData(this),
                   contentType: false,
                cache: false,
                processData:false,
                  beforeSend: function(objeto){
                    $("#resultado").html("Mensaje: Procesando...");
                  },
                  success: function(datos){
                    $("#resultado").html(datos);
                    $('#b1').attr("disabled", true);
              //load(1);
              
            }
          });
                
              })