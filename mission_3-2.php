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
</body>
</html>
<?php
$filename='mission_3-2.txt';
  $handle = fopen($filename,"r");
 while($line = fgets($handle)){
 $vars = array("$line");
 foreach( $vars as $vars){
 echo implode(" ",explode("<>",$vars))."<br>";
 }
 }
?>
