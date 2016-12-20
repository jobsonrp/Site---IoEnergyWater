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
include("connect.inc");
$table = "water_general";
$lista = array(); //id
$dens = array(); // value

$i = 0;

$result = mysqli_query($connect,"SELECT * FROM $table") or die("error select Water");
while($reg=mysqli_fetch_row($result)) {

 $lista[$i] = $reg[0];
 $dens[$i] = $reg[2];
 $i = $i + 1;
}
 
?>

<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ["Elemento", "Densidade" ],
  	<?php
  	$k = $i;
  	for ($i = 0; $i < $k; $i++) {
  	?>
          ['<?php echo $lista[$i] ?>', <?php echo $dens[$i] ?>],
  	<?php } ?>
      	]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
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
</br>
<?php echo "CPF : $cpf"; ?>

</h5>

 <h4 class="iew-text-black"><b>System IoEnergyWater</b></h4><br>
  </div>
  <a href="home.php#home" onclick="iew_close()" class="iew-padding iew-text-teal"><i class="fa fa-th-large fa-fw iew-margin-right"></i>HOME</a>
  <a href="home.php#energy" onclick="iew_close()" class="iew-padding"><i class="fa fa-lightbulb-o fa-fw iew-margin-right"></i>ENERGY</a>
  <a href="home.php#water" onclick="iew_close()" class="iew-padding"><i class="fa fa-tint fa-fw iew-margin-right"></i>WATER</a>
  <a href="home.php#alarmEnergy" onclick="iew_close()" class="iew-padding"><i class="fa fa-warning fa-fw iew-margin-right"></i>ALARMS - Energy</a>
  <a href="home.php#alarmWater" onclick="iew_close()" class="iew-padding"><i class="fa fa-warning fa-fw iew-margin-right"></i>ALARMS - Water</a>
  <a href="history.php" onclick="iew_close()" class="iew-padding"><i class="fa fa-history fa-fw iew-margin-right"></i>DATA HISTORY</a>
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
      <a href="#home" class="iew-btn">Home</a>
      <a href="#energy" class="iew-btn iew-white">Energy</a>
      <a href="#water" class="iew-btn iew-white">Water</a>
    </div>
  </header>
  
<div class="iew-container iew-padding-large" style="margin-bottom:10px">
<h3 class="iew-hide-small iew-hide-medium"></h3>

  <!-- Header Home -Begin -->
  <header class="w3-container" id="energy">
</br>
<h3 style="color:white;"><b>Energy General Information</b></h3>

<div id="curve_chart" style="width: 900px; height: 500px"></div>

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

</table>
  <!-- Header Home - End -->









  <!-- BEGIN -->
    </br>
	<div align="center">  

            <button class="iew-btn iew-black" onclick="DataRegister_Now()"><h4>Data Register - DataBase</h4></button></h4>

       </div>


 </br></br>
 <!-- END -->

</br></br>
 <div class="iew-black iew-center iew-padding-24"><h3>System IoEnergyWater</h3></div>
</div>
<!-- End page content -->

</div>

</body>


</html>

