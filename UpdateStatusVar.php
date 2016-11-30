<?php
$cod_id=$_GET['idVar'];
$cod_status=$_GET['changeStatus'];
echo "teste status =  $cod_status";

$table = "energy_devices";
include("connect.inc");
$sql = "UPDATE $table SET status='$cod_status' WHERE id=$cod_id"; 
$result = mysqli_query($connect,$sql) or die("erro ao selecionar");

mysqli_close($connect);
header("location:home.php#energy")
?>
