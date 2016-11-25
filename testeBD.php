<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista alunos</title>
<link rel="stylesheet" href="alunos.css" type="text/css" />
</head>
<body bgcolor="#EEEEFF">
<div id=area_geral>
<table width="750" border="0" bgcolor="#000033"
                cellspacing="0" cellpadding="0">
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td><font size="4" color="#FFFFFF"><strong>&nbsp;&nbsp;
                  CRUD - Alunos</strong></font></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
</table>
<table width="750" border="0" bgcolor="#4499FF">
  <tr><td><input type="button" value=" &nbsp;Voltar&nbsp; "
  	onclick="window.location='index.html'"></td></tr>
  <tr>
   <td>
    <table width="650" border="0" bgcolor="#DADDFE" align="center"
                     cellspacing="0" cellpadding="3" rules="cols">
   <tr>
		<td colspan="6" align="center" class="f1">Lista de Alarmes</td>
   </tr>
     <tr><td colspan="6">&nbsp;</td></tr>
     <tr align="center">
      <td><a href="/lista_alunos.php?ordem=id_aluno">
                    <strong>Id</strong></a></td>
      <td><a href="lista_alunos.php?ordem=nome">
                    <strong>Device</strong></a></td>
      <td><a href="lista_alunos.php?ordem=sexo">
                    <strong>Maximum Value</strong></a></td>
      <td><a href="lista_alunos.php?ordem=email">
                    <strong>Status</strong></a></td>
   </tr>
<?php
$connect = mysqli_connect("localhost", "u473462906_job", "123456","u473462906_iew");
$result = mysqli_query($connect,"SELECT * FROM energy_devices WHERE alarm_added = 'yes'") or die("erro ao selecionar");
while($reg=mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<td align='right'>$reg[0]</td>";
    echo "<td>$reg[1]</td>";
    echo "<td align='center'>$reg[4]</td>";   
    echo "<td align='center'>$reg[5]</td>";
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
    echo "<td style='text-align:center'><select id=$reg[0]>  <option value=$op1>$option1  <option value=$op2>$option2 &nbsp;</select></td>";
    echo "</tr>";
}
mysqli_close($connect);
?>

</table></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
</table>
</div>
</body>
</html>
