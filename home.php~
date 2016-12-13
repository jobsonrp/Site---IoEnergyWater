<?php
	session_start();
	if(!isset($_SESSION["status"])){
          echo"<script language='javascript' type='text/javascript'>alert('Please! Make Login.');window.location.href='index.php';</script>";
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
</br>
<?php echo "CPF : $cpf"; ?>
</h5>

    <h4 class="iew-text-black"><b>IoEnergyWater System</b></h4><br>
  </div>
  <a href="#home" onclick="iew_close()" class="iew-padding iew-text-teal"><i class="fa fa-th-large fa-fw iew-margin-right"></i>HOME</a>
  <a href="#energy" onclick="iew_close()" class="iew-padding"><i class="fa fa-lightbulb-o fa-fw iew-margin-right"></i>ENERGY</a>
  <a href="#water" onclick="iew_close()" class="iew-padding"><i class="fa fa-tint fa-fw iew-margin-right"></i>WATER</a>
  <a href="#alarm" onclick="iew_close()" class="iew-padding"><i class="fa fa-warning fa-fw iew-margin-right"></i>ALARMS</a>
  <a href="contact.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-contao fa-fw iew-margin-right"></i>CONTACT</a>
  <a href="logout.php" class="iew-padding"><i class="fa fa-user fa-fw iew-margin-right"></i>LOGOUT</a>   
 
  <div class="iew-section iew-padding-top iew-large">
    <a href="#" class="iew-hover-white iew-hover-text-indigo iew-show-inline-block"><i class="fa fa-facebook-official"></i></a>
    <a href="#" class="iew-hover-white iew-hover-text-purple iew-show-inline-block"><i class="fa fa-instagram"></i></a>
    <a href="#" class="iew-hover-white iew-hover-text-yellow iew-show-inline-block"><i class="fa fa-snapchat"></i></a>
    <a href="#" class="iew-hover-white iew-hover-text-red iew-show-inline-block"><i class="fa fa-pinterest-p"></i></a>
    <a href="#" class="iew-hover-white iew-hover-text-light-blue iew-show-inline-block"><i class="fa fa-twitter"></i></a>
    <a href="#" class="iew-hover-white iew-hover-text-indigo iew-show-inline-block"><i class="fa fa-linkedin"></i></a>
  </div>
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
      <a href="#home" class="iew-btn">Home</a>
      <a href="#energy" class="iew-btn iew-white">Energy</a>
      <a href="#water" class="iew-btn iew-white">Water</a>
    </div>
  </header>
  
<div class="iew-container iew-padding-large" style="margin-bottom:10px">
<h3 class="iew-hide-small iew-hide-medium"></h3>

  <!-- Header Home -Begin -->
  <header class="w3-container" id="home">
</br>
<h3 style="color:white;"><b>Energy General Information</b></h3>
<table>
  <tr>
    <th>Energy General</th> 
    <th>Current Value</th>
    <th>Input Hour (Solar)</th>
  </tr>
  <tr>
    <td>Produced</td>
    <td style="text-align:right"><output id="energyProduced" size = "10"></td>
    <td style="text-align:center"><input id="hourSolarInput" size="5px" value="12" style="text-align:center"> (0-24h)</input></td>
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
    <th>Energy Sources</th>
    <th>Current Value</th>
    <th>Actions</th>
  </tr>
  <tr>
    <td>AirConditioning</td>
    <td style="text-align:right"><output id="airCond" size = "10"><br/></strong></td>
    <td style="text-align:center"><select id="statusAir">  <option value="0">Off &nbsp; <option value="1">On </select></td>	
  </tr>
  <tr>
    <td>Electric Shower</td>
    <td style="text-align:right"><output id="eShower" type="text"> <br /></strong></td>
    <td style="text-align:center"><select id="statusShower">  <option value="0">Off &nbsp; <option value="1">On </select></td>
  </tr>
  <tr>
    <td>LightingTotal</td>
    <td style="text-align:right"><output id="lightingTotal" type="text"></td>
    <td></td>    
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Lighting1</td>
    <td style="text-align:right"><output id="lighting1" type="text"></td>
    <td style="text-align:center"><select id="statusLight1">  <option value="1">On  <option value="0">Off &nbsp;</select></td>
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Lighting2</td>
    <td style="text-align:right"><output id="lighting2" type="text"></td>
    <td style="text-align:center"><select id="statusLight2">  <option value="1">On  <option value="0">Off &nbsp;</select></td>
  </tr>
  <tr>
    <td>PlugTotal</td>
    <td style="text-align:right"><output id="plugTotal" type="text"></td>
    <td></td>
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Plug1 - Refrigerator</td>
    <td style="text-align:right"><output id="plug1" type="text"></td>
    <td style="text-align:center"><select id="statusPlug1">  <option value="1">On  <option value="0">Off &nbsp;</select></td>
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Plug2 - TV42</td>
    <td style="text-align:right"><output id="plug2" type="text"></td>
    <td style="text-align:center"><select id="statusPlug2">  <option value="1">On  <option value="0">Off &nbsp;</select></td>
  </tr>
</table>

  </header>
    </br></br></br>
  <!-- Header Energy - End -->

  <!-- Header Home -Begin -->
</br>
<h3 style="color:white;"><b>Water General Information</b></h3>
<table>
  <tr>
    <th>Water General</th>
    <th>Current Value</th>
    <th>Input Rain (L/min)</th>
  </tr>
  <tr>
    <td>Total Stored</td>
<input type='hidden' id='storedWaterInicial' size='4px' value=50></input>
    <td style="text-align:right"><output id="storedWater" size = "10"></td>
    <td style="text-align:center"><input id="rainInput" size="5px" value=50 style="text-align:center"> (0-62.5) *</input></td>
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


  <!-- Header Water - Begin -->
  <header class="w3-container" id="water">
<h3 style="color:white;"><b>Water Consumption</b></h3>
<table>
  <tr>
    <th>Water Sources</th>
    <th>Current Value</th>
    <th>Actions</th>
  </tr>
  <tr>
    <td>Water Total</td>
    <td style="text-align:right"><output id="waterTotal" size = "10"></td>
    <td></td>
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Water1 - Shower</td>
    <td style="text-align:right"><output id="water1" type="text"></td>
    <td style="text-align:center"><select id="statusWater1">  <option value="1">Open  <option value="0">Closed &nbsp;</select></td>
  </tr>
  <tr style="background-color: #e0e0e0">
    <td>&nbsp;  Water2 - Water Tap</td>
    <td style="text-align:right"><output id="water2" ></td>
    <td style="text-align:center"><select id="statusWater2">  <option value="1">Open  <option value="0">Closed &nbsp;</select></td>
  </tr>
</table>
  </header>
    </br></br></br>
  <!-- Header Water -End -->

</br></br>
 <div class="iew-black iew-center iew-padding-24"><h3>System IoEnergyWater</h3></div>
</div>
<!-- End page content -->
</div>

<script>
// Script to open and close  sidenav
function iew_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function iew_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function iew_logout() {
    header("location:logout.php");
}
</script>

</body>

<script src="SimuIEWVar.js"></script>

</html>
