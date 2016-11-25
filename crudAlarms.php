<?php
if(isset($_POST['deviceIdAlarm']))
    $cod_id=$_POST['deviceIdAlarm'];
if(isset($_POST['maxValueAlarm']))
    $cod_max=$_POST['maxValueAlarm'];
if(isset($_POST['enter']))
    $cod_action=$_POST['enter'];

$table = "energy_devices";
include("connect.inc");
    if ($cod_action == "add") { 
        $select = "SELECT * FROM $table WHERE id='$cod_id' AND alarm_added='no'";      
	$result = mysqli_query($connect,$select) or die("Select error.");          
        if (mysqli_num_rows($result)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Id already added or not registered.'); window.location.href='home.php#alarmConfig';</script>";
          die();
        }else{
	$sql = "UPDATE $table SET max_value='$cod_max', alarm_added='yes' WHERE id=$cod_id AND alarm_added='no'";
	$result = mysqli_query($connect,$sql) or die("Select error.");
        }
    }
    elseif ($cod_action == "edit") { 
        $select = "SELECT * FROM $table WHERE id='$cod_id' AND alarm_added='yes'";      
	$result = mysqli_query($connect,$select) or die("Select error.");          
        if (mysqli_num_rows($result)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Id already added or not registered.'); window.location.href='home.php#alarmConfig';</script>";
          die();
        }else{
	$sql = "UPDATE $table SET max_value='$cod_max' WHERE id=$cod_id AND alarm_added='yes'";
	$result = mysqli_query($connect,$sql) or die("Select error.");
        }
    }
    elseif ($cod_action == "del") { 
        $select = "SELECT * FROM $table WHERE id='$cod_id' AND alarm_added='yes'";      
	$result = mysqli_query($connect,$select) or die("Select error.");          
        if (mysqli_num_rows($result)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Id already added or not registered.'); window.location.href='home.php#alarmConfig';</script>";
          die();
        }else{
	$sql = "UPDATE $table SET alarm_added='no' WHERE id=$cod_id AND alarm_added='yes'";
	$result = mysqli_query($connect,$sql) or die("Select error.");
        }
    }


/*
$result = mysqli_query($connect,"SELECT * FROM $table WHERE id = $cod_id") or die("erro ao selecionar");

$sql = "UPDATE $table SET max_value='$cod_max' WHERE id=$cod_id"; 
/*$sql="UPDATE alunos SET";
$sql=$sql." nome='$nome',sexo='$sexo',email='$email',data_matr='$data',";
$sql=$sql." WHERE id=$cod_id";
$result = mysqli_query($connect,$sql) or die("erro ao selecionar");*/

mysqli_close($connect);
header("location:home.php#alarm")
?>
