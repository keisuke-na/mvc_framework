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
	public function index()
	{
		return view();
	}
	public function sayHi()
	{
		return view();
	}
	public function top()
	{
		return view();
	}
	public function db() 
	{
		$users = new DB('users');
		$data = array(
			'name' => 'Ryan',
			'score' => 80,
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