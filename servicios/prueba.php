<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ejemplo Imágenes</title>
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <style>
            body {
            padding-top: 20px;
            padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
        
        <div class="container">     
            <div class="panel panel-primary">
                <div class="panel-body">
                    
                    <form name="form1" id="form1" method="post" action="guarda.php" enctype="multipart/form-data">
                        
                        <h4 class="text-center">Cargar Multiple Archivos</h4>
                        
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
    </body>
</html>

