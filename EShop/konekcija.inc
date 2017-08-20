<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$database = "eshop";
	$con = mysql_connect($host,$user,$pwd) or die ("nije uspela konekcija sa bazom").mysql_error;
	
	mysql_select_db($database,$con);
	
	
?>