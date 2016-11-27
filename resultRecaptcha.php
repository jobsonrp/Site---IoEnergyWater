<?php
    if ($resp != null && $resp->success) {

	$action=$_REQUEST['action'];
	if ($action!="")    /* display the contact form */
    	{
	    $name=$_REQUEST['name'];
	    $email=$_REQUEST['email'];
	    $message=$_REQUEST['message'];
	    $messageFull="NAME: $name\r\nEMAIL: $email\r\nMESSAGE: $message";
	    if (($name=="")||($email=="")||($message==""))
        	{
		  echo"<script language='javascript' type='text/javascript'>alert('All fields are required, please fill the form again.');</script>";
	    } else {		
		$from="From: $name<$email>\r\nReturn-path: $email";
        	$subject="Message sent using your contact form";
		mail("jobsonrp@gmail.com", $subject, $messageFull, $from);
                echo"<script language='javascript' type='text/javascript'>alert('Email sent!');</script>";
	    }
        }
  }
?>
