<?php

namespace wxlib;

class group{	
	public static function getUsersByTag($token, $tagid, $next_openid = "") {
		$url = "https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=".$token;
		$data = array(
			'tagid'		=> (int)$tagid,
			'next_openid' 	=> $next_openid,
		);
		$users = filter::filter(curl::post($url, json_encode($data)));
		return $users;
	}

	public static function addTag($token, $name){
		$url = "https://api.weixin.qq.com/cgi-bin/tags/create?access_token=". $token;
		$data = '{"tag":{"name":"'.$name.'"}}';
		$res = filter::filter(curl::post($url, $data));
		return  $res;
	}

	public static function getTags($token){
		$url = "https://api.weixin.qq.com/cgi-bin/tags/get?access_token=".$token ;
		$tags = filter::filter(curl::get($url));
		return $tags;
	}

	public static function renameTag($token, $tagid, $name){
		$url = "https://api.weixin.qq.com/cgi-bin/tags/update?access_token=".$token;
		$data = '{"tag":{"id":'.$tagid.',"name":"'.$name.'"}}';
		$res = filter::filter(curl::post($url, $data));
		return  $res;
	}

	public static function deleteTag($token, $tagid) {
		$url = "https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=".$token;
		$tagid = (int)$tagid;
		$data = '{"tag":{"id":"'.$tagid.'"}}';
		$res = filter::filter(curl::post($url, $data));
		return  $res;
	
	}
}
