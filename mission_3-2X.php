<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission_3-2</title>
</head>
<body>
<form action="mission_3-2X.php" method="post">
 name:<br/>
<input type="text" name="name" size="30" value=""/></br>
 comment:</br>
<input type="text" name="comment" size="30" value=""/></br>
<br/>
<input type="submit" value="submit"/>
</form>
<tr>
<td>
<?php
$filename='mission_3-2.txt';
$a = $_POST["comment"];
$b = $_POST["name"];
$c = date('Y/m/d H:i:s');
if (file_exists($filename)){
$num= count(file($filename))+1;
}
else{
$num = 1;
}
$d = $num."<>".$b."<>".$a."<>".$c."\r\n";
  $filename = "mission_3-2.txt";
  $fp = fopen($filename,"a");
  fwrite($fp,$d);
  fclose($fp); 
  $handle = fopen($filename,"r");
 while($line = fgets($handle)){
 $vars = array("$line");
 foreach( $vars as $vars){
 echo implode(" ",explode("<>",$vars))."<br>";
 }
 }

?>
</td>
</tr>
</body>
</html>
