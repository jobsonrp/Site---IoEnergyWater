<?php
session_start();
if(isset($_POST['inputEmail']))
    $login=$_POST['inputEmail'];
if(isset($_POST['inputPassword']))
    $senha=$_POST['inputPassword'];
  $entrar = $_POST['enter'];
  include("connect.inc");
    if (isset($entrar)) {
            
      $verifica = mysqli_query($connect,"SELECT * FROM user WHERE email = '$login' AND password = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
        }else{
           $_SESSION["status"] = "1";
           $_SESSION['inputEmail'] = $login;
           $registro=mysqli_fetch_row($verifica);
           $_SESSION["cpf"] = $registro[2];
           header('location:home.php');
        }
    }
mysqli_close($connect);
?> 
	
