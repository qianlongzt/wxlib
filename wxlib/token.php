<?php

namespace wxlib;

class Token{
	public static function getToken(){
		
		return self::_getTokenFromWeb();
	}
	private static function _checkToken($token){
		
	}

	private static function _getTokenFromWeb(){	
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
		$token = \wxlib\Curl::get($url);
		$token = json_decode($token, true);
		$token = filter::filter($token);
		if($token['code'] === true ) {
			return array(
				'code' 		=> true,
				'token'		=> $token['data']['access_token'],
				'expires_at'	=> time() + $token['data']['expires_in'],
			);
		} else {
			return array(
				'code'		=> false,
				'msg' 		=> $token['msg'],
			);
		}
	}
}
