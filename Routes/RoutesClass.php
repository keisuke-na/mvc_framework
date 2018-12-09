<?php
class Routes {
	private $params;
	private $Controller;
	private $Request;
	public function __construct($url) 
	{	
		// e.g http://~~/sayHi -> http://~~/index.php?url=/sayHi/
		// explode "/sayHi/" to 'sayHi' as Controller.
		$this->params = explode('/', $url);
		$this->Controller = array_shift($this->params);

		// test for the presence of method
		if($this->methodExists($this->Controller)){
			$fn = $this->Controller;
			$this->exRequest($_POST);
			$Controllers = new Controllers($this->Controller,$this->Request);
			$Controllers->$fn(); //e.g excute Controller::sayHi();
		}else{
			Err::getMessage();
		}
	}
	// method_exists()
	public function methodExists($Controller)
	{
		if(Err::Catch(method_exists('Controllers',$Controller),'not fond')){
			return true;
		}else{
			return false;
		}
	}
	// extract data of receiving by post
	public function exRequest($Request)
	{
		if(isset($Request)){
			$this->Request = (object)$Request;
		}else{
			$this->Request = null;
		}
	}
}
?>