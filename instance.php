<?php

define("DIR_ROOT", __DIR__);

require_once "wxlib/autoload.php";
require_once "config.php";


spl_autoload_register("wxlib\autoload");
$token =  wxlib\token::getToken();

$token = $token['token'];

var_dump(wxlib\iplist::getiplist($token));
