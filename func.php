<?
function ip_addr(){
  return $_SERVER['REMOTE_ADDR'];
}

function is_valid_login($un, $pw){
  $host="localhost"; // Host name 
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="shout"; // Database name
	$tbl_name="login"; // Table name
  
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
  $host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="shout"; // Database name
	$tbl_name="login"; // Table name
  
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

  $sql="SELECT * FROM $tbl_name WHERE ip !='NULL'";
  $result=mysql_query($sql);
  $users = "";
  while($row = mysql_fetch_array($result)){
    $users = $users.$row['username']." | ";
  }
  
  mysql_close($con);
  return $users;
}
	   
?>
