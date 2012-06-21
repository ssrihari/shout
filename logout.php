<?php
  include("./func.php");
  $ip=ip_addr();
  $host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="shout"; // Database name
	$tbl_name="login"; // Table name
	
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$query = "update $tbl_name set ip=NULL where ip='$ip'";
	$result = mysql_query($query);
  $URL = "./login.php?msg=Logged out successfully"; 
  mysql_close($con);
  header("Location: $URL"); 
?>
