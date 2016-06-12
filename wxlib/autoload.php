<?php
namespace wxlib;
function autoload($class){
	$class = str_replace("\\", "/", $class);
	$class = DIR_ROOT. "/" . $class.".php";
	require_once strtolower($class);
}
