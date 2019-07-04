<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8N" />
<title>mission_2-1</title>
</head>
<body>
<table border="1">
<thead>
<tr>
<th>コメント</th> 
</tr>
</thead>
<tbody>
<tr valign="middle">
<td><form action="mission_2-3X.php" method="post">
  <input type="text" name="comment" size="30" value="" /><br />
  <input type="submit" value="送信" />
</td>
</tr>
</form>
<?php
  $hensu = "comment";
  $filename = "mission_2-3.txt";
  $fp = fopen($filename,"a");
  fwrite($fp,$hensu."\r\n");
  fclose($fp);
?>
</table>
</body>
</html>