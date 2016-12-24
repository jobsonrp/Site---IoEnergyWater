<?php

$date=$_GET['date'];
echo "teste 123 = $date";
// Conexão Local
include("../../connect.inc");
$table = "water_general";

$id = array();
$lista = array(); //id
$dens = array(); // value

$i = 0;

$result = mysqli_query($connect,"SELECT * FROM $table") or die("error select Water");
while($reg=mysqli_fetch_row($result)) {
 $id[$i] = $reg[0]; 
 $lista[$i] = $reg[3];
 $dens[$i] = $reg[2];
 $i = $i + 1;
}
 
?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

    </script>


