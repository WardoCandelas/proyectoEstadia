<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();

//Recibimos el ID del expediente del cual seran los archivos
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
<h4 class="text-center"><img src="imagenes/modal/carga1.png" width="25" height="25"> <?php echo $rutaExpediente ?></h4>
              
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            
                                <input type="hidden" name="idExpediente" value="<?php echo $expedienteId; ?>">
                                <input type="hidden" name="rutaExpediente" value="<?php echo $rutaExpediente; ?>">

                                <div class="input-group col-md-9">
<input type="file" class="form-control" id="file-upload" name="archivo[]" multiple="" required accept="application/pdf">
  <div class="input-group-append">
  <button type="submit" id="b1" class="btn btn-danger">Cargar</button>
  </div></div>
                                
                          
                            
                            
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
                                     
                                     setTimeout( function(){ 
    $('#form1')[0].reset();
    $('#b1').attr("disabled", false);
    $("#alerta").hide();
    $("#cerrarModal1").trigger('click');

  }  , 5000 );
              
            }
          });
                
              })