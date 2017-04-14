<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Life extends CI_Controller {

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
        // if(!in_array($uri[0],$_SESSION['auth']))
        // {
        //     header('Refresh:0;url=/admin/show/index');
        //     exit;
        // }
   
    }
    public function index()
    {
        
    	$this->load->view('common/header');
    	$this->load->view('admin/life/index');
        $this->load->view('common/footer');

    }
    public function dolife()
    {
        date_default_timezone_set('prc');
        $content = $this->input->post('content');
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $uid = $this->user['id'];
        $createtime = date('Y-m-d');
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']     = 10000;
        $config['max_width']        = 10240;
        $config['max_height']       = 16080;

        $this->load->library('upload', $config);
       if ($this->upload->do_upload('img')) {
            # 上传成功，缩略处理
            $res = $this->upload->data(); //获取上传图片信息
            $datas['pig_img'] = $res['file_name'];
            $img = "/uploads/" . $res['file_name'];
           $this->load->model("LifeModel");
           $ret = $this->LifeModel->insert($img,$content,$ip,$uid,$createtime);
            if($ret)
            {
                header('Refresh:0;url=/admin/life/lifelist');
            }else
            {
                header('Refresh:0;url=/admin/life/index');
            }

        } else {
            # 上传失败
            header('Refresh:0;url=/admin/life/index');
        }
    }
    public function lifelist()
    {
        $this->load->model("LifeModel");
        $data = $this->LifeModel->show();
        $this->load->model('UserModel');
        $user = array();
        if($data)
        {
            foreach($data as $key=>$val)
            {
                $user = $this->UserModel->one($val->uid);
                $data[$key]->name = $user->name;
            }
        }
        
        $this->load->view('common/header');
        $this->load->view('admin/life/lifelist',array('ret'=>$data));
        $this->load->view('common/footer');
    }
    public function dellife()
    {
        $lifeid = $this->input->get('id');
        $this->load->model('LifeModel');
        $ret = $this->LifeModel->dellife($lifeid);
        if($ret)
        {
             header('Refresh:0;url=/admin/life/lifelist');
        }
    }
    public function edit()
    {
        $lifeid = $this->input->get('id');
        if(!$lifeid)
        {
            header('Refresh:0;url=/admin/life/lifelist');
        }
        $this->load->model('LifeModel');
        $data = $this->LifeModel->one($lifeid);
        $this->load->view('common/header');
        $this->load->view('admin/life/edit',array('ret'=>$data));
        $this->load->view('common/footer');
    }

    public function doedit()
    {
        $content = $this->input->post('content');
        $img = $this->input->post('imgname');
        $lifeid = $this->input->post('lifeid');
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']     = 10000;
        $config['max_width']        = 10240;
        $config['max_height']       = 16080;

        $this->load->library('upload', $config);
        $this->load->model("LifeModel");
       if ($this->upload->do_upload('img')) {
            # 上传成功，缩略处理
            $res = $this->upload->data(); //获取上传图片信息
            $datas['pig_img'] = $res['file_name'];
            $img = "/uploads/" . $res['file_name'];
           $data = array(
                'img'=>$img,
                'content'=>$content
            );
           $ret = $this->LifeModel->updata($lifeid,$data);
            if($ret)
            {
                header('Refresh:0;url=/admin/life/lifelist');
            }else
            {
                header('Refresh:0;url=/admin/life/index');
            }

        } else {
            # 上传失败
             $data = array(
                'img'=>$img,
                'content'=>$content
            );
           $ret = $this->LifeModel->updata($lifeid,$data);
            if($ret)
            {
                header('Refresh:0;url=/admin/life/lifelist');
            }else
            {
                header('Refresh:0;url=/admin/life/index');
            }
            
        }

    }
   

   

}
