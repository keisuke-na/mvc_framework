<?php
function view() 
{	
	$datas = (!empty(func_get_args())) ? func_get_arg(0) : null;
	$cntrlerClass = lcfirst(Routes::$className); // make a string's first character lowercase e.g. Post -> post
	$mthdName = Routes::$mthdName;
	$filePath = "./resources/{$cntrlerClass}.{$mthdName}.php";
	Err::Catch(file_exists($filePath),';´･ω-)つ Not found file.');
	include("./resources/{$cntrlerClass}.{$mthdName}.php");
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

function data($property){
	$obj = Controllers::$Data;
	// test for the presence of propaty
	if(isset($obj->$property)){
		return $obj->$property;
	}else{
		return "?";
	}
}
?>