<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

	var $user;
    public function __construct()
    {
    	parent::__construct();
        session_start();
        date_default_timezone_set('PRC');
        
        if(empty($_SESSION['user']))
        {
            header('Refresh:0;url=/');
            exit;
        }
       $this->user=(array)$_SESSION['user'];
      
		$this->load->model('AclPermissionModel');
        $data = $this->AclPermissionModel->showAll($this->user);
		$uri = $this->uri->uri_string();
        // print_r($_SESSION['auth']);die;
        if(!in_array($uri,$_SESSION['auth']))
        {
            header('Refresh:0;url=/');
            exit;
        }
		
    }
    public function index()
    {
        // $ret = $this->acl($this->user);
        $this->load->model('CountModel');
        $data['current'] = $this->CountModel->count();
        $data['nums'] = $this->CountModel->counts();

    	$this->load->view('common/header');
        $this->load->view('admin/show/index',$data);
    	$this->load->view('common/footer');
    }
}
