<?php
  //?????1-2-1
  $hensu = "hello word";
  $filename = "mission_1-2.txt";
  $fp = fopen($filename,"r");
  fwrite($fp,$hensu);
  fclose($fp);
?>