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
		<script src="variableSimulation.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function($){
				homeSimulation();
			});
		</script> 
<script>
$(document).ready(function(){
	$("configAlarm").hide();
        $("btnShowAlarm").show();
        $("btnHideAlarm").hide();
        $("addAlarm").hide();
        $("editAlarm").hide();
        $("delAlarm").hide();
    $("#hide").click(function(){
        $("configAlarm").hide();
        $("btnShowAlarm").show();
        $("btnHideAlarm").hide();
        $("addAlarm").hide();
        $("editAlarm").hide();
        $("delAlarm").hide();
    });
    $("#show").click(function(){
        $("configAlarm").show();
        $("btnHideAlarm").show();
        $("btnShowAlarm").hide();
    });
    $("#showAddAlarm").click(function(){
        $("editAlarm").hide();
        $("delAlarm").hide();
        $("addAlarm").show();
    });
    $("#showEditAlarm").click(function(){
        $("addAlarm").hide();
        $("delAlarm").hide();
        $("editAlarm").show();
    });
    $("#showDelAlarm").click(function(){
        $("addAlarm").hide();
        $("editAlarm").hide();
        $("delAlarm").show();
    });

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
<h3 style="color:white;"><b>General Information</b></h3>
<table>
  <tr>
    <th>General Consumption</th>
    <th>Current Value</th>
  </tr>
  <tr>
    <td>Water Total</td>
    <td style="text-align:right"><output id="waterTotalHome" size = "10"></td>
  </tr>
  <tr>
    <td>Energy Total</td>
    <td style="text-align:right"><output id="energyTotal" size = "10"></td>
  </tr>
</table>
</header>
    </br></br></br>
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
    <td style="text-align:center"><select id="statusAir">  <option value="1">On  <option value="0">Off &nbsp;</select></td>	
  </tr>
  <tr>
    <td>Electric Shower</td>
    <td style="text-align:right"><output id="eShower" type="text"> <br /></strong></td>
    <td style="text-align:center"><select id="statusShower">  <option value="1">On  <option value="0">Off &nbsp;</select></td>
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

  <!-- Header Water - Begin -->
  <header class="w3-container" id="water">
</br></br>
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
    <td style="text-align:right"><output id="water2" type="text"></td>
    <td style="text-align:center"><select id="statusWater2">  <option value="1">Open  <option value="0">Closed &nbsp;</select></td>
  </tr>
</table>
  </header>
    </br></br></br>
  <!-- Header Water -End -->


<!-- Header Alarm Energy - Begin maximum value -->
  <header class="w3-container" id="alarm">
</br></br>
<h3 style="color:white;"><b>Alarms</b></h3>
<table>
  <tr>
    <th>Id</th>
    <th>Device</th>
    <th>Max-Value</th>
    <th>Status</th>
  </tr>

<?php include 'tableAlarms.php';?>

</table>

  </header>
</br></br></br>
  <!-- Header Alarm Energy - End -->


  <!-- Header Alarms - Begin -->
<header class="iew-container" id="alarmConfig" align="center"></br>

        <btnShowAlarm>
		<a href="#alarmConfig" class="iew-btn iew-black" id="show"><h3>Alarm Configuration >></h3></a>
	</btnShowAlarm>

	<btnHideAlarm>
		<a href="#alarmConfig" class="iew-btn iew-black" id="hide"><h3><< Alarm Configuration</h3></a>
	</btnHideAlarm>

      <div class="iew-section iew-bottombar iew-padding-8" align="center">
	<configAlarm>
	       <span class="iew-btn iew-white" align="center"><h4><a href=""></a></span>
	<form id="form1" align="center" name="form1">
        	<div class="control-group">
		   <h4 style="color:black;"><b>Select Option</b></h4>
	           <div class="controls" align="center"></br>
			<a href="#alarmConfig" class="iew-btn iew-white" id="showAddAlarm"><h4>Add</h4></a>
			<a href="#alarmConfig" class="iew-btn iew-white" id="showEditAlarm"><h4>Edit</h4></a>
			<a href="#alarmConfig" class="iew-btn iew-white" id="showDelAlarm"><h4>Delete</h4></a>
                   </div></h4>
                </div>
        </form>
        </configAlarm> 

	<addAlarm>
		  <span class="iew-btn iew-white"><h4><a href=""></a></span>
		    <form id="form2" align="center" name="form2" method="POST" action="crudAlarms.php" onsubmit="return validAdd(this);">
		              <input id="deviceIdAlarm" name="deviceIdAlarm" type="text" placeholder="Device ID">
		           <div class="controls"></br>
		              <input id="maxValueAlarm" name="maxValueAlarm" type="text" placeholder="Maximum Value">
			   </div>
           		   <div class="controls"></br>
		              <button class="iew-btn iew-black" id="enter" name="enter" value="add">Add</button>
                           </div></h4>
                    </form>
	</addAlarm>

	<editAlarm>
		  <span class="iew-btn iew-white"><h4><a href=""></a></span>
		    <form id="form3" align="center" name="form3" method="POST" action="crudAlarms.php" onsubmit="return validEdit(this);">
		              <input id="deviceIdAlarm" name="deviceIdAlarm" type="text" placeholder="Device ID">
		           <div class="controls"></br>
		              <input id="maxValueAlarm" name="maxValueAlarm" type="text" placeholder="Maximum Value">
			   </div>
           		   <div class="controls"></br>
              		      <button class="iew-btn iew-black" id="enter" name="enter" value="edit">Edit</button>
                           </div></h4>
                    </form>
	</editAlarm>

	<delAlarm>
		  <span class="iew-btn iew-white"><h4><a href=""></a></span>
		    <form id="form4" align="center" name="form4" method="POST" action="crudAlarms.php" onsubmit="return validDel(this);">
		              <input id="deviceIdAlarm" name="deviceIdAlarm" type="text" placeholder="Device Id">
           		   <div class="controls"></br>
              		      <button class="iew-btn iew-black" id="enter" name="enter" value="del">Delete</button>
                           </div></h4>
                    </form>
	</delAlarm>


  </header>
 <!-- Header Alarms - End -->
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

<script>
function myFunction(idAlarm) {
statusAlarm = document.getElementById("statusValue"+idAlarm).value;
    if(statusAlarm == "on"){
        changeValue = "off";
    } else {
        changeValue = "on"; }
    window.location.href='tableEnergy.php?idAlrm='+idAlarm+'&changeStatus='+changeValue;
}
</script>

</body>

</html>
