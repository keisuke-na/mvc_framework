<?php
function redirect($url)
{
	if(!$url) return;
	header("Location:" . $url);
}
//e.g. url('public/css','styles.css');
function url($dir,$fname)
{
	$host = $_SERVER['HTTP_HOST'];
	$dirPath = getcwd(); // e.g. /var/www/html/mvc_framework
	$cwd = explode("/",$dirPath); // e.g. "", var, www, html, mvc_framework
	$cudir =  $cwd[count($cwd) - 1]; // // e.g. $cudir = mvc_framework
	$fulPath = "http://{$host}/{$cudir}"; // http://192.168.33.10/mvc_framework
	$fulPath .= $dir;
	$fulPath .= ($fname) ? "/{$fname}" : null;
	return $fulPath;
}
?>