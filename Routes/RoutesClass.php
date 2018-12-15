<?php
class Routes{
	public static $urlTemplt;
	public static $url;
	public static $get;
	public static $post;
	public static $className;
	public static $mthdName;
	public static function route($urlTemplt,$adrss)
	{
		// e.g. 'post/{year}/{month}/{date}/{name}'
		self::$urlTemplt = $urlTemplt;
		// e.g. http://000.000.00.00/ => http://000.000.00.00/index
		self::$url = (isset($_GET['url'])) ? $_GET['url'] : 'index';
		// if there is '/' on last of sentence, it is deleted
		self::$url = (preg_match("/[.*\/]$/",self::$url)) ? preg_replace("/[.*\/]$/","",self::$url) : self::$url;

		if(self::verifyUrl(self::$urlTemplt,self::$url)){
			list($cntrlerClass, $mthd) = self::gCntrler($adrss); // 'Index@show' -> $cntrlerClass => Index, $mthd => show;
			// use this data on view() to generate name of template file. e.g. posts.show.php
			self::$className = $cntrlerClass;
			self::$mthdName = $mthd;

			Err::Catch(class_exists($cntrlerClass),'not found class＼(^o^)／');
			Err::Catch(method_exists($cntrlerClass,$mthd),'not found method＼(^o^)／');
			self::get(); // make a object of get's data to get it. e.g. get()->month
			self::post(); // make a object of post's data to get it. e.g. post()~>name
			$cntrlerClass::$mthd(); //e.g excute Index::show();
			exit;
		}else{
			return;
		}
	}
	public static function verifyUrl($urlTemplt,$url)
	{
		// e.g. 'post/{year}/{month}/{date}/{name}'
		$urlTemplt = explode('/', $urlTemplt);
		$templtCnt = count($urlTemplt); // 5
		
		//e.g. 'post/2018/12/3/keven'
		$url = explode('/', $url);
		$urlCnt = count($url); // 5

		if( $urlCnt != $templtCnt ) {
			return false; // 5 = 5 true
		}

		//e.g. 'post/{year}/{month}/{date}/{name}'
		$rets = preg_grep("/[^{.*}]$/",$urlTemplt); // post
		$retsCnt = count($rets); // 1

		//e.g. $urlTemplt[0] == $rests[0] -> post == post -> true
		for($i=0; $i < $retsCnt; $i++){
			if($url[$i] != $rets[$i]) return false;
		}

		$params = preg_grep("/^{.*}$/",$urlTemplt); // {year},{month},{date},{name}
		foreach($params as $prm => $val){
			if(!preg_match("/^[0-9]*$/", $url[$prm])) return false;
		}
		return true;
	}
	// set data of get to self::$get
	public static function get()
	{	
		// e.g. self::$urlTemplt => 'post/{year}/{month}/{date}/{name}'
		// e.g. self::$url => 'post/2018/12/3/keven'
		$urlTemplt = explode('/', self::$urlTemplt); // post,{year},{month},{date},{name}
		$url = explode('/', self::$url); // post,2018,12,3,keven

		$rets = preg_grep("/^{.*}$/",$urlTemplt); // {year},{month},{date},{name}
		$rets = str_replace(array('{','}'),"",$rets); // year,month,date,name
		foreach($rets as $index => $val){
			$get[$val] = $url[$index]; // $get = ('year' => 2018, 'month' => 12, 'date' => 3, 'name' => 'keven');
		}
		self::$get = (isset($get)) ? (object)$get : false;
	}
	public static function post()
	{
		self::$post = (isset($_POST)) ? (object)$_POST : false;
		return self::$post;
	}
	// 'Index@show' -> $cntrler => Index, $mthd => show;
	public static function gCntrler($adrss) 
	{
		$tmp = explode('@', $adrss);
		$cntrlerClass = $tmp[0];
		$mthd = $tmp[1];
		return array($cntrlerClass,$mthd);
	}
}

function get() { return Routes::$get; }
function g($property){
	return (isset(Routes::$get->$property)) ? Routes::$get->$property : '<br>g(*´･ω･`)what?';
}
function post(){ return Routes::$post; }
function p($property){
	return (isset(Routes::$post->$property)) ? Routes::$post->$property : '<br>p(*´･ω･`)what?';
}

?>