<?php

namespace wxlib;

class message{
	public static function sendTemplateMessage($token, $touser, $template_id, $data, $backUrl = "", $topcolor = "#FF0000"){
		$url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$token;
		$template = array();
		$template['touser'] = $touser;
		$template['template_id'] = $template_id;
		$template['topcolor'] = $topcolor;
		$template['url'] = $backUrl;
		$template['data'] = $data;
		$template = json_encode($template);
		return filter::filter(curl::post($url, $template));
	}
}
