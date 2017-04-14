<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logion extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function dologion()
	{
		$data['name'] = $this->input->post('name');
		$data['password'] = $this->input->post('password');
		if(empty($data['name']) || empty($data['password']))
		{
			header('Refresh:0;url=/');exit;
		}
		$this->load->model('UserModel');
		$ret = $this->UserModel->checked($data);
		if($ret=='1')
		{	
			if(!empty($_SESSION['user']->name))
			{
				exit(json_encode(1));
			}else
			{
				exit(json_encode(0));
			}
		}else
		{
			exit(json_encode(0));
		}
	}

	public function aci()
	{
		if(!empty($_SESSION['user']->name))
		{
			header('Refresh:0;url=/');
			exit;
		}
		header('Refresh:0;url=/admin/show/index');exit;
	}

}
