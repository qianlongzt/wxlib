<?php 

namespace wxlib;

class filter{
	public static function filter($arr){	
		if(isset($arr['errcode']) && $arr['errcode'] != 0) {
			return array(
				'code' => false,
				'msg'  => $arr['errmsg'],
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
