<?php
$table = "energy_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td>$reg[1]</td>";
    echo "<td align='center'><input id='maxValueEnergy$reg[0]' size='6px' style=' background:white; color:black;' value=$reg[4]></input></td>";
    if ($reg[5] == "on"){
        $option1 = "On";
        $op1 = '1'; 
        $option2 = "Off";
        $op2 = '0';   	    
	} else {
        $option1 = "Off";
        $op1 = '0'; 
        $option2 = "On";
        $op2 = '1'; 
     } 
    echo "<td style='text-align:center'><select id='statusAlarmEnergy$reg[0]'><option value=$op1>$option1 <option value=$op2>$option2 &nbsp;
</select></td>";
    //echo "<td style='text-align:center'><select id='statusAlarmEnergy$reg[0]'>  <option value='0'>Off &nbsp; <option value='1'>On </select></td>";
    echo "</tr>";
}
mysqli_close($connect);
?>
