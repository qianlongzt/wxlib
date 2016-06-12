<?php
	require_once 'instance.php';
	$token = wxlib\Token::getToken();
	var_dump(wxlib\group::getUsersByTag($token, 2));
	var_dump(wxlib\user::addTagForUsers($token, 2,'o0Myhs4E7CJdfXnv4nMx7r4hEWuE'));
	var_dump(wxlib\user::getTagsFromUser($token, 'o0Myhs4E7CJdfXnv4nMx7r4hEWuE'));
	var_dump(wxlib\group::getUsersByTag($token, 2));
