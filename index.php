<!DOCTYPE html>
<html>
  
<head>

<script language="JavaScript">
function validar(form1) {
    var jsEmail=document.form1.inputEmail.value
    if (!jsEmail) {
        alert("Informe seu e-mail")
        document.form1.inputEmail.focus()
        return false
    }    
    var tstEmail
    tstEmail=validarEmail(jsEmail)
    if (tstEmail==false) {
        alert("E-mail inválido")
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
</script>
  
</head>  
  
<title>IoEnergyWater</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://ioenergywater.pe.hu/iew.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style class="iew-hide-small">
body {
    background: url("http://ioenergywater.pe.hu/images/site_home.png"), url("http://ioenergywater.pe.hu/images/fundo_meio9a.png");
    background-position: top center, top;
    background-size: auto, 100%;
    background-repeat: no-repeat, repeat;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.iew-sidenav a,.iew-sidenav h4 {font-weight:bold}
</style>
<body class="iew-light-grey iew-content" style="max-width:1600px">

<!-- Overlay effect when opening sidenav on small screens -->
<div class="iew-overlay iew-hide-large iew-animate-opacity" onclick="iew_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! 
<div class="iew-main" style="margin-left:300px"> -->

  <!-- Header -->
  <header class="iew-container" id="portfolio">
    <h2 style="text-shadow: 2px 2px 2px white"><b>IoEnergyWater</b></h2>
    <div class="iew-section iew-padding-16">
      <a href="home.php" class="iew-btn iew-white">Home</a>
      <a href="energy.php" class="iew-btn iew-white">Energy</a>
      <a href="water.php" class="iew-btn iew-white">Water</a>
    </div>
  </header>

  <!-- BEGIN Login -->
  <header class="iew-container" id="portfolio" align="center">
</br>
    <div class="iew-section iew-bottombar iew-padding-16">
       <span class="iew-btn iew-white"><h4><a href=""></a></span>
    <form id="form1" align="center" name="form1" method="POST" action="login.php" onsubmit="return validar(this);">

    <div class="control-group">

    <div class="controls"></br>
      <input id="inputEmail" name="inputEmail" type="text" placeholder="Email address"></div>
    
    <div class="controls"></br>
      <input id="inputPassword" name="inputPassword" type="password" placeholder="Password"></div>
  
    <div class="controls"></br>
      <button class="iew-btn iew-black" id="enter" name="enter">Log In</button></div></h4>
    </div>
<h4 style="color: white">Registered Users</h4>
<h5 class="iew-btn iew-black">Login: albert@com.br &nbsp;   Password:1234</h5>
<h5 class="iew-btn iew-black">Login: newton@com.br &nbsp;   Password:1234</h5>
</form>
</div>
</br></br>
  </header>  
<!-- END Login -->


  
  <div class="iew-container iew-padding-large" style="margin-bottom:16px"></br>
    <h4><b>System Description</b></h4>
    <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    <hr>
    
  <!-- Contact Section -->
  <div class="iew-container iew-padding-large iew-grey">
    <h4 id="contact"><b>Contact Me</b></h4>
    <div class="iew-row-padding iew-center iew-padding-24" style="margin:0 -16px">
      <div class="iew-third iew-dark-grey">
        <p><i class="fa fa-envelope iew-xxlarge iew-text-light-grey"></i></p>
        <p>email@email.com</p>
      </div>
      <div class="iew-third iew-teal">
        <p><i class="fa fa-map-marker iew-xxlarge iew-text-light-grey"></i></p>
        <p>Pernambuco, BRAZIL</p>
      </div>
      <div class="iew-third iew-dark-grey">
        <p><i class="fa fa-phone iew-xxlarge iew-text-light-grey"></i></p>
        <p>8845454545</p>
      </div>
    </div>
    <hr class="iew-opacity">
    <form action="form.asp" target="_blank">
      <div class="iew-group">
        <label>Name</label>
        <input class="iew-input iew-border" type="text" name="Name" required>
      </div>
      <div class="iew-group">
        <label>Email</label>
        <input class="iew-input iew-border" type="text" name="Email" required>
      </div>
      <div class="iew-group">
        <label>Message</label>
        <input class="iew-input iew-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="iew-btn iew-padding-large iew-margin-bottom"><i class="fa fa-paper-plane iew-margin-right"></i>Send Message</button>
    </form>
  </div>
 
  <div class="iew-black iew-center iew-padding-24">System IoEnergyWater</div>

<!-- End page content -->
</div>

</body>
</html>
