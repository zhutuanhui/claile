<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "/application/models/saetv2.ex.class.php";
class Weibo extends CI_Controller {
	
	public function index()
	{

		$o = new SaeTOAuthV2(WB_KEY,WB_SECRET);

		$url = "http://test.claile.com/weibo/callback";
		$data = $o->getAuthorizeURL($url);
		header("location:".$data);
	}
	public function callback()
	{
        session_start();
		$code = $this->input->get("code");
		$keys['code'] = $code;
		$keys['redirect_uri'] = "http://test.claile.com/weibo/callback";
		$o = new SaeTOAuthV2(WB_KEY,WB_SECRET);
		$ret = $o->getAccessToken($keys);
		$_SESSION['weibo'] = $ret;
		header("location:/weibo/weidetail");

	}
	public function weidetail()
	{
		// header("Content-Type:text/html;charset=utf-8");
        session_start();
		print_r($_SESSION);
		$c = new SaeTClientV2( WB_KEY , WB_SECRET , $_SESSION['weibo']['access_token'] );
		$user_message = $c->show_user_by_id( $_SESSION['weibo']['uid']);//根据ID获取用户等基本信息
		$datas = array(
			'uid' => $user_message['id'],
			'name'=> $user_message['name'],
			'location' => $user_message['location'],
			'img' => $user_message['profile_image_url'],
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
