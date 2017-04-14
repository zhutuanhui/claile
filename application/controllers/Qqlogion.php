<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "/webHome/host8821017/www/Connect2.0/qqConnectAPI.php";
class Qqlogion extends CI_Controller {
	
	public function index()
	{
		ob_start();
		$oauth = new Oauth();
		$oauth->qq_login();
		ob_end_flush();
	}
	public function callback()
	{
		header("Content-Type:text/html;charset=utf-8");
		date_default_timezone_set('PRC');
		ob_start();

		$oauth = new Oauth();
		$accesstoken = $oauth->qq_callback();
		$openid = $oauth->get_openid();
		$qc = new QC($accesstoken,$openid);
		$userinfo = $qc->get_user_info();
		print("<pre>");
		print_r($userinfo);
		print("<pre>");
		$_SESSION['accesstoken'] = $accesstoken;
		$datas = array(
			'uid' => $openid,
			'name'=> $userinfo['nickname'],
			'location' => $userinfo['province'],
			'sex'=>$userinfo['gender'],
			'year'=>$userinfo['year'].$userinfo['city'],
			'img' => $userinfo['figureurl_1'],
			'createtime'=>time(),
			'lasttime' => date("Y-m-d H:i:s",time())
			);
		$this->load->model("FontuserModel");
		if(!$this->FontuserModel->one($datas['uid']))
		{
			$ret = $this->FontuserModel->insert($datas);
			$_SESSION['users'] = $datas;
		}else
		{
			$ret = $this->FontuserModel->update($datas);
			$_SESSION['users'] = $datas;
		}


		if($ret)
		{
			header("location:/");
		}
		

	}
}
