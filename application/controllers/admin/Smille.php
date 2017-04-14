<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smille extends CI_Controller {

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
    	$this->load->view('admin/smille/index');
        $this->load->view('common/footer');

    }
    public function dofa()
    {
        date_default_timezone_set('prc');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $author = $this->input->post('author');
        $intro = $this->input->post('intro');
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $uid = $this->user['id'];
        $createtime = date('Y-m-d H:i:s');

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
            $this->load->model('ArticleModel');
            $ret = $this->ArticleModel->insert($title,$content,$ip,$uid,$createtime,$author,$intro,$img);
            if($ret)
            {
                 header('Refresh:0;url=/admin/smille/index');
            }else
            {
                header('Refresh:0;url=/admin/smille/index');
            }
        }else
        {
            echo '图片上传失败';
        }
    }
    public function smillelist()
    {
        $this->load->model("ArticleModel");
        $data = $this->ArticleModel->show();
        $this->load->model('UserModel');
        $user = array();
        foreach($data as $key=>$val)
        {
            $user = $this->UserModel->one($val->uid);
            $data[$key]->name = $user->name;
        }
        $this->load->view('common/header');
        $this->load->view('admin/smille/smillelist',array('ret'=>$data));
        $this->load->view('common/footer');
    }
    public function editsmille()
    {
        $id = $this->input->get('id');
        

    }

   

}
