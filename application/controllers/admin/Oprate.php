<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oprate extends CI_Controller {

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
    public function deluser()
    {
        $id = $this->input->get('id');
        $this->load->model('UserModel');
        $this->UserModel->deluser($id);
        header('Refresh:0;url=/admin/user/index');
    }
    public function edituser()
    {
        $id = $this->input->get('id');
        $this->load->model('UserModel');
        $data['ret'] = $this->UserModel->one($id);

        $this->load->model('PermissionModel');
        $data['role'] = $this->PermissionModel->one($id);
        $this->load->model('RoleModel');
        $data['rets'] = $this->RoleModel->show();

        $this->load->view('common/header');
        $this->load->view('admin/oprate/edituser',$data);
        $this->load->view('common/footer');
    }
    public function doedituser()
    {
        $data = $this->input->post('args');
        if($data['password'] !== $data['xpassword'])
        {
            header("Refresh:0;url=/admin/oprate/edituser?id=".$data['userid']);
        }
        $this->load->model("UserModel");
        $ret = $this->UserModel->update($data);
        $this->load->model("PermissionModel");
        if($ret)
        {
            $this->PermissionModel->update($data);
        }
        header("Refresh:0;url=/admin/user/index");
        
    }
    public function delrole()
    {
        //禁止删除
    }
    public function editrole()
    {
        $id = $this->input->get('id');
        $this->load->model('RoleModel');
        $data['ret'] = $this->RoleModel->one($id);
        $this->load->view('common/header');
        $this->load->view('admin/oprate/editrole',$data);
        $this->load->view("common/footer");
    }
    public function doeditrole()
    {
        $data = $this->input->post('args');
        $id = $this->input->post('id');
        $this->load->model('RoleModel');
        $ret = $this->RoleModel->update($id,$data);
        if($ret)
        {
            header('Refresh:0;url=/admin/user/grouplist');
        }else
        {
            header('Refresh:0;url=/admin/oprate/editrole?id='.$data['id']);
        }
    }

    public function delresource()
    {
        $id = $this->input->get('id');
        $this->load->model('AclModel');
        $this->AclModel->delresource($id);
        header('Refresh:0;url=/admin/user/resourcelist');
    }
    public function editresource()
    {
        $id = $this->input->get('id');
        $this->load->model('AclModel');
        $data['ret'] = $this->AclModel->one($id);
        $this->load->view('common/header');
        $this->load->view('admin/oprate/editresource',$data);
        $this->load->view('common/footer');
    }
    public function doeditresource()
    {
        $data = $this->input->post("args");
        $id = $this->input->post('id');
        $this->load->model('AclModel');
        $ret = $this->AclModel->updata($id,$data);
        if($ret)
        {
            header('Refresh:0;url=/admin/user/resourcelist');
        }else
        {
            header('Refresh:0;url=/admin/user/editresource?id='.$id);
        }
    }

}
