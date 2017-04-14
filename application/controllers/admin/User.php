<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('UserModel');
        $data['ret'] = $this->UserModel->show();
    	$this->load->view('common/header');
    	$this->load->view('admin/user/index',$data);
        $this->load->view('common/footer');

    }

    public function add()
    {
         $this->load->model('RoleModel');
        $data['ret'] = $this->RoleModel->show();
    	$this->load->view('common/header');
    	$this->load->view('admin/user/add',$data);
        $this->load->view('common/footer');

    }
    public function doadd()
    {
        $data = $this->input->post('args');
        $this->load->model("UserModel");
        $ret['user_id'] = $this->UserModel->insert($data);
        $ret['role_id'] = $data['group'];
        $this->load->model('PermissionModel');
        $dat = $this->PermissionModel->insert($ret);
        if($dat)
        {
            header('Refresh:0;url=/admin/user/index');
        }else
        {
            header('refresh:0;url=/admin/user/add');
        }

    }

    public function groupadd()
    {
       
        $this->load->view('common/header');
        $this->load->view('admin/user/groupadd');
        $this->load->view('common/footer');

    }
    public function dogroupadd()
    {

        $data = $this->input->post('args');
        $this->load->model('RoleModel');
         $ret = $this->RoleModel->insert($data);
        if($ret)
        {
            header('Refresh:0;url=/admin/user/grouplist');
        }else
        {
            header('refresh:0;url=/admin/user/groupadd');
        }
    }

    public function grouplist()
    {
        $this->load->model('RoleModel');
        $data['ret'] = $this->RoleModel->show();
        $this->load->view('common/header');
        $this->load->view('admin/user/grouplist',$data);
        $this->load->view('common/footer');

    }
    public function authorization()
    {
        $roleid = intval($_GET['id']);

        if(!empty($roleid))
        {
            $this->load->model("AclModel");
            $data['ret'] = $this->AclModel->aclresource($roleid);
            $this->load->model("RoleModel");
            $data['name'] = $this->RoleModel->one($roleid);
            $this->load->view('common/header');
            $this->load->view('admin/user/authorization',$data);
            $this->load->view('common/footer');

        }
       
     
        
    }

    public function resourcelist()
    {
        $this->load->model('AclModel');
        $data['ret'] = $this->AclModel->show();
        $this->load->view('common/header');
        $this->load->view('admin/user/permisionlist',$data);
    }

    public function permission()
    {
        $this->load->view('common/header');
        $this->load->view('admin/user/resourceadd');
    }
    public function opresourceadd()
    {
        $data = $this->input->post('args');
        // print("<pre>");
        // print_r($data);
        // print("<pre>");
        $this->load->model("AclModel");
        $res = $this->AclModel->insert($data);
        if(empty($res))
        {
            header('Refresh:0;url=/admin/user/permission');
        }else
        {
            header('Refresh:0;url=/admin/user/resourcelist');
        }
    }
    public function aclresource()
    {
        $roleid = intval($this->input->get('id'));
        $this->load->model('AclModel');
        $data['resourseid'] = $this->AclModel->groupshow($roleid);
        $this->load->model('AclModel');
        $data['ret'] = $this->AclModel->show();

        $this->load->model("RoleModel");
        $data['name'] = $this->RoleModel->one($roleid);

        $this->load->view('common/header');
        $this->load->view('admin/user/aclresource',$data);
        // $this->load->view('common/footer');
    }
    public function doaclresource()
    {
        $ret = $this->input->post('id');
        $roleid = $this->input->post('roleid');

        $this->load->model('AclModel');
        $data = $this->AclModel->groupshow($roleid);
        foreach($data as $row)
        {
            if(!in_array($row->resource_id,$ret))
            {
                $this->AclModel->delgroup($roleid,$row->resource_id);
            }
        }
        foreach($ret as $val)
        {
            $this->AclModel->groupAdd($val,$roleid);
        }
          header('Refresh:0;url=/admin/user/aclresource?id='.$roleid);
    }

}
