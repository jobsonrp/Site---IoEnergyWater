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
      <a href="index.php#login" class="iew-btn iew-white">Login</a>
      <a href="index.php#overview" class="iew-btn iew-white">Overview</a>
      <a href="" class="iew-btn iew-white">Contact</a>
  </header>
</br></br>
  <!-- BEGIN Contact -->
  <header class="iew-container" id="contact" align="center">    
  <!-- Contact Section -->
  <div class="iew-container iew-padding-large iew-grey">
    <h4 id="contact"><b>Contact Me</b></h4>
    <div class="iew-row-padding iew-center iew-padding-24" style="margin:0 30px">
      <div class="iew-third iew-dark-grey">
        <p><i class="fa fa-envelope iew-xxlarge iew-text-light-grey"></i></p>
        <p>jobsonrp@gmail.com</p>
      </div>
      <div class="iew-third iew-teal">
        <p><i class="fa fa-map-marker iew-xxlarge iew-text-light-grey"></i></p>
        <p>Pernambuco, BRAZIL</p>
      </div>
      <div class="iew-third iew-dark-grey">
        <p><i class="fa fa-phone iew-xxlarge iew-text-light-grey"></i></p>
        <p>----------</p>
      </div>
    </div>
    <hr class="iew-opacity">

<?php
require_once "resultRecaptcha.php";
?>
    <form action="?" method="POST">
    <input type="hidden" name="action" value="submit">
      <div class="iew-group">
        <label>Name</label>
        <input class="iew-input iew-border" type="text" name="name">
      </div>
      <div class="iew-group">
        <label>Email</label>
        <input class="iew-input iew-border" type="text" name="email">
      </div>
      <div class="iew-group">
        <label>Message</label>
        <textarea class="iew-input iew-border" name="message" rows="3" cols="30"></textarea>
      </div>
      <div align="center" class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
<div class="g-recaptcha" data-sitekey="6LerAQ0UAAAAAO3K0m9-2GIRwWtBj5tl30xhTliq"></div>
</br>
      <button type="submit" value="submit" class="iew-btn iew-padding-large iew-margin-bottom"><i class="fa fa-paper-plane iew-margin-right"></i>Send Message</button>

    </form>
  </div>
 </br>
  <div class="iew-black iew-center iew-padding-24"><h3>System IoEnergyWater</h3></div>
</br>
</div>
  </header> 
<!-- End page content -->

</body>
</html>
