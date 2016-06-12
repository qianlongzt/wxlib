<?php 

namespace wxlib;

class filter{
	public static function filter($arr){	
		if(is_string($arr)){
			$arr = json_decode($arr, true);
		}
		if(isset($arr['errcode']) && $arr['errcode'] != 0) {
			return array(
				'code' => false,
				'msg'  => $arr['errmsg'],
				'errcode'=> $arr['errcode'],
			);
		} else {
			return array(
				'code' => true,
				'msg'  => 'ok',
				'data' => $arr,
			);
		}
	}

}
