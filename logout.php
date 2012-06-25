<?php
  include("./func.php");
  $ip=ip_addr();
  $host="localhost"; // Host name
	$username="visishta"; // Mysql username
	$password="sriram1958"; // Mysql password
	$db_name="visishta_shout"; // Database name
	$tbl_name="login"; // Table name
	
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$query = "update $tbl_name set ip=NULL where ip='$ip'";
	$result = mysql_query($query);
  $URL = "./login.php?msg=Logged out successfully"; 
  mysql_close($con);
  unlink($_COOKIE["current_file"]);
  setcookie("current_file", "", time()-3600*24*6);
  header("Location: $URL"); 
?>
