<?php

$host="localhost"; // Host name 
$username="visishta"; // Mysql username
$password="sriram1958"; // Mysql password
$db_name="visishta_shout"; // Database name
$tbl_name="login"; // Table name

function ip_addr(){
  return $_SERVER['REMOTE_ADDR'];
}

function is_valid_login($un, $pw){

  global $host, $username, $password, $db_name, $tbl_name;
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
  $sql="SELECT * FROM $tbl_name WHERE username='$un' and password='$pw'";
  $result=mysql_query($sql);

  $count=mysql_num_rows($result);
  if($count==1){
    $ip=ip_addr();
    $sql="update login set ip='$ip' where username='$un'";
    $result=mysql_query($sql);
    return TRUE;
  }
  return FALSE;
}

function who_is_online(){

  global $host, $username, $password, $db_name, $tbl_name;    
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

  $sql="SELECT * FROM $tbl_name WHERE ip !='NULL'";
  $result=mysql_query($sql);
  
  $users = "<table>";
  while($row = mysql_fetch_array($result)){
    $onlineUser = $row['username'];
    $user_row = "<tr id=$onlineUser onclick=\"username_click_handler('$onlineUser')\"><td>$onlineUser</td></tr>";
    $users = $users.$user_row;
  }
  
  $users = $users."</table>";

  mysql_close($con);
  return $users;
}

function current_username(){

  global $host, $username, $password, $db_name, $tbl_name;    
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
  $cur_ip=ip_addr();
  $sql="SELECT username FROM $tbl_name WHERE ip = '$cur_ip'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  return $row['username'];  
}	   
?>    
