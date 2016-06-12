<?php

namespace wxlib;

class Curl{
	public static function get($url){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$html =  curl_exec($curl);
		curl_close($curl);
		return $html;
	}

	public static function post($url, $data){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
		$html = curl_exec($curl);
		curl_close($curl);
		return $html;
	}
}
