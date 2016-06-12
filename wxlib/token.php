<?php

namespace wxlib;

class Token{
	public static function getToken(){
		$token_file = DIR_ROOT ."/access_token";  
		if(file_exists($token_file)){
			$tokenArr = json_decode(file_get_contents($token_file), true);
			if($tokenArr['expire_at'] <= time() - 10 ){
				return $tokenArr['token'];
			}else {
				$tokenArr = self::_getTokenFromWeb();
				if($tokenArr['code'] === true){
					file_put_contents($token_file, json_encode($tokenArr));
					return $tokenArr['token'];
				} else {
					return false;
				}
			}
		} else  {	
			$tokenArr = self::_getTokenFromWeb();
			if($tokenArr['code'] === true){
				file_put_contents($token_file, json_encode($tokenArr));
				return $tokenArr['token'];
			} else {
				return false;
			}
		}
	}
	private static function _checkToken($token){
		$iplist = Iplist::getIplist($token);
		return $iplist['code'];	
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
				'expire_at'	=> time() + $token['data']['expires_in'],
			);
		} else {
			return array(
				'code'		=> false,
				'msg' 		=> $token['msg'],
			);
		}
	}
}
