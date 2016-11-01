<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>inclui aluno</title>
<link rel="stylesheet" href="alunos.css" type="text/css" />
</head>
<script language="JavaScript">
function validar(form1) {
    if(!document.form1.alu_nome.value){
        alert("Informe o nome")
        document.form1.alu_nome.focus()
        return false
    }
    if ((document.form1.sexo[0].checked) || 
        (document.form1.sexo[1].checked)) {
        var i=0 // sem efeito
    }else{	 
        alert("Informe o sexo")
        return false
    }
    var jsEmail=document.form1.alu_email.value
    if (!jsEmail) {
        alert("Informe seu e-mail")
        document.form1.alu_email.focus()
        return false
    }	 	 
    var tstEmail
    tstEmail=validarEmail(jsEmail)
    if (tstEmail==false) {
        alert("E-mail inválido")
        document.form1.alu_email.focus()
        return false
    }
    var jsNasc=document.form1.alu_matr.value
    if(!jsNasc) {
        alert("Informe a data de matrícula")
        document.form1.alu_matr.focus()
        return false
    }
    var tstData=true
    tstData=validarData(jsNasc)
    if (tstData==false) {
        alert("Data incorreta (formato dd/mm/aaaa) ou data antiga!")
        document.form1.alu_matr.focus()
        return false
    }
}
function validarEmail(email) {
    var tstLogico=false
    var tam=(email.length)
    var i
    for(i=0;i<=tam;i++) { 
        if ((email.substr(i,1)) == "@") {
            tstLogico=true
            break
        }    
    }
    if (tstLogico)
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
        (!(isNaN(ano))) && (ano>2000))
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
  <tr><td>&nbsp;</td>
  </tr>
</table>
<table width="750" border="0" bgcolor="#4499FF">
  <tr><td><input type="button" value=" &nbsp;Voltar&nbsp; " 
          onclick="window.location='index.html'"></td></tr>
  <tr>
   <td>
<table width="400" border="0" bgcolor="#DADDFE" align="center"
                               cellspacing="0" cellpadding="3">
  <tr>
   <td>
    <h3 align="center">Inclusão de aluno</h3>
  <form id="form1" name="form1" method="POST" action="inc_aluno2.php" 
                                     onsubmit="return validar(this);">
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome: 
    <input name="nome" type="text" id="alu_nome" size="40"
                                            maxlength="30" />
    </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sexo: 
    <input name="sexo" type="radio" id="sexo_masc" value="m" />
                       <label for="sexo_masc">Masculino</label>
    <input name="sexo" type="radio" id="sexo_fem" value="f" />
                         <label for="sexo_fem">Feminino</label>
    </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 
    <input name="email" type="text" id="alu_email" size="40"
                                              maxlength="30" />
    </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data de matrícula:
    <input name="dat_matr" type="text" id="alu_matr" size="15"
                                    maxlength="10" /> (dd/mm/aaaa)
    </p>
    <p align="right">
    <input type="submit" name="envia" id="envia" value=" Enviar " />
    &nbsp;
    <input type="reset" value="Limpar"/> &nbsp;&nbsp;&nbsp;&nbsp;
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
