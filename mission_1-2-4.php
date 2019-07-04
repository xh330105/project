<?php
  //ƒ~ƒbƒVƒ‡ƒ“1-2-1
  $hensu = "hello word";
  $filename = "mission_1-2.txt";
  $fp = fopen($filename,"w");
  fwrite($fp,$hensu);
  fclose($fp);
?>