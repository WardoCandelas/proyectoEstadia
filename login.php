<?php
include "conexionBD/conexionBD.php";
session_start();

$year = date("Y")

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://micontrol.mx/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://micontrol.mx/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="estilos/estilos.css">

  <link rel=icon href='imagenes/icono/icono.ico' sizes="64x64" type="image/ico">
</head>



<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">  
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body ">

<style type="text/css">
      .redes{
  background-color: #007e67;
 /* background-color: #3F9447;*/
}
</style>


<div id="tite">
<p style="text-align: center;" ><b></b></p>


     <center><img src="https://static.wixstatic.com/media/ef2d72_3c1ae4ad6eb04e088c35605bd9f2e9dc~mv2.png/v1/crop/x_123,y_278,w_916,h_573/fill/w_220,h_138,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Dise%C3%B1o%20sin%20t%C3%ADtulo%20(8).png" alt="" style="width:250px; height:200px">
      <!--<p class="login-box-msg"></p>--></center>
                <?php 
		if(isset($_GET['st'])){
                        $st=$_GET['st'];
		if($st=='0'){echo '<p class="login-box-msg"> Contraseña o Usuario invalido
                               </p>';}
                        }
                        
                    ?>    

<style type="text/css">

  #message
    {
       
        display: none;
       
        text-align: center;
    }
</style>

<script type="text/javascript">


</script>
<br>
<div id="loginAlumno" style="display: block;">
      <form method="post" action="servicios/loginServicio" id="formLogin" >
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="user_name" id="user_name" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" required name="password" id="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      


            <div class="container-fluid" id="yes2">
               <?php if (isset($_GET['invalid'])) {
        ?>


  <div class="alert alert-danger" role="alert" id="message2" >
  Usuario o contraseña incorrectos!
</div>

            </div>
<script type="text/javascript">

window.setTimeout(function() {
    $("#message2").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);



        </script>

        <?php } ?>
          <div class="">
            <br>
          <div class="col-12">
            <style type="text/css">
              .entrar{
               
                color: white;
              }
               .entrarr{
                background-color:#B26200;
                color: white;
              }
              .crear{
                background-color:#696969;
              }

              .registrar{
                background-color:#FF8C00; 
                color: white;
              }
            </style>
            <button type="submit" id="entrar" class="btn bg-danger btn-block" style=" color: white;">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <center><p>© <?php echo $year;?> Palacio Municipal Isidro Fabela</p></center>
		  <p><center><!--Olvidaste la contraseña?--></center></p>
       <p><center></center></p>
       <!-- Aqui va el demo y registro-->


      </form>
      
</div>

<script type="text/javascript">

</script>







        <div class="container-fluid" id="yes"></div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>
          </div>
          <!-- /.col -->
        </div>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->

  </div>
</div>
<!-- /.login-box -->



<script src="https://micontrol.mx/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://micontrol.mx/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://micontrol.mx/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="https://micontrol.mx/AdminLTE/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="https://micontrol.mx/AdminLTE/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="https://micontrol.mx/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="https://micontrol.mx/AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="https://micontrol.mx/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>

<!-- ChartJS -->
<script src="https://micontrol.mx/AdminLTE/plugins/chart.js/Chart.min.js"></script>



<script type="text/javascript">




 

$( "#register" ).click(function() {
    setTimeout(showTooltip, 1000)

});


function showTooltip()
  {
       $("#message").show("slow");
       setTimeout(hideTooltip, 3000)
  }

function hideTooltip()
  {
   $("#message").hide("slow");
  }  



 
</script>

</body>
</html>

