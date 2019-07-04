<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission_3-4</title>
</head>
<body>
<form action="" method="post">
 name:<br/>
	<input type="text" name="name" size="30" value=""/></br>
 comment:</br>
<input type="text" name="comment" size="30" value=""/></br>
<br/>
<input type="submit" name="toukou" value="submit"/>
</form>
<form action="" method="post">
 delete specified comment number:<br/>
<input type="text" name="deleteno" size="30" value=""/></br>
 <input type="submit" name="delete" value="delete">
</form>
 edit target number:<br.>

  <form method="POST" action="">
    <input type="text" name="editno" size="4"><input type="submit" name="edit" value="edit">
  </form>

</body>
</html>

<?php
$filename='mission_3-4.txt';


   if(empty($_POST["deleteno"])){                        
       
$a = $_POST["comment"];
$b = $_POST["name"];
$c = date('Y/m/d H:i:s');
$file = file("mission_3-4.txt");
  if (file_exists($filename)){        //?g??e??E?e
     $num= count(file($filename))+1;
     }
     else{
     $num = 1;
     }
     $d = $num."<>".$b."<>".$a."<>".$c."\r\n";   

     if(empty ($_POST["comment"])&&empty($_POST["name"])){
     echo'please write the name or comment' ;
     }
     if(isset($_POST["toukou"])){
     echo 'thank you for your comment'."<br>";
     $fp = fopen($filename,"a");
     fwrite($fp,$d);
     fclose($fp); 
     }//if
      }

    else{                                //???崋??椡???応?
  $delete = $_POST["deleteno"];
  $delcon = file("mission_3-4.txt");

  $handle = fopen("mission_3-4.txt","w");
  
  for($j = 0; $j<count($delcon);$j++) {
  $deldate = explode("<>",$delcon[$j]);
   if($deldate[0] !=$delete){
   fwrite($handle,$delcon[$j]);
  }  //if
}   //for
  fclose($handle);
}     //else 
     
   if(isset($_POST["edit"])){
    if(!empty($_POST["editno"])){  
   $bno = $_POST["editno"];
   $editcon = file("mission_3-4.txt",FILE_IGNORE_NEW_LINES);
   for($k = 0;$k<count($editcon);$k++){
    $editdate = explode("<>",$editcon[$k]);
     if($editdate[0] === $bno){
       echo '<form method=POST action="">';
       echo "name<input type='text' name='name' size='30' value='".$editdate[1]."'><br>";
       echo "comment<input type='text' name='comment' size='30' value='".$editdate[2]."'><br>";
       echo "<input type='submit' name='uwagaki' value='上書き保存'><input type='hidden' name='bno' value='$bno'>";
                echo "</form>";
             break;
     } //if
    }      //for
   }            //if
  }        //if
     if (isset($_POST["uwagaki"])){
  
    $log = file("mission_3-4.txt");
    for ($i = 0; $i < count($log); $i++) {
        $line2 = explode("<>", $log[$i]);
        $bno = $_POST["bno"];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $c = date('Y/m/d H:i:s');
        if ($line2[0] == $bno) { 
           $newline = "$bno<>$name<>$comment<>$c<>\n";
            array_splice($log,$i,1,"$newline");
        }
    }

    $log2 = fopen("mission_3-4.txt", "w");
    flock($log2, LOCK_EX);
    foreach($log as $value) {
        fputs($log2, $value);
    }
    flock($log2, LOCK_UN);
    fclose($log2);
   }
     $handle = fopen($filename,"r");
     while($line = fgets($handle)){
     $vars = array("$line");
     foreach( $vars as $vars){
     echo implode(" ",explode("<>",$vars))."<br>";     //????
     }  //  foreach 
     }//  while

?>