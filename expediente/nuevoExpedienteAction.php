<?php 


$nombreExpediente = $_POST['no_e'];
$claveExpediente = $_POST['c_e'];
$numeroExpediente = $_POST['nu_e'];
$yearExpediente = $_POST['y_e'];

$micarpeta = "../archivos/".$nombreExpediente."-".$claveExpediente."-".$numeroExpediente."-".$yearExpediente;
echo $micarpeta;

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}