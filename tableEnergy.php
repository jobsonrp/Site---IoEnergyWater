<?php
$table = "energy_devices";
include("connect.inc");
$result = mysqli_query($connect,"SELECT * FROM $table") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td align='right'>$reg[0]</td>";
    echo "<td>$reg[1]</td>";
    //echo "<input type='hidden' id='valueVar$reg[0]' size='4px' value=$reg[2]></input>";
    echo "<td align='center'><output id='outputVarEnergy$reg[0]'></td>"; // <output id='outputVarEnergy$reg[0]'>
    echo "<input type='hidden' id='statusVar$reg[0]' size='4px' value=$reg[3]></input>";
    if ($reg[3] == "on"){
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
    echo "<td style='text-align:center'><select id='valueStatusVar$reg[0]' onchange='updateStatusVar($reg[0])' >  <option value=$op1>$option1  <option value=$op2>$option2 &nbsp;</select></td>";
    echo "</tr>";

}
mysqli_close($connect);
?>

