<?php
function view() 
{
	$datas = (!empty(func_get_args())) ? func_get_arg(0) : null;
	include('./resources/' . Controllers::$Controller . '.php');
}

function input($property)
{
	$obj = Controllers::$Request;
	// test for the presence of propaty
	if(isset($obj->$property)){
		return $obj->$property;
	}else{
		return "?";
	}
}
?>