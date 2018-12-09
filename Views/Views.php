<?php
function view($Controller) 
{
	include('./resources/' . $Controller . '.php');
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