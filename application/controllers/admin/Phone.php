<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phone extends CI_Controller {

	var $name;
    public function __construct()
    {
    	parent::__construct();
        session_start();
        if(empty($_SESSION['user']))
        {
            header('Refresh:0;url=/');
            exit;
        }
        $this->user=(array)$_SESSION['user'];
        $uri = $this->uri->uri_string();
        $uri = explode('?',$uri);
        if(!in_array($uri[0],$_SESSION['auth']))
        {
            header('Refresh:0;url=/admin/show/index');
            exit;
        }
   
    }
    
    public function index()
    {
        date_default_timezone_set('PRC');
        $data['qiehuan'] = 'list';
        $this->load->model("PhoneModel");
        $page = intval($this->input->get('per_page'));
        if(!$page)
        {
            $page=0;
        }
        $this->load->library('pagination');
        $config['base_url'] = '/admin/phone/index/';
        $config['total_rows'] = $this->PhoneModel->count();
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $data['ret'] = $this->PhoneModel->whereShow($page,$config['per_page']);
        $this->load->view("common/header");
        $this->load->view("common/left");
    	$this->load->view("admin/phone/index",$data);
    }
    public function phoneadd()
    {
        if($data = $this->input->post('args'))
        {
            $data['createtime'] =time();
            $this->load->model("PhoneModel");
           $ret = $this->PhoneModel->insert($data);
           if($ret)
           {
                header('Refresh:0;url=/admin/phone/index');
                die;
           }
        }

    }

}