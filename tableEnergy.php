<?php
$cod_id=$_GET['idAlrm'];
$cod_status=$_GET['changeStatus'];
echo "teste status =  $cod_status";

$table = "energy_devices";
include("connect.inc");
$sql = "UPDATE $table SET status_alarm='$cod_status' WHERE id=$cod_id"; 
$result = mysqli_query($connect,$sql) or die("erro ao selecionar");

mysqli_close($connect);
header("location:home.php#alarm")
?>
