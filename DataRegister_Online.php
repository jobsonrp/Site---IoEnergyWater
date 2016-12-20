<?php
// Energy DB
$cont = 0;
$value1 = $_GET['air'];
$value2 = $_GET['shower'];
$value3 = $_GET['light1'];
$value4 = $_GET['light2'];
$value5 = $_GET['plug1'];
$value6 = $_GET['plug2'];

$values = array($value1, $value2, $value3, $value4, $value5, $value6);

$table = "energy_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar Energy");
while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];
	if ($value == 0) {
		$status = "off";
	} else {
		$status = "on";
	}
	
	$sql="INSERT INTO history_energy_device (id_device, name, value, status, max_value, status_alarm) VALUES ('$reg[0]','$reg[1]','$value','$status','$reg[4]', '$reg[5]')";

	if (mysqli_query($connect, $sql)) {
	    $cont = $cont + 1;
	    echo " Valor= " . $value . ". New record created successfully";
	} else {
	    echo"<script language='javascript' type='text/javascript'>alert('Error!');window.location.href='home.php';</script>";
	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}
	
// Energy General
$value1 = $_GET['sun'];
$value2 = $_GET['produced'];
$value3 = $_GET['energyTotal'];
$value4 = $_GET['batteryCharge'];
$value5 = $_GET['companyUse'];
$value5_status = $_GET['statusCompany'];

$values = array($value1, $value2, $value3, $value4, $value5);

$table = "energy_general";

	$result = mysqli_query($connect,"SELECT * FROM $table") or die("error select Energy General");
	while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];
	if ($reg[0] == 5) { // ou seja, if (Id == 5) do
	    $status = $value5_status;
	} else {
	    $status = "-";
	}	
		$sql="INSERT INTO history_energy_general (id_device, name, value, status) VALUES ('$reg[0]','$reg[1]','$value','$status')";

		if (mysqli_query($connect, $sql)) {
		    $cont = $cont + 1;
		    echo " Valor= " . $value . ". New record created successfully";
		} else {
		    echo"<script language='javascript' type='text/javascript'>alert('Error!');window.location.href='home.php';</script>";
	    	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		    
		}
	}

// Water DB
$value1 = $_GET['water1'];
$value2 = $_GET['water2'];
$value3 = $_GET['water3'];

$values = array($value1, $value2, $value3);

$table = "water_devices";
$result = mysqli_query($connect,"SELECT * FROM $table") or die("error select Water");
while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];

	if ($value == 0) {
		$status = "close";
	} else {
		$status = "open";
	}
	
	$sql="INSERT INTO history_water_device (id_device, name, value, status, max_time, status_alarm) VALUES ('$reg[0]','$reg[1]','$value','$status','$reg[4]', '$reg[5]')";

	if (mysqli_query($connect, $sql)) {
	    $cont = $cont + 1;
	    echo " Valor= " . $value . ". New record created successfully";
	} else {
	    echo"<script language='javascript' type='text/javascript'>alert('Error!');window.location.href='home.php';</script>";
	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
}

// Water General
$value1 = $_GET['rain'];
$value2 = $_GET['totalStored'];
$value3 = $_GET['totalConsumed'];
$value4 = $_GET['companyConsumed'];
$value5 = $_GET['useStored'];

$values = array($value1, $value2, $value3, $value4, $value5);

$table = "water_general";

	$result = mysqli_query($connect,"SELECT * FROM $table") or die("error select Water General");
	while($reg=mysqli_fetch_row($result)) {

	$value = $values[$reg[0]-1];
	
		$sql="INSERT INTO history_water_general (id_device, name, value) VALUES ('$reg[0]','$reg[1]','$value')";

		if (mysqli_query($connect, $sql)) {

		  echo"<script language='javascript' type='text/javascript'>alert('DataRegister Success!');window.location.href='home.php';</script>";
   	          echo " Valor= " . $value . ". New record created successfully";
		
	        } else {
		    echo"<script language='javascript' type='text/javascript'>alert('Error!');window.location.href='home.php';</script>";
	    	    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
	}


mysqli_close($connect);

?>
