<?php
class Index {
	public static function show()
	{
		$blogs = new DB('blogs');
		$datas =  $blogs->findAll();
		return view($datas);
	}
}

class Post {
	public static function show()
	{
		$blogs = new DB('blogs');
		$datas = $blogs->findId(get()->id);
		return view($datas);
	}
	public static function create()
	{
		return view();
	}
	public static function store()
	{
		$blogs = new DB('blogs');
		for($i = 8; $i < 11; $i++){
			$data = array(
				'title' => "title{$i}",
				'body' => "body{$i}",
			);
		// 	$blogs->create($data);
		// return redirect(url('/post/10', null));
	}
}
// class Controllers {
// 	public static $Controller;
// 	public static $Request;
// 	public static $Get;
// 	public static $Data;
// 	// public function __construct($Controller,$Request,$get) 
// 	// {	
// 	// 	self::$Get = ($get) ? $get : null;
// 	// 	self::$Controller = $Controller;
// 	// 	self::$Request = $Request;

// 	// }
// 	public function post()
// 	{
// 		echo "this is post";
// 		echo get()->year;
// 		echo get()->month;
// 		echo get()->date;
// 		echo get()->name;
// 	}
// 	public function index()
// 	{
// 		echo "this is index";
// 		// $blogs = new DB('blogs');
// 		// $datas =  $blogs->findAll();
// 		// return view($datas);
// 	}
// 	public function posts()
// 	{
// 		if(!self::$Get) return $this->index();
// 		$blogs = new DB('blogs');
// 		self::$Data =  $blogs->findId(self::$Get);
// 		return view();
// 	}
// 	public function sayHi()
// 	{
// 		return view();
// 	}
// 	public function top()
// 	{
// 		return view();
// 	}
// 	public function db() 
// 	{
		// $blogs = new DB('blogs');
		// for($i = 8; $i < 11; $i++){
		// 	$data = array(
		// 		'title' => "title{$i}",
		// 		'body' => "body{$i}",
		// 	);
		// 	$blogs->create($data);
		// }

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
	// }
// }
?>