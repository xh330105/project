<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8N" />
<title>mission_2-1</title>
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
  $hensu = $_POST["comment"];
if($hensu === "完成！"){
 echo "おめてどう！";
  $filename = "mission_2-2.txt";
  $fp = fopen($filename,"w");
  fwrite($fp,$hensu);
  fclose($fp); 
}
elseif(!empty($hensu)){
 echo "「".$_POST["comment"] ."」を受付ました。";
  $filename = "mission_2-2.txt";
  $fp = fopen($filename,"w");
  fwrite($fp,$hensu);
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