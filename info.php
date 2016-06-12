<?php
	require_once 'instance.php';
	$token = wxlib\Token::getToken();
	$data = array(
		'time'	=> array(
			"value"	=> date("Y年m月d日 H时i分s秒"),
			"color"	=> "#123252",
		)
	);
	var_dump(wxlib\message::sendTemplateMessage($token, 'o0Myhs4E7CJdfXnv4nMx7r4hEWuE', 'wxfeEu7xNhQtMvfUBicI6mwrCQqxPW6g7Foop3k_92k', $data, "http://www.baidu.com/"));
