<?php
  $sender = $_POST['sender'];
  $receiver = $_POST['receiver'];
  $filename = "/data/".$sender.$receiver;
  $file = fopen($_SERVER['DOCUMENT_ROOT'].'/test/php/shout'.$filename,'a+');
  fclose($file);
  chmod ('.'.$filename , 0777);
  setcookie("current_file", "."."$filename", time()+3600*24*6);
?>
