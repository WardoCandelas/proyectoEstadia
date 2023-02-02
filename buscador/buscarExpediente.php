
<?php 
include "../conexionBD/conexionBD.php";
include "../query/query.php";
session_start();

$q = $_POST['q'];

foreach (getExpedientesBusqueda($con, $q) as $value) {
?>
<tr>
 <td><img  class="expediente" src="https://cdn-icons-png.flaticon.com/512/3135/3135761.png"></td>
    <td><b><?php echo $value['nombreExpediente']?></b></td>
    <td><?php echo $value['claveExpediente']?></td>
    <td><b><?php echo $value['numeroExpediente']?></b></td>
    <td><b><?php echo $value['yearExpediente']?></b></td>
    <td><button type="button" class="btn btn-danger"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></button></td>
</tr>

<?php } ?>

