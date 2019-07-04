                                                        
<?php
  $flag = False;
  // connection
        $dsn = 'mysql:dbname=datebase;host=localhost';
 	$user = 'user';
	$password = 'password';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); 
// create table
  $sql = "CREATE TABLE IF NOT EXISTS tbtest35"
  ."("
  ."id INT AUTO_INCREMENT PRIMARY KEY,"
  ."name char(32),"
  ."comment TEXT,"
  ."date TEXT,"
  ."passwd TEXT"
  .");";
  $stmt = $pdo->query($sql);
  // update
  function update($pdo, $id, $name, $comment, $date, $passwd){
    $sql = 'update tbtest35 set name=:name, comment=:comment, date=:date where id=:id and passwd=:passwd';
    if(empty($passwd))
      $sql = 'update tbtest35 set name=:name, comment=:comment, date=:date where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if(!empty($passwd))
      $stmt->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    $stmt->execute();
  }
  // delete
  function delete($pdo, $id, $passwd){
    // delete
    $sql = 'delete from tbtest35 where id=:id and passwd=:passwd';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
  }
  // select and print
  function select_all_print($pdo){
    $sql = 'SELECT * FROM tbtest35';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
      //$rowの中にはテーブルのカラム名が入る
      echo $row['id'].' ';
      echo $row['name'].' ';
      echo $row['comment'].' ';
      echo $row['date'].' ';
      echo $row['passwd'].'<br>';
    }
    echo "<hr>";
  }
  // insert
  function insert($pdo, $name, $comment, $date, $passwd){
    $sql = $pdo->prepare("INSERT INTO tbtest35(name, comment, date, passwd) VALUES(:name,:comment, :date, :passwd)");
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $sql->bindParam(':comment', $comment, PDO::PARAM_STR);
    $sql->bindParam(':date', $date, PDO::PARAM_STR);
    $sql->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    $sql->execute();
  }
  // get date
  function get_date(){
    return date("Y/m/d H:i:s");
  }
  // 編集
  if(!empty($_POST["edit_id"])){
    $stmt = $pdo->prepare("SELECT * FROM tbtest35 where id=:id and passwd=:passwd");
    $stmt->bindParam(':id', $_POST["edit_id"], PDO::PARAM_INT);
    $stmt->bindParam(':passwd', $_POST["edit_passwd"], PDO::PARAM_STR);
    $stmt->execute();
    // 連想配列をreturn
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // 編集するrecordのidが存在すれば取得
    if(!empty($record)){
      $edit_name = $record['name'];
      $edit_comment = $record['comment'];
    }
    else{
      $_POST["edit_id"] = NULL;
      $flag = True;
    }
  }
?>

<html>
<h1>mission_5</h1>
<meta charset="utf-8">
<form action="" method="post">
  <?php if (!empty($_POST["edit_id"])) : ?>
    <input type="hidden" name="id" value="<?php echo $_POST["edit_id"] ?>">
  <?php endif ?>
 name:<br/>
  <input type="text" name="name"  value="<?php if(!empty($edit_name)) echo $edit_name ?>"></br>
 comment:</br>    
<input type="text" name="comment"  value="<?php if(!empty($edit_comment)) echo $edit_comment ?>"></br>
 password:</br>
  <input type="text" name="passwd" ></br>
  <input type="submit" value="送信"><br>
 edit target number:</br>
  <input type="text" name="edit_id" ></br>
 password:</br>
  <input type="text" name="edit_passwd" ></br>
  <input type="submit" value="編集"><br>
 delete specified comment number:<br/>
  <input type="text" name="delete_id" ></br>
 password:</br>
  <input type="text" name="delete_passwd" ></br>
  <input type="submit" value="削除"></br>
</form>
</html>

<?php
  if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    // post idが空でないなら編集
    if (!empty($_POST["id"])){
      // 編集のidがrecordのidと一致する時 UPDATE
      update($pdo, $_POST["id"], $_POST["name"], $_POST["comment"], get_date(), $_POST["edit_passwd"]);
    }
    else{// 新規投稿
      // INSERT ["name"]["comment"]date("Y/m/d H:i:s")["passwd"]
      insert($pdo, $_POST["name"], $_POST["comment"], get_date(), $_POST["passwd"]);
    }
  } // delete
  elseif(!empty($_POST["delete_id"])){
    // idが一致したらそのrecordを削除
    $stmt = delete($pdo, $_POST["delete_id"], $_POST["delete_passwd"]);
    $row_num = $stmt->rowCount();
    if(empty($row_num)){
      $flag = True;
    }
  }
   $sql = 'SELECT * FROM tbtest35';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
  	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].',';
                echo $row['date'];
	echo "<hr>";
	}

  if($flag) echo "please write the right password<br>";
?>