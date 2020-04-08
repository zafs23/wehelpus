<?php
    include_once ("dao.php");
	session_start(); 
	session_unset(); 
	session_destroy(); 
	if(!$_SESSION['email'])
   		//echo "Successfully logged out!<br />";
   		header ("Location: index.php");
	else
   		 echo "Error Occured!!<br />";
?>