<?php
	session_start();
	if(!isset($_SESSION["status"])){
          echo"<script language='javascript' type='text/javascript'>alert('Please! Make Login.');window.location.href='index.php#login';</script>";
        }
        else{
        $login = $_SESSION['inputEmail'];
        $cpf = $_SESSION["cpf"];
        }
?>

<!DOCTYPE html>
<html>
<head>
		<script src="validForms.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function($){
				homeSimulation();
			});
		</script> 

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
  
table {
    width: 100%;
    font-size: 16px;
    font-weight: bold;
    color: #000; 
    font-family: Arial, Helvetica, sans-serif;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr {background-color: #fff}

th {
    background-color: #000;
    color: white;
}  
  
</style>

</head>
<body class="iew-light-grey iew-content" style="max-width:1600px">
  <header class="w3-container" id="home">

<!-- Sidenav/menu -->
<nav class="iew-sidenav iew-collapse iew-white iew-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="iew-container">
    <a href="#" onclick="iew_close()" class="iew-hide-large iew-right iew-jumbo iew-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>

<?php echo "<img src='/images/$cpf.png' style='width:45%;' class='iew-round' />"; ?>

</strong></font></td>

<h5 class="iew-text-grey" align='left'>
<?php echo "Username : $login"; ?>
</h5>

 <h4 class="iew-text-black"><b>System IoEnergyWater</b></h4>
  </div>
  <a href="home.php#home" onclick="iew_close()" class="iew-padding iew-text-teal"><i class="fa fa-th-large fa-fw iew-margin-right"></i>HOME</a>
  <a href="home.php#energy" onclick="iew_close()" class="iew-padding"><i class="fa fa-lightbulb-o fa-fw iew-margin-right"></i>ENERGY</a>
  <a href="home.php#water" onclick="iew_close()" class="iew-padding"><i class="fa fa-tint fa-fw iew-margin-right"></i>WATER</a>
  <a href="home.php#alarmEnergy" onclick="iew_close()" class="iew-padding"><i class="fa fa-warning fa-fw iew-margin-right"></i>ALARMS - Energy</a>
  <a href="home.php#alarmWater" onclick="iew_close()" class="iew-padding"><i class="fa fa-warning fa-fw iew-margin-right"></i>ALARMS - Water</a>
  <a href="history.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-history fa-fw iew-margin-right"></i>DATA HISTORY</a>
  <a href="home.php#register" onclick="iew_close()" class="iew-padding"><i class="fa fa-inbox fa-fw iew-margin-right"></i>DATA REGISTER</a>	
  <a href="contact.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-contao fa-fw iew-margin-right"></i>CONTACT</a>
  <a href="logout.php" class="iew-padding"><i class="fa fa-user fa-fw iew-margin-right"></i>LOGOUT</a>   

</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="iew-overlay iew-hide-large iew-animate-opacity" onclick="iew_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="iew-main" style="margin-left:300px">

  <!-- Header -->
  <header class="iew-container" id="login">
    <a href="#">

<?php echo "<img src='/images/$cpf.png' style='width:14%;' class='iew-circle iew-right iew-hide-large iew-hover-opacity' />"; ?>

</a>
    <span class="iew-opennav iew-hide-large iew-xxlarge iew-hover-text-grey" onclick="iew_open()"><i class="fa fa-bars"></i></span>
    <h2 style="text-shadow: 2px 2px 2px white"><b>IoEnergyWater</b></h2>
    <div class="iew-section iew-padding-16">
      <a href="home.php#home" class="iew-btn">Home</a>
      <a href="home.php#energy" class="iew-btn iew-white">Energy</a>
      <a href="home.php#water" class="iew-btn iew-white">Water</a>
    </div>
  </header>
  
<div class="iew-container iew-padding-large" style="margin-bottom:10px">
<h3 class="iew-hide-small iew-hide-medium"></h3>

  <!-- Header Home -Begin -->
  <header class="w3-container" id="energy">
</br>
<h3 style="color:white;"><b>Energy General Information</b></h3>
<table>
  <tr>
    <th>Energy General</th> 
    <th>Current Value</th>
    <th>Input Hour (Solar)</th>
  </tr>
  <tr>
    <td>Sun</td>
    <td style="text-align:right"><output form="sunform" name="y" ></output> </td>
    <td style="text-align:center"><form id="sunform" oninput="y.value=parseFloat( (24*sun.value/100).toFixed(2)) + ' Hrs' ">0
                                  <input type="range" id="hourSolarInput" name="sun" value="0"> 24 </form></input></td>
  </tr>
  <tr>
    <td>Produced</td>
    <td style="text-align:right"><output name="energyProduced" id="energyProduced" size = "10"></td>
  </tr>
  <tr>
    <td>Total Consumed</td>
    <td style="text-align:right"><output id="energyTotal" size = "10"></td>
  </tr>
  <tr>
    <td>Battery Charge</td>
    <input type='hidden' id='batteryInicial' size='4px' value=100></input>
    <td style="text-align:right"><output id="batteryCharge" size = "10" value="0"></td>
  </tr>
  <tr>
    <th>Energy General</th> 
    <th>Current Value</th>
    <th>Status Energy</th>
  </tr>
  <tr>
    <td>Company Use</td>
    <td style="text-align:right"><output id="companyEnergyUsed" size = "10" value="0"></td>
    <td style="text-align:center"><output id="statusEnergyCompany" size = "10" value="0"></td>
  </tr>
</table>
  <!-- Header Home - End -->

<!-- Header Energy - Begin -->
  <header class="w3-container" id="energy">
</br></br>
<h3 style="color:white;"><b>Energy Consumption</b></h3>
<table>
  <tr>
    <th>Device</th>
    <th>Current Value</th>
    <th>Status</th>
  </tr>

<?php include 'tableEnergy.php';?>

</table>

  </header>
</br>
  <!-- Header Energy - End -->

  <!-- Header Energy - Begin -->
  <header class="w3-container" id="energy">
<table>
  <tr>
    <th>Subtotals Sources</th>
    <th>Current Value</th>
  </tr>
  <tr>
    <td>LightingTotal</td>
    <td style="text-align:right"><output id="lightingTotal" type="text"></td>   
  </tr>
  <tr>
    <td>PlugTotal</td>
    <td style="text-align:right"><output id="plugTotal" type="text"></td>
  </tr>
</table>

  </header>
    </br></br></br>
  <!-- Header Energy - End -->

  <!-- Header Water1 -Begin -->
</br>
<header class="w3-container" id="water">
<h3 style="color:white;"><b>Water General Information</b></h3>
<table>
  <tr>
    <th>Water General</th>
    <th>Current Value</th>
    <th>Input Rain (L/min)</th>
  </tr>
  <tr>
    <td>Rain</td>
    <td style="text-align:right"><output form="numform" name="x" ></output> </td>
    <td style="text-align:center"><form id="numform" oninput="x.value=parseFloat( (62.5*a.value/100).toFixed(2)) + ' L/min' ">0
                                  <input type="range" id="rainInput" name="a" value="0"> 62.5 </form></input></td>
  </tr>
  <tr>
    <td>Total Stored</td>
    <input type='hidden' id='storedWaterInicial' size='4px' value=50></input>
    <td style="text-align:right"><output id="storedWater" size = "10"></td>
  </tr>
  <tr>
    <td>Total Consumed</td>
    <td style="text-align:right"><output id="waterTotalHome" size = "10"></td>
  </tr>
  <tr>
    <td>Company Consumed</td>
    <td style="text-align:right"><output id="companyWaterUsed" size = "10"></td>
  </tr>
  <tr>
    <td>Use Stored</td>
    <td style="text-align:center"><select id="useStored">  <option value=0>No  <option value=1>Yes &nbsp;</select></td>
  </tr>
</table>
</header>

    </br>
  <!-- Header Home - End -->

<h4 style="color:white;"><b>In the rain gauge every 1 mm equals 1 L / square meter. Then considering a roof with 25 square meters and that a torrential rain of 150 mm / h, one can reach the maximum value of 62.5 L / min.</br>
Note: The data were based on standard NBR 10844/89 ABNT Pluvial Water Installations.</b></h4>
<!-- Header Water BD - Begin -->
  <header class="w3-container" id="water">
</br></br>
<h3 style="color:white;"><b>Water Consumption</b></h3>
<table>
  <tr>
    <th>Device</th>
    <th>Current Value</th>
    <th>Status</th>
  </tr>

<?php include 'tableWater.php';?>

</table>

  </header>
</br>
  <!-- Header Water BD - End -->

<!-- Header Energy BD Alarm - Begin -->
  <header class="w3-container" id="alarmEnergy">
</br></br>
<h3 style="color:white;"><b>Energy Alarms</b></h3>
<table>
  <tr>
    <th>Device</th>
    <th>Max Value</th>
    <th>Status</th>
  </tr>

<?php include 'tableAlarmsEnergy.php';?>

</table>

  </header>
</br>


  <!-- Header Energy BD Alarm- End -->

<!-- Header Water BD Alarm - Begin -->
  <header class="w3-container" id="alarmWater">
</br></br>
<h3 style="color:white;"><b>Water Alarms</b></h3>
<table>
  <tr>
    <th>Device</th>
    <th>Max Time (min)</th>
    <th>Status</th>
  </tr>

<?php include 'tableAlarmWater.php';?>

</table>

  </header>
</br>
  <!-- Header Water BD Alarm- End -->

  <!-- BEGIN Button DB Register -->
</br>
<header class="w3-container" id="register">
  <h3 style="color:white;"><b>Data Register</b></h3>
	<div align="center">  

            <button class="iew-btn iew-white" onclick="DataRegister_Now()"><h3>Data Register - DataBase</h4></button></h3>

       </div>

 </br></br>
 <!-- END Button DB Register -->
</br>

    
</header>

<div class="iew-black iew-center iew-padding-24"><h3>System IoEnergyWater</h3></div>

</div>
<!-- End page content -->

</div>

<script>
// Script to open and close sidenav
function iew_open() {
      document.getElementById("mySidenav").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
 }

function iew_close() {
     document.getElementById("mySidenav").style.display = "none";
     document.getElementById("myOverlay").style.display = "none";
 }
 
 function iew_logout() {water1
     header("location:logout.php");
  }
  </script>

</body>

<script src="SimuIEWVar.js"></script>

</html>

