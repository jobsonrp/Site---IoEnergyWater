function validar(form1) {
    var jsEmail=document.form1.inputEmail.value
    if (!jsEmail) {
        alert("Enter your Email.")
        document.form1.inputEmail.focus()
        return false
    }    
    var tstEmail
    tstEmail=validarEmail(jsEmail)
    if (tstEmail==false) {
        alert("Invalid Email.")
        document.form1.inputEmail.focus()
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
