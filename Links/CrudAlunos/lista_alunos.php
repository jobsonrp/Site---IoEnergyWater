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
		<td colspan="6" align="center" class="f1">Lista de Alunos</td>
   </tr>
     <tr><td colspan="6">&nbsp;</td></tr>
     <tr align="center">
      <td><a href="/lista_alunos.php?ordem=id_aluno">
                    <strong>Código</strong></a></td>
      <td><a href="lista_alunos.php?ordem=nome">
                    <strong>Nome</strong></a></td>
      <td><a href="lista_alunos.php?ordem=sexo">
                    <strong>Sexo</strong></a></td>
      <td><a href="lista_alunos.php?ordem=email">
                    <strong>E-mail</strong></a></td>
      <td><a href="lista_alunos.php?ordem=data_matr">
                    <strong>Matrícula</strong></a></td>
   </tr>
<?php
if(isset($_GET["ordem"]))
    $ordem=$_GET["ordem"];
else
    $ordem="nome";	
include("conecta.inc");
$sql="SELECT * FROM alunos ORDER BY $ordem";
$res=mysqli_query($conexao, $sql);
while($reg=mysqli_fetch_row($res)) {
    echo "<tr>";
    echo "<td align='right'>$reg[0]</td>";
    echo "<td>$reg[1]</td>";
    echo "<td align='center'>$reg[2]</td>";
    echo "<td>$reg[3]</td>";
    $data=substr($reg[4],8,2)."/".
          substr($reg[4],5,2)."/" .
          substr($reg[4],0,4);
    echo "<td align='center'>$data</td>";
    echo "</tr>";
}
mysqli_close($conexao);
?>
</table></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
</table>
</div>
</body>
</html>
