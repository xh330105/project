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




	//bindParamの引数（:nameなど）は4-2でどんな名前のカラムを設定したかで変える必要がある。
	//なお、意図通り入力が出来ているかどうかは4-6にて確認できる。
	$sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$name = 'キツネ2';
	$comment = 'ありがとう2'; //好きな名前、好きな言葉は自分で決めること
	$sql -> execute();
	
?>	