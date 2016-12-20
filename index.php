<!DOCTYPE html>
<?php
require_once "ReCaptcha.php";
?>

<html>
  
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='validFieldsLogin.js'></script> 
</head>  
  
<title>IoEnergyWater</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/iew.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style class="iew-hide-small">
body {
    background: url("/images/site_home.png"), url("/images/backgroundBlue.png");
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
    <h1 style="text-shadow: 2px 2px 2px white" align="center"><b>IoEnergyWater</b></h1>
      <a href="home.php" class="iew-btn">Home</a></br></br>
      <a href="#login" class="iew-btn iew-white">Login</a>
      <a href="#overview" class="iew-btn iew-white">Overview</a>
      <a href="contact.php" class="iew-btn iew-white">Contact</a>
  </header>

<?php
    if ($resp != null && $resp->success) {
            require_once "login.php";
    } 
?>
  <!-- BEGIN Login -->
  <header class="iew-container" id="login" align="center">
</br>
    <div class="iew-section iew-bottombar iew-padding-16">
       <span class="iew-btn iew-white"><h4><a href=""></a></span>
    <form id="form1" align="center" name="form1" method="POST" action="?" onsubmit="return validar(this);">

    <div class="control-group">

    <div class="controls"></br>
      <input id="inputEmail" name="inputEmail" type="text" placeholder="Email address"></div>
    
    <div class="controls"></br>
      <input id="inputPassword" name="inputPassword" type="password" placeholder="Password"></div>
  
    <div class="controls"></br>
      <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
<div class="g-recaptcha" data-sitekey="6LerAQ0UAAAAAO3K0m9-2GIRwWtBj5tl30xhTliq"></div>
</br>
      <button class="iew-btn iew-black" id="enter" name="enter">Log In</button></div></h4>
    </div>
<h4 style="color: white">Registered Users</h4>
<h5 class="iew-btn iew-black">Login: albert@com &nbsp;   Password:123</h5>
<h5 class="iew-btn iew-black">Login: newton@com &nbsp;   Password:123</h5>
</form>

</div>
</br></br>
  </header>  
<!-- END Login -->

  <!-- BEGIN Overview -->
  <header class="iew-container" id="overview" align="center">  
  <div class="iew-container iew-padding-large" style="margin-bottom:16px"></br>
    <h4><b>Overview</b></h4>
    <p>IoEnergyWater has the main objective of improving energy performance and
Of the water consumed in a house, thereby avoiding waste. The user of the system will have full control over the electrical appliances and all water sources (faucets, showers, etc.) of the house, being able to monitor their individual consumption, make daily, monthly, weekly reports or personalized reports. The user can also get a forecast of the monthly expenses and if the energy stored in the batteries is above what is expected to spend the rest of the day he can sell his energy to the distributor.</p>
    <hr>
  </header>  
<!-- END Overview -->

  <div class="iew-black iew-center iew-padding-24"><h3>System IoEnergyWater</h3></div>
</br>

</div>
<!-- End page content -->

</body>
</html>
