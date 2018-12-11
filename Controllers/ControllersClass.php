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
		$blogs = new DB('blogs');
		$datas =  $blogs->findAll();
		return view($datas);
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
		// $blogs = new DB('blogs');
		// $data = array(
		// 	'title' => 'title3',
		// 	'body' => 'body3',
		// );
		// $blogs->create($data);
		// $data =  $blogs->findAll();
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