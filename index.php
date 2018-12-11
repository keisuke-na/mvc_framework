<?php
/********************************************************
This is Main of routing file.
Tha's why all access are catched by this file.
********************************************************/

/********************************************************
This file is main file of ruting.
If you access "http://~~/ququ/sayHi",Controller of "sayHi" is
excuted by this class. This class is in './Routes/RoutesClass.php';
********************************************************/
require_once('./Routes/RoutesClass.php');

/********************************************************
This is class of error hundling.You can catch error by useing 
ErrHundler::Catch().
 After that you can get error message,if you excute 
 ErrHundler::getErrMessage()
********************************************************/
require_once('./Config/ErrClass.php');

/********************************************************
Class of Controllers is automatically excuted by RoutesClass.
You have to put $url name of method for ControllersClass
of method.
E.G:
"http://~~/ququ/sayHi" -> Controllers::sayHi();
********************************************************/
require_once('./Controllers/ControllersClass.php');

/********************************************************
Class of database.Easy to hundle database.
********************************************************/
require_once('./models/DBClass.php');

/********************************************************
Views file can display template.Template file is in resou-
rces and display data of request.You can display data of re-
quest,when you put "<?= input($property) ?>" on template file.
********************************************************/
require_once('./Views/Views.php');

// e.g. http://000.000.00.00/ => http://000.000.00.00/index
$url = (isset($_GET['url'])) ? $_GET['url'] : 'index';
$Route = new Routes($url);

//database
// define('DB_DATABESE', 'mvc_lessons');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'Framgia@123');
// define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABESE);

// class User {
// 	public function show() {
// 		echo "$this->name ($this->score) ";
// 	}
// }

// try {
// 	$db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/*
	(1) exec(): 結果を返さない、安全なSQL
	(2) query(): 結果を返す、安全、何回も実行されないSQL
	(3) prepare(): 結果を返す、安全対策が必要、複数回実行されるSQL
	*/

	// $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
	// $stmt->execute([':name'=>'fkoji',':score'=>80]);
	// echo "inserted: " . $db->lastInsertId();
	// $name = 'taguchi';
	// $stmt->bindValue(1, $name, PDO::PARAM_STR);
	// $score = 23;
	// // $stmt->bindValue(2, $score, PDO::PARAM_INT);
	// // $stmt->execute();
	// // $score = 89;
	// // $stmt->bindValue(2, $score, PDO::PARAM_INT);
	// // $stmt->execute();
	// $stmt->bindParam(2, $score, PDO::PARAM_INT);
	// $score = 23;
	// $stmt->execute();
	// $score = 40;
	// $stmt->execute();

	// $stmt = $db->query("select * from users");
	// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// foreach ($users as $user) {
	// 	var_dump($user);
	// }
	// echo $stmt->rowCount() . "records found.";

	// $stmt = $db->prepare("select score from users where score > ?");
	// $stmt->execute([3]);
	// $stmt = $db->prepare("select name from users where name like ?");
	// $stmt->execute(['%t%']);
	//
	// $stmt = $db->query("select * from users");
	// $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
	// foreach ($users as $user) {
	// 	$user->show();
	// }
	// echo $stmt->rowCount() . "records found.";

	//update
	// $stmt = $db->prepare("update users set score = :score where name = :name");
	// $stmt->execute([
	// 	':score' => 99,
	// 	':name' => 'taguchi'
	// ]);
	// echo 'row updated' . $stmt->rowCount();

	// //delete
	// $stmt = $db->prepare("delete from users where name = :name");
	// $stmt->execute([
	// 	':name' => 'fkouji'
	// ]);
	// echo 'deleted' . $stmt->rowCount();
	// $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
	// $name = 'keisuke';
	// $stmt->bindValue(1, $name, PDO::PARAM_STR);
	// $score = 100;
	// $stmt->bindValue(2, $score, PDO::PARAM_INT);
	// $stmt->execute();
	// $name = 'taguchi';
	// $score = 50;
	// $stmt->bindValue(1, $name, PDO::PARAM_STR);
	// $stmt->bindValue(2, $score, PDO::PARAM_INT);
	// $stmt->execute();

	// $db->beginTransaction();
	// $db->exec("update users set score = score - 10 where name = 'taguchi'");
	// $db->exec("update users set score = score + 10 where name = 'keisuke'");
	// $db->commit();

	// disconnect
	// $db = null;

// } catch(PDOException $e) {
// 	$db->rollback();
// 	echo $e->getMessage();
// 	exit;
// }


// echo "<br>";
// var_dump(array('str' => 'Hello World!'));

// include('./models/' . $model . '.php');
// $ret = handle($params);
// extract($ret);
// include('./views/' . $model . '.php');

// アクセス権
// - privete : そのクラス内からのみアクセス可能
// - protected: そのクラス内＋親子クラス内からのみアクセス可能
// - public: どこからでもアクセス可能

// static
// class User {
// 	//propaty
// 	protected $name;
// 	public static $count = 0;
// 	//constructor
// 	public function __construct($name) {
// 		$this->name = $name;
// 		self::$count++;
// 	}

// 	//method
// 	final public function sayHi() {
// 		echo "hi, i am $this->name!";
// 	}
// 	public static function getMessage() {
// 		echo "hello from User class!";
// 	}
// }

// class AdminUser extends User {
// 	public function sayHello() {
// 		echo "hello from $this->name";
// 	}
// 	// //override
// 	// public function sayHi() {
// 	// 	echo "[admin]hi, i am $this->name!";
// 	// }
// }
// User::getMessage();

// $tom = new User("Tom");
// $steve = new User("steve");

// echo User::$count; // 2
// // echo $steve->name;
// // $tom->sayHi();
// $steve->sayHello();
// $tom->name;
// $steve->sayHi();
// $steve->sayHello();

// echo $tom->name;

// //例外処理
// function warizan($val1,$val2) {
// 	try{
// 		if($val2 === 0){
// 			throw new Exception('０で割ることはできませんよ');
// 		}
// 		return $val1/$val2;
// 	}catch(Exception $e) {
// 		return $e->getMessage();
// 	}
// }

// echo warizan(6,0); // 
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="hidden" value="this is name" name="name">
	<input type="hidden" value="this is age" name="age">
	<input type="hidden" value="this is gender" name="gender">
	<input type="submit">
</form>
</body>
</html> -->