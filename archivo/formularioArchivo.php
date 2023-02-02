<?php
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();


$expedienteId = $_POST['id'];
?>
   <div class="container">     
            <div class="panel panel-primary">
                <div class="panel-body">
                    
                    <form name="form1" id="form1" method="post" action="guarda.php" enctype="multipart/form-data">
                    	<?php
                        foreach (getExpedientesId($con, $expedienteId) as $value) {
                        $rutaExpediente = $value['nombreExpediente']."-".$value['claveExpediente']."-".$value['numeroExpediente']."-".$value['yearExpediente'];   
} ?>                      
<h4 class="text-center">Cargar Multiple Archivos -> <?php echo $rutaExpediente ?></h4>
              
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Archivos</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="file-upload" name="archivo[]" multiple="">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Cargar</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>