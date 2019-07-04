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
<form action="3-3x.php" method="post">
 delete specified comment number:<br/>
<input type="text" name="deleteno" siza="30" valie=""/></br>
 <input type="submit" name="delete" value="delete">
</form>
<tr>
<td>
<?php
$filename='mission_3-3.txt';
   if(empty($_POST["deleteno"])){     //çÌèúî‘çÜì¸óÕÇµÇƒÇ¢Ç»Ç¢èÍçá                      
       
$a = $_POST["comment"];
$b = $_POST["name"];
$c = date('Y/m/d H:i:s');
$file = file("mission_3-3.txt");
  if (file_exists($filename)){        //?g??e??E?e
     $num= count(file($filename))+1;
     }
     else{
     $num = 1;
     }
     $d = $num."<>".$b."<>".$a."<>".$c."\r\n";   

     if(empty ($_POST["comment"])){
     echo'please write the comment' ;
     }
     elseif(empty($_POST["name"])){
     echo 'please write the name';
     }
     else{
     echo 'thank you for your comment'."<br>";
     $fp = fopen($filename,"a");
     fwrite($fp,$d);
     fclose($fp); }


     $handle = fopen($filename,"r");
     while($line = fgets($handle)){
     $vars = array("$line");
     foreach( $vars as $vars){
     echo implode(" ",explode("<>",$vars))."<br>";     //ìäçeã@î\
     }  //  foreach 
     }//  while
     }//if


    else{                                //çÌèúî‘çÜÇ™ì¸óÕÇ≥ÇÍÇΩèÍçá
  $delete = $_POST["deleteno"];
  $delcon = file("mission_3-3.txt");

  $handle = fopen("mission_3-3.txt","w");
  
  for($j = 0; $j<count($delcon);$j++) {
  $deldate = explode("<>",$delcon[$j]);
   if($deldate[0] !=$delete){
      fwrite($handle,$delcon[$j]);
  } //if
}   //for
  fclose($handle);
 $handle = fopen($filename,"r");
     while($line = fgets($handle)){
     $vars = array("$line");
     foreach( $vars as $vars){
     echo implode(" ",explode("<>",$vars))."<br>";     //Åg??e?@Åh\
     }  //  foreach 
     }

}     //else 

?>
</td>
</tr>
</body>
</html>
