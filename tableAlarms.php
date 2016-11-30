<?php
$table = "energy_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table WHERE alarm_added = 'yes'") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td align='right'>$reg[0]</td>";
    echo "<td>$reg[1]</td>";
    echo "<td align='center'><input id='maxValue$reg[0]' size='4px' style='border:none; background:white; color:black;' disabled value=$reg[4]></input></td>";
    echo "<input type='hidden' id='statusAlarm$reg[0]' size='4px' value=$reg[5]></input>";
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
    echo "<td style='text-align:center'><select id='alarm$reg[0]' onchange='updateStatus($reg[0])' >  <option value=$op1>$option1  <option value=$op2>$option2 &nbsp;</select></td>";
    echo "</tr>";

}
mysqli_close($connect);
?>
