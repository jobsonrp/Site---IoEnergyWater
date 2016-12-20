<?php

// Water DB

$value1 = $_GET['water1'];
$value2 = $_GET['water2'];
$value3 = $_GET['water3'];

$values = array($value1, $value2, $value3);

$table = "water_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];

	if ($value == 0) {
		$status = "close";
	} else {
		$status = "open";
	}
	
	$sql="INSERT INTO history_water_device (id_device, name, value, status, max_time, status_alarm) VALUES ('$reg[0]','$reg[1]','$value','$status','$reg[4]', '$reg[5]')";

	if (mysqli_query($connect, $sql)) {
	    echo " Valor= " . $value . ". New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}
// Energy DB

$value1 = $_GET['energy1'];
$value2 = $_GET['energy2'];
$value3 = $_GET['energy3'];
$value4 = $_GET['energy4'];
$value5 = $_GET['energy5'];
$value6 = $_GET['energy6'];

$values = array($value1, $value2, $value3, $value4, $value5, $value6);

$table = "energy_devices";
//include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];
	if ($value == 0) {
		$status = "off";
	} else {
		$status = "on";
	}
	
	$sql="INSERT INTO history_energy_device (id_device, name, value, status, max_value, status_alarm) VALUES ('$reg[0]','$reg[1]','$value','$status','$reg[4]', '$reg[5]')";

	if (mysqli_query($connect, $sql)) {
	    echo " Valor= " . $value . ". New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}

mysqli_close($connect);
?>
