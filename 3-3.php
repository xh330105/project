<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission_3-3</title>
</head>
<body>
<form action="3-3x.php" method="post">
 name:<br/>
<input type="text" name="name" size="30" value=""/></br>
 comment:</br>
<input type="text" name="comment" size="30" value=""/></br>
<br/>
<input type="submit" name="toukou" value="submit"/>
</form>
<form action="3-3-1X.php" method="post">
 delete specified comment number:<br/>
<input type="text" name="deleteno" siza="30" valie=""/></br>
 <input type="submit" name="delete" value="delete">
</form>
</body>
</html>
<?php
$filename='mission_3-3.txt';
  $handle = fopen($filename,"r");
 while($line = fgets($handle)){
 $vars = array("$line");
 foreach( $vars as $vars){
 echo implode(" ",explode("<>",$vars))."<br>";
 }
 }
?>