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

<?php
// Conexão Local

$dateNow = new DateTime();
$dateNow->setTimezone(new DateTimeZone('America/Recife'));
$fdateNow = $dateNow->format('Y-m-d H:i:s');

$dateEndInitial = $fdateNow;

$dateNow->modify('-30 day');
$dateBeginInitial = $dateNow->format('Y-m-d H:i:s');

	if(!isset($_GET['numPeople'])){
          $numPeople=1;
        }
        else{
	  $numPeople=$_GET['numPeople'];
        }

	if(!isset($_GET['varId'])){
          $varId='1';
        }
        else{
	  $varId=$_GET['varId'];
        }

	if(!isset($_GET['dateBegin'])){
          $dateBegin= $dateBeginInitial;// '2016-12-20T00:00';
        }
        else{
	  $dateBegin=$_GET['dateBegin'];
        }

	if(!isset($_GET['dateEnd'])){
          $dateEnd= $dateEndInitial; //"2016-12-21T00:00";
        }
        else{
	  $dateEnd=$_GET['dateEnd'];
        }

include("connect.inc");

$dateEndStr = new DateTime($dateEnd);

$dateBeginStr = new DateTime($dateBegin);

$interval = $dateEndStr->diff( $dateBeginStr );

$fdateEndStr = $dateEndStr->format('Y-m-d H:i');
$fdateBeginStr = $dateBeginStr->format('Y-m-d H:i');

//echo $interval;

$table = "history_energy_device";

$statusAlarm = array();
$time = array(); 
$valueVar = array(); 

$i = 0;
$SumVarName = 0;
$result = mysqli_query($connect,"SELECT * FROM $table WHERE (date BETWEEN '$dateBegin' AND '$dateEnd') AND id_device=$varId") or die("error select Water");
while($reg=mysqli_fetch_row($result)) {

	if ($reg[6] == "on") {
	   $statusAlarm[$i] = 1;
	} else {
	   $statusAlarm[$i] = 0;	
	}
 
 $time[$i] = $reg[7];
 $valueVar[$i] = $reg[3];
 $i = $i + 1;

$varName = $reg[2];

$SumVarName = $SumVarName + $reg[3];

} 

?>

<!DOCTYPE html>
<html>
<head>

		<script type="text/javascript">
			jQuery(window).load(function($){
				var d = new Date();
				var datestring = d.getFullYear()  + "-" + (d.getMonth()+1) + "-" + d.getDate() + "T" +
				d.getHours() + ":" + d.getMinutes();
				document.getElementById("dateEnd").value = datestring;
		
				var datestringInitial = d.getFullYear()  + "-" + (d.getMonth()) + "-" + d.getDate() + "T" +
				d.getHours() + ":" + d.getMinutes();
				document.getElementById("dateBegin").value = datestringInitial;
			});
		</script> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ["Timeline", "<?php echo $varName ?>"+" (L/min)", "Status Alarm (On/Off)" ],
  	<?php
  	$k = $i;
  	for ($i = 0; $i < $k; $i++) {
  	?>
          ['<?php echo $time[$i] ?>', <?php echo $valueVar[$i] ?>, <?php echo $statusAlarm[$i] ?>],
  	<?php } ?>
      	]);

        var options = {
          title: 'History Energy Device',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart1.draw(data, options);
	
      }
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
  <a href="graphicEnergyGeneral.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-fw iew-margin-right"></i>Data Energy General</a>
  <a href="graphicEnergyDevices.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-fw iew-margin-right"></i>Data Energy Devices</a>
  <a href="graphicWaterGeneral.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-fw iew-margin-right"></i>Data Water General</a>
  <a href="graphicWaterDevices.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-fw iew-margin-right"></i>Data Water Devices</a>
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
</br>
  <!-- Header Home -Begin -->
  <header class="w3-container" id="energy">
</br>

       <div align="center">  
	<form align="left" class="iew-btn iew-white">
	<h4 style="color:black; text-align:left"><b>Graphic Energy Devices</b></h4></br>
	<b>Number of People Living in the House :</b>
	<input class="iew-btn iew-white" type="number" id="numPeople" name="numPeople" value=1 size="3" min="1" max="10"></br></br>
	<b>Select Variable</b>
	<select name="varId" class="iew-btn iew-white"> <option value=1>AirConditioning <option value=2>Electric Shower <option value=3>Lighting1 <option value=4>Lighting2 <option value=5>Refrigerator <option value=6>TV42</select>
	  </br></br>
	  <b>&nbsp;&nbsp;Initial :&nbsp;</b>
	  <input class="iew-btn iew-white" type="datetime-local" id="dateBegin" name="dateBegin" value="2016-12-20T00:00">&nbsp;&nbsp; </br></br>
	  <b>Final :</b>
	  <input class="iew-btn iew-white" type="datetime-local" id="dateEnd" name="dateEnd" value="2016-12-21T00:00"></br></br>	
	  <input class="iew-btn iew-black" type="submit" value="Plot and Analyze"></input>
	</br>
	</form>
       </div>

</br>
</br>
       <div align="center">  
	<div class="iew-white iew-center"><h4><?php echo "Interval Graph >> Date Begin: $fdateBeginStr // Date End: $fdateEndStr"; ?>
        </h4></div>
	   
           <div class="iew-left" id="curve_chart1" style="width: 100% ; height: 500px"></div>
       </div> 
 </br></br>
	<h4 style="color:white; text-align:left"><b>	
Considering as reference an average consumption of 75 KWatts / person / month which is equivalent to 2500 Watts / person / day.
 </b></h4></br>


<div class="iew-white iew-center"><h3>Search Analysis</h3></div>

	<h4 style="color:white; text-align:left"><b>Number of People Living in the House : </b>
	<b style="color:yellow;"><?php echo "$numPeople person"; ?></b></h4>

	<h4 style="color:white; text-align:left"><b>Search Interval : </b>
	<b style="color:yellow;">

	<?php
	$consumeDesired = $numPeople * 2500; 

		if ($interval->m == '0') {
			$total = ($interval->d) * $consumeDesired;
			if ($interval->d == '0') {
				echo "{$interval->h} hours 1"; 
				$total = ( ($interval->h) / 24 )* $consumeDesired ;
				$total = sprintf("%01.2f", $total);
				$totalDesired = "( {$interval->h}/24 ) * ({$numPeople} * 2500) = $total ";
			} else {
				echo "{$interval->d} days and {$interval->h} hours";
				$totalDays = ($interval->d) + ($interval->h)/24;
				$total = $totalDays * $consumeDesired;
				$total = sprintf("%01.2f", $total);
				$totalDesired = "( {$interval->d} + {$interval->h}/24 ) * ({$numPeople} * 2500) = $total ";
			}
		} else {
			$totalDays = (30 * ($interval->m)) + ($interval->d) + ($interval->h)/24;
			echo "$totalDays days 3";
			$total = $totalDays * $consumeDesired;
			$total = sprintf("%01.2f", $total);
			$totalDesired = "( (30 * {$interval->m}) + {$interval->d} + {$interval->h}/24 ) * ({$numPeople} * 2500) = $total ";		
		}

	?>

	</b></h4>

	<h4 style="color:white; text-align:left"><b>Total Desired Consumption in this Interval : </b>
	<b style="color:yellow;"><?php echo "$totalDesired Watts"; ?></b></h4>

	<h4 style="color:white; text-align:left"><b>Total Sum Consumption in this Interval : </b>
	<b style="color:yellow;"><?php echo "$SumVarName Watts"; ?></b></h4>

	<h4 style="color:white; text-align:left"><b>Analysis Result : </b>
	<b style="color:yellow;">
		<?php

			$messageConsumption = "Normal Consumption"; 
			if ($SumVarName > $total) {
				$messageConsumption = "Consumption Exceeded";
			}
			echo $messageConsumption;
		?>
</b></h4>



</b></h4>
       </div>

  <!-- Header Home - End   -->

</br></br>
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


</html>

