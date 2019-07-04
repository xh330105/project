<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8N" />
<title>mission_2-4</title>
</head>
<body>
<table border="1">
<thead>
<tr>
<th>コメント</td></th>
</tr>
</thead>
<tbody>
<tr valign="middle">
<td>
<?php
$file = fopen("mission_2-4.txt","r");
if($file){
while ($line = fgets($file)){
echo $line."<br>";
 }
} 
fclose($file);
$vars = array("$line");
$vars[] = "$hensu";
for($i = 0;$i < count($vars);$i++){
echo $vars[$i];
echo "<br>";
}
if($hensu === "完成！"){
 echo "おめてどう！";
  $filename = "mission_2-4.txt";
  $fp = fopen($filename,"a");
  fwrite($fp,$hensu."\r\n");
  fclose($fp); 
}
elseif(!empty($hensu)){
 echo "「".$_POST["comment"] ."」を受付ました。";
  $filename = "mission_2-4.txt";
  $fp = fopen($filename,"a");
  fwrite($fp,$hensu."\r\n");
  fclose($fp); 
} else
{
echo "コメントを入力してください！";
}
?>
</td>
</tr>
</tbody>
</table>
</body>
</html>