<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission_3-5</title>
</head>
<body>
<form action="" method="post">
 name:<br/>
	<input type="text" name="name" size="30" value=""/></br>
 comment:</br>
<input type="text" name="comment" size="30" value=""/></br>
<br/>
 password:</br>
<input type="text" name="password" size="30" value=""/></br>

<input type="submit" name="toukou" value="submit"/>
</form>
<form action="" method="post">
 delete specified comment number:<br/>
<input type="text" name="deleteno" size="30" value=""/></br>
 password:</br>
<input type="text" name="password" size="30" value=""/></br>
 <input type="submit" name="delete" value="delete">
</form>
 edit target number:<br.>
  <form method="POST" action="">
    <input type="text" name="editno" size="4"></br>
     <input type="submit" name="edit" value="edit"> 

  </form>

</body>
</html>

<?php
$filename='mission_3-5.txt';


   if(isset($_POST["toukou"])){                        
       
$a = $_POST["comment"];
$b = $_POST["name"];
$c = date('Y/m/d H:i:s');
$e = $_POST["password"];
$file = file("mission_3-5.txt");
  if (file_exists($filename)){        
     $num= count(file($filename))+1;
     }
     else{
     $num = 1;
     }                                       
     $d = "$num<>$b<>$a<>$c<>$e<>\r\n";   

     if(empty ($_POST["comment"])&&empty($_POST["name"])&&empty($_POST["password"])){
     echo'please write the name  comment and password' ;
     }
     if(!empty ($_POST["comment"])&&!empty($_POST["name"])&&!empty($_POST["password"])){
     echo 'thank you for your comment'."<br>";
     $fp = fopen($filename,"a");
     fwrite($fp,$d);
     fclose($fp); 
     }//if
      }

   if(isset($_POST["delete"])){                                //
  $delete = $_POST["deleteno"];
  $delcon = file("mission_3-5.txt");
 for($m = 0;$m<count($delcon);$m++){
  $delcon_keys=explode("<>",$delcon[$m]);
    }
  if($delcon_keys[4]==$_POST["password"]){
  $handle = fopen("mission_3-5.txt","w");
  
  for($j = 0; $j<count($delcon);$j++) {
  $deldate = explode("<>",$delcon[$j]);
   if($deldate[0] !=$delete){
   fwrite($handle,$delcon[$j]);
                 }  //if  
     }        //for
  fclose($handle);
  }//if
  else {
         echo "please write the right password" ;
          }
}     //else 
?>
<?php     
   if(isset($_POST["edit"])){
    if(!empty($_POST["editno"])){  
   $bno = $_POST["editno"];
   $editcon = file("mission_3-5.txt",FILE_IGNORE_NEW_LINES);
   for($k = 0;$k<count($editcon);$k++){
    $editdate = explode("<>",$editcon[$k]);
     if($editdate[0] === $bno){
       echo '<form method=POST action="">';
       echo "name<input type='text' name='name' size='30' value='".$editdate[1]."'><br>";
       echo "comment<input type='text' name='comment' size='30' value='".$editdate[2]."'><br>";
       echo "password:</br>";
       echo"<input type='text' name='password' size='30' value=''/></br>"; 

       echo "<input type='submit' name='uwagaki' value='上書き保存'><input type='hidden' name='bno' value='$bno'>";
                echo "</form>";
             break;
      } //if
     }      //for
   }            //if
  }        //if
     if (isset($_POST["uwagaki"])){
      $editcon = file("mission_3-5.txt",FILE_IGNORE_NEW_LINES);

            for($n = 0;$n<count($editcon);$n++){
    $editdate_keys = explode("<>",$editcon[$n]);
     }//for
   if($editdate_keys[4]=$_POST["password"]){

    $log = file("mission_3-5.txt");
    for ($i = 0; $i < count($log); $i++) {
        $line2 = explode("<>", $log[$i]);
        $bno = $_POST["bno"];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $c = date('Y/m/d H:i:s');
        $e = $_POST["password"];
              if ($line2[0] == $bno) { 
           $newline = "$bno<>$name<>$comment<>$c<>$e<>\n";
            array_splice($log,$i,1,"$newline");
        }     //if
    }             //for

    $log2 = fopen("mission_3-5.txt", "w");
    flock($log2, LOCK_EX);
    foreach($log as $value) {
        fputs($log2, $value);
    }               //foreach
    flock($log2, LOCK_UN);
    fclose($log2);
   }   //if
  else{
    echo "please write the right password";
      }//else
    }           //if
 
?>
<?php
     $filename="mission_3-5.txt";
     $text_echo = file($filename);
     foreach((array)$text_echo as $text_echo){
    $keys=explode("<>",$text_echo);
    $keys_num=count($keys);
    foreach($keys as $keys=>$val_export){
    if($keys !==$keys_num-2){
   echo $val_export." ";
   } 
    }
                    echo"<br>";
    }       
   

?>