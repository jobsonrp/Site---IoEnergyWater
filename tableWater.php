<?php
$table = "water_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td>$reg[1]</td>";
    echo "<td style='text-align:right'><output id='outputVarWater$reg[0]'></td>"; 
    if ($reg[3] == "open"){
        $option1 = "Open";
        $op1 = '1'; 
        $option2 = "Close";
        $op2 = '0';   	    
	} else {
        $option1 = "Close";
        $op1 = '0'; 
        $option2 = "Open";
        $op2 = '1'; 
     } 
    echo "<td style='text-align:center'><select id='statusVarWater$reg[0]'> <option value=$op1>$option1 &nbsp; <option value=$op2>$option2 &nbsp;</select></td>";
    //echo "<td style='text-align:center'><select id='statusVarWater$reg[0]'> <option value='0'>Off &nbsp; <option value='1'>On </select></td>";
    echo "</tr>";
}
mysqli_close($connect);
?>

