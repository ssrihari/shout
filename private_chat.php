<?php

#  get sender and receiver data
  $sender = $_POST['sender'];
  $receiver = $_POST['receiver'];

#  create file  
  $filename = "/data/".$sender.$receiver;
  $file = fopen($_SERVER['DOCUMENT_ROOT'].'/test/php/shout'.$filename,'a+');
  fclose($file);
  $filename = ".".$filename;
  chmod ($filename , 0777);
  
#  make new entry in chat table in db  
  $host="localhost";
	$username="visishta";
	$password="sriram1958";
	$db_name="visishta_shout";
	$tbl_name="chat";
	
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
  
#  TODO strip ./data/ from filename
	$query = "insert into chat values('$sender','$receiver','$filename',2,CURDATE(),CURTIME());";
  if(!mysql_query($query)){
    echo "insert row failed";
  }
  
  mysql_close($con);
  
#  set current file in cookie
  setcookie("current_file", "$filename", time()+3600*24*6);
  
?>
