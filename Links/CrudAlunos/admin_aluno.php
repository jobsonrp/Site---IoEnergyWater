<?php
if(isset($_POST['oper']))
    $oper=$_POST['oper'];
else
    $oper="";
if(isset($_POST['oper2']))
    $oper2=$_POST['oper2'];
else
    $oper2="";
if(isset($_POST['aluno']))
    $cod_aluno=$_POST['aluno'];
if(isset($_POST['aluno2']))
    $cod_aluno=$_POST['aluno2'];
if($oper2=="alt")
    header("Location: alt_aluno_disc.php?aluno=$cod_aluno");
if($oper2=="exc")
    header("Location: exc_aluno_disc.php?aluno=$cod_aluno");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administra aluno</title>
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
    <table width="400" border="0" bgcolor="#DADDFE"
        align="center" cellspacing="0" cellpadding="3">
    <tr>
     <td><h3 align="center">Administração de aluno</h3>		
<?php
include("conecta.inc");
$sql="SELECT * FROM alunos WHERE id_aluno=$cod_aluno";
$res=mysqli_query($conexao, $sql);
$n=mysqli_num_rows($res);
if($n==0){
    echo "<p align='center'>(Aluno não cadastrado!)</p>";
    exit;
}
if ($oper=="con"){
    $registro=mysqli_fetch_row($res);
    echo "<p class='brco1'>Nome: $registro[1]
          &nbsp;&nbsp;&nbsp; Código: $registro[0]</p>";
    echo "<p class='brco1'>Sexo: $registro[2]</p>";
    echo "<p class='brco1'>E-mail: $registro[3]</p>";
    $data=substr($registro[4],8,2)."/".
          substr($registro[4],5,2)."/" .
          substr($registro[4],0,4);
    echo "<p class='brco1'>Data de matrícula: $data</p>";
}
elseif ($oper=="exc"){
    $res2=mysqli_query($conexao, "DELETE FROM alunos WHERE id_aluno=$cod_aluno");
    if(mysqli_affected_rows($conexao)==1)
        echo "<p align='center'>(Aluno excluído com sucesso!)</p>";
    else
        echo "<p align='center'>(Aluno não encontrado!)</p>";
}
else{
    if($oper=="alt"){
        header("Location: alt_aluno.php?ident_aluno=$cod_aluno");
    }
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