<?php
class Controllers {
	public static $Controller;
	public static $Request;
	public static $data;
	public function __construct($Controller,$Request) 
	{
		self::$Controller = $Controller;
		self::$Request = $Request;

	}
	public function sayHi()
	{
		return view(self::$Controller);
	}
	public function top()
	{
		return view(self::$Controller);
	}
	public function db() 
	{
		$users = new DB('users');
		$data = array(
			'name' => 'Alice',
			'score' => 50,
		);
		$users->create($data);
		// $data =  $users->findAll();
		// var_dump($data);
		// var_dump($data);
		// $data =  $users->findId('16');
		// $data->delete();
		// $data->name = "fkouji";
		// $data->save();
		// var_dump($data);
		// $data->where(['name' => 'keisuke']);
		// $data->save();
		// $users->create();
		// $users->where();
		// $users->where();
		// $users->getWhere();
	}
}
?>