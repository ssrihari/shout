<?php
  $sender = $_POST['sender'];
  $receiver = $_POST['receiver'];
  $filename = "./data/".$sender.$receiver;
  $file = fopen($filename,"w") or die("Can't create file");
  chmod ($filename , 777);
  setcookie("current_file", "$filename", time()+3600*24*6);
?>
