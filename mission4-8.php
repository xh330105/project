<?php
	//4-2以降でも毎回接続は必要。
	//$dsnの式の中にスペースを入れないこと！
	//皆さん各自のデータベース設定について：
	//（データベース名）：ユーザー名からハイフンを取り、末尾に「db」をつける⇒例・「tb-219876」なら：tb219876db
	//（MySQLホスト名）：localhost（固定）
	//（ユーザー名）：(SFTP接続用と同じ)
	//（パスワード）：(SFTP接続用と同じ)

	$dsn = 'mysql:dbname=tb210035db;host=localhost';
	$user = 'tb-210035';
	$password = '8xpWBF7fkB';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));               
	
	/*以下注釈のためコード内に含める必要はありません。
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)とは、データベース操作で発生したエラーを
	警告として表示してくれる設定をするための要素です。
	デフォルトでは、PDOのデータベース操作で発生したエラーは何も表示されません。
	その場合、不具合の原因を見つけるのに時間がかかってしまうので、このオプションはつけておきましょう。*/       //4-1




	//4-1で書いた接続のコードの下に続けて記載する。
	//bindParamの引数（:nameなど）は4-2でどんな名前のカラムを設定したかで変える必要がある。
	$id = 1; //変更する投稿番号
	$name = "kitsune";
	$comment = "arigatou"; //変更したい名前、変更したいコメントは自分で決めること
	$sql = 'update tbtest set name=:name,comment=:comment where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	 //4-7
   
      //select
           	$sql = 'SELECT * FROM tbtest';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
	//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}             //select

?>	