<?php

namespace wxlib;

class User{

	public static function getUsers($token, $next_openid = ""){
		$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$token;
		if($next_openid !== "") {
			$url .= "&next_openid=".$next_openid;
		}
		$users = filter::filter(curl::get($url));
		return $users;
	}
	public static function getUserInfo($token, $openid) {
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$token}&openid={$openid}&lang=zh_CN";
		$user = filter::filter(curl::get($url));
		return $user;
	}
	public static function addTagForUsers($token, $tagid, $openid_list){
		if(is_string($openid_list)){
			$openid_list = array($openid_list);
		}
		$url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=".$token;
		$data = array(
			'openid_list'	=> $openid_list,
			'tagid'		=> $tagid,
		);
		$res = filter::filter(curl::post($url, json_encode($data)));
		return $res;
	}

	public static function deleteTagForUsers($token, $tagid, $openid_list){
		if(is_string($openid_list)){
			$openid_list = array($openid_list);
		}
		$url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=".$token;
		$data = array(
			'openid_list'	=> $openid_list,
			'tagid'		=> $tagid,
		);
		$res = filter::filter(curl::post($url, json_encode($data)));
		return $res;
	}
	public static function getTagsFromUser($token, $openid){
		$data = '{"openid":"'.$openid.'"}';
		$url = "https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token=".$token;

		$res  = filter::filter(curl::post($url, $data));
		return $res;
	}
}
