<?php

  include("./func.php");
  $current_username = current_username();
  
  $host="localhost"; // Host name
	$username="visishta"; // Mysql username
	$password="sriram1958"; // Mysql password
	$db_name="visishta_shout"; // Database name
	$tbl_name="chat"; // Table name
	
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	
	$query = "SELECT filename FROM $tbl_name WHERE participants LIKE '%$current_username%';";
	$result = mysql_query($query);

  $count=mysql_num_rows($result);
  if($count==1){
    $row=mysql_fetch_array($result);
    if(strcmp($row['filename'],$_COOKIE["current_file"])!=0)
        setcookie("current_file", "."."$row['filename']", time()+3600*24*6);
  }
  
  mysql_close($con);
?>
