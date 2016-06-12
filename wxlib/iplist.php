<?php

namespace wxlib;

class Iplist{
	public static function getIpList($token) {
		$url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=$token";
		$iplist = curl::get($url);
		$iplist = filter::filter($iplist);
		if($iplist['code'] === true) {
			return array(
				'code'		=> true,
				'iplist'	=> $iplist['data'],
			);
		} else {
			return array(
				'code' 		=> false,
			);
		}
	}
}
