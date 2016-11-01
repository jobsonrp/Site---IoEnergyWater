<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>altera aluno</title>
<link rel="stylesheet" href="alunos.css" type="text/css" />
</head>

<script language="JAVASCRIPT">
function validar(form1) {
    if(!document.form1.alu_nome.value){
        alert("Informe o nome")
        document.form1.alu_nome.focus()
        return false
    }
    var js_email=document.form1.alu_email.value
    if (!js_email) {
        alert("Informe seu e-mail")
        document.form1.alu_email.focus()
        return false
    }	 	 
    var tstEmail=true
    tst_email=validarEmail(js_email)
    if (tst_email==false) {
        alert("E-mail inválido")
        document.form1.alu_email.focus()
        return false
    }
    var js_matr=document.form1.alu_matr.value
    if(!js_matr) {
        alert("Informe a data de matrícula")
        document.form1.alu_matr.focus()
        return false
    }
    var tst_data=true
    tst_data=validarData(js_matr)
    if (tst_data==false) {
        alert("Data incorreta")
        document.form1.alu_matr.focus()
        return false
    }
}
function validarEmail(email) {
    var tst_logico=false
    var tam=(email.length)
    var i
    for(i=0;i<=tam;i++) { 
        if ((email.substr(i,1)) == "@") {
            tst_logico=true
            break
        }    
    }
    if (tst_logico)
        return true
    else
        return false 
}
function validarData(data) {
    var dia=data.substr(0,2)
    var mes=data.substr(3,2)
    var ano=data.substr(6,4)
    if ((dia>"00") && (dia<=31) &&
        (mes>"00") && (mes<=12) &&
        (!(isNaN(ano))) && (ano>2009))
        return true
    else
        return false
}
</script>
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
 <table width="400" border="0" bgcolor="#DADDFE" align="center"
                                cellspacing="0" cellpadding="3">
 <tr>

</table>
<table width="720" border="0" bgcolor="#4499FF">
 <tr><td>&nbsp;</td></tr>
 <tr>
  <td>
 <table width="400" border="0" bgcolor="#DADDFE" align="center"
                               cellspacing="0" cellpadding="3">
  <tr>
   <td><h3 align="center">Alteração de aluno</h3>
<?php
$cod_aluno=$_GET['ident_aluno'];
include("conecta.inc");
$sql="SELECT * FROM alunos WHERE id_aluno=$cod_aluno";
$res=mysqli_query($conexao, $sql);
if(mysqli_num_rows($res)==0){
    echo "<p align='center'>(Aluno não cadastrado!)</p>";
    exit;
}
else{
    $registro=mysqli_fetch_row($res);
    $id_aluno=$registro[0];
    $nome=$registro[1];
    $sexo=$registro[2];
    $email=$registro[3];
    $data=substr($registro[4],8,2)."/".
          substr($registro[4],5,2)."/" .
          substr($registro[4],0,4);
    //$curso=$registro[5];
}
?>
<form name="form1" method="POST" action="alt_aluno2.php" 
                                 onsubmit="return validar(this);">
<input type="hidden" name="id_aluno" value="<?php echo $cod_aluno ?>" />
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome: 
<input name="nome" type="text" id="alu_nome" value="<?php echo $nome ?>" />
&nbsp;&nbsp;&nbsp;&nbsp;
<input name="id_aluno" type="text" readonly="ler" size="4" id="alu_id" 
                                      value="<?php echo $id_aluno ?>" />	  
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sexo: 
<select name="sexo" id="alu_sexo">
    <option value="<?php echo $sexo;?>" selected="selected">
                                        <?php echo $sexo;?></option>
    <option value="m">m</option>
    <option value="f">f</option>
</select>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 
<input name="email" type="text" id="alu_email" 
		value="<?php echo $email ?>" />
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data de matrícula: 
<input name="dat_matr" type="text" id="alu_matr" 
          value="<?php echo $data ?>" />(dd/mm/aaaa)
</p>
<p align="right">
<input type="submit" name="envia" id="envia" value=" Enviar " /> &nbsp;
<input type="reset" name="limpa" value="Limpar" /> &nbsp;&nbsp;&nbsp;&nbsp;
</p>
</form>
  </td></tr>
 </table></td>
 </tr>
  <tr><td>&nbsp;</td></tr>
</table>
</div>
</body>
</html>	