<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Altera aluno na tabela de alunos</title>
<link rel="stylesheet" href="alunos.css" type="text/css" />
</head>
<body bgcolor="#EEEEFF">
<div id=area_geral>
<table width="750" border="0" bgcolor="#000033"
                cellspacing="0" cellpadding="0">
 <tr><td>&nbsp;</td></tr>
 <tr>
  <td><font size="4" color="#FFFFFF"><strong>&nbsp;&nbsp;
                     Controle de Alunos </strong></font></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
</table>
<table width="750" border="0" bgcolor="#4499FF">
 <tr><td><input type="button" value=" &nbsp;Tela Inicial&nbsp; " 
          onclick="window.location='index.html'"></td></tr>
 <tr>
  <td>
 <table width="400" border="0" bgcolor="#DADDFE" align="center"
                                cellspacing="0" cellpadding="3">
 <tr>
  <td><h3 align="center">Alteração de aluno</h3>
<?php
$id_aluno=$_POST['id_aluno'];
$nome=$_POST['nome'];
$sexo=$_POST['sexo'];
$email=$_POST['email'];
$curso=$_POST['curso'];
$dat_matr=$_POST['dat_matr'];
$data=substr($dat_matr,6,4)."-".
      substr($dat_matr,3,2)."-" .
      substr($dat_matr,0,2);
include("conecta.inc");
$sql="UPDATE alunos SET";
$sql=$sql." nome='$nome',sexo='$sexo',email='$email',data_matr='$data',";
$sql=$sql." curso='$curso' WHERE id_aluno='$id_aluno'";
$res=mysqli_query($conexao, $sql);
if(mysqli_affected_rows($conexao) > 0)
    echo "<p align='center'>(Aluno alterado com sucesso!)</p>";
else{
    $erro=mysqli_error($conexao);
	echo "<p align='center'>(Erro na atualização: $erro! ou Nenhuma alteração realizada!)</p>";
}
mysqli_close($conexao);
?>
  </td></tr>
 </table></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
</table>
</div>
</body>
</html>