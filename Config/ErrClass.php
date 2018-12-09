<?php
class Err {
	public static $e;
	public static function Catch($bool,$message)
	{
		try{
			if(!$bool) throw new Exception($message);
			return true;
		} catch(Exception $e) {
			self::$e = $e->getMessage();
			return false;
		}
	}

	public static function getMessage()
	{
		echo self::$e;
	}
}
?>