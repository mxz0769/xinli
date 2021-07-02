<?php
defined('BASEPATH') or exit('No direct script access allowed');
Class Wechat{
	private $appid = "wx3602fbbff435a598";//'wx63a84b2e1f49bdb0';
	private $appsecret = "62dc13b5f67f866a067572998df3d041";//'15663acf8f6b9773f13ac04d4da76f00';

//	https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf0e81c3bee622d60&redirect_uri=http%3A%2F%2Fnba.bluewebgame.com%2Foauth_response.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect
	public function getCode($url){
		$getCodeUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appid."&redirect_uri=".$url."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
		header("Location:".$getCodeUrl);
	}

	public function getAccessToken($code){
		$access_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->appsecret."&code=".$code."&grant_type=authorization_code";
		$data = file_get_contents($access_url);
		return $data;
	}

	public function getUserInfo($access_token,$openid){
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
		$userinfo = file_get_contents($url);
		return $userinfo;
	}
}
