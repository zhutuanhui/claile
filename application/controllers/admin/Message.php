<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

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

        $this->load->model("PhoneModel");
        $data['ret'] = $this->PhoneModel->show();
        $this->load->model("MessageModel");
        $page = intval($this->input->get('per_page'));
        if(!$page)
        {
            $page=0;
        }
        $this->load->library('pagination');
        $config['base_url'] = '/admin/message/index/';
        $config['total_rows'] = $this->MessageModel->count();
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $data['messages'] = $this->MessageModel->whereShow($page,$config['per_page']);
        $data['status'] = array('未发送','删除','修改过','已发送');
        $this->load->view("common/header");
        $this->load->view("common/left");
    	$this->load->view("admin/message/index",$data);
    }
    public function send()
    {
        header("Content-Type:text/html;charset=utf-8");
        $arr['content'] = $this->input->post('content');
        $phone1 = $this->input->post('phone1');
        $phone  = $this->input->post('phone');
        $phonearr =array();
        if($phone)
        {
                $phonearr = explode(',',$phone);
        }
        if($phone1)
        {
             $data = array_unique(array_merge($phone1,$phonearr));
        }else
        {
            $data = $phonearr;
        }
        $arr['phone'] = serialize($data);
        $arr['createtime'] = time();
        $arr['count'] = count($data);
        if($arr['phone'] &&$arr['content'])
        {
            $this->load->model("MessageModel");
            $ret = $this->MessageModel->insert($arr);
            if($ret)
            {
                 header('Refresh:0;url=/admin/message/index');
                exit;
            }
        }
        header('Refresh:0;url=/admin/message/index');
        exit;
    }
    private function messagesend($phone,$arr)
    {
        error_reporting(0);

        if($phone && $arr)
        {
             @include "/webHome/host8821017/www/alidayu/TopSdk.php";
            date_default_timezone_set('PRC'); 
            header("Content-Type:text/html;charset=utf-8");
            $c = new TopClient;
            $c->appkey = '23470532';
            $c->secretKey = '2636b5ac62c73c3ac4cc0d69ccf99b1e';
            $req = new AlibabaAliqinFcSmsNumSendRequest;
            $req->setExtend("123456");
            $req->setSmsType("normal");
            $req->setSmsFreeSignName("微笑说");
            $req->setSmsParam($arr);
            $req->setRecNum($phone);
            $req->setSmsTemplateCode("SMS_16751315");
            $resp = $c->execute($req);
            return 1;
        }
        return 0;
    }
    public function check()
    {
        $id = intval($this->input->post('rid'));

        if($id)
        {
            $this->load->model("MessageModel");
            $ret = $this->MessageModel->one($id);
            if($ret)
            {
                //发送短信
               $phone = unserialize($ret->phone);
               if(is_array($phone))
               {
                    $phone = implode(',',$phone);
               }
               $arr = array('content'=>$ret->content,'name'=>'微微笑');
               $rets = $this->messagesend($phone,json_encode($arr));
               if($rets==1)
               {
                    $status = array(
                            'sendtime'=>time(),
                            'status'  => 3,
                            'check'   => 1
                        );
                    $this->MessageModel->updata($id,$status);
                    exit(json_encode(200));
               }
            }
        }
        exit(json_encode(400));
    }
    public function email()
    {
        date_default_timezone_set('PRC');
        $this->load->model("PhoneModel");
        $data['ret'] = $this->PhoneModel->show();
        $this->load->model("EmailModel");
        $page = intval($this->input->get('per_page'));
        if(!$page)
        {
            $page=0;
        }
        $this->load->library('pagination');
        $config['base_url'] = '/admin/message/email/';
        $config['total_rows'] = $this->EmailModel->count();
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $data['email'] = $this->EmailModel->whereShow($page, $config['per_page']);
        $this->load->view("common/header");
        $this->load->view("common/left");
        $this->load->view("admin/message/email",$data);
    }
    public function doemail()
    {
        $arr['contents'] = $this->input->post('contents');
        $emails = $this->input->post('email1');
        $email  = $this->input->post('email');
        $arr['title']  = $this->input->post('title');
        $phonearr =array();
        if($email)
        {
                $phonearr = explode(',',$email);
        }
        if($emails)
        {
          $data = array_unique(array_merge($emails,$phonearr));
        }else
        {
            $data = $phonearr;
        }
        $arr['email'] = serialize($data);
        $arr['createtime'] = time();
        $arr['count'] = count($data);
        if($arr['email'] &&$arr['contents'])
        {
            $this->load->model("EmailModel");
            $ret = $this->EmailModel->insert($arr);
            if($ret)
            {
                 header('Refresh:0;url=/admin/message/email');
                exit;
            }
        }
        header('Refresh:0;url=/admin/message/email');
        exit;
    }
    public function checkemail()
    {
        header("Content-Type:text/html;charset=utf-8");
            date_default_timezone_set('PRC'); 

        $id = intval($this->input->post('rid'));
        if($id)
        {
            $this->load->model("EmailModel");
            $ret = $this->EmailModel->one($id);
            if($ret)
            {
                $email = unserialize($ret->email);
                if(is_array($email))
                {
                    $email = implode(',',$email);
                }
                $status = $this->sendEmail($email,$ret->title,$ret->contents,$ret->attach);
                if($status)
                {
                    $update = array(
                            'status'=>3,
                            'check' =>1,
                            'sendtime'=>time()
                        );
                    $this->EmailModel->updata($id,$update);
                    exit(json_encode('200'));
                }
            }
        }
        exit(json_encode('400'));

    }
    public function sendEmail($toemail,$title,$content,$attach)

    {

        header("Content-Type:text/html;charset=utf-8");
            $this->load->library('Email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.163.com';
            $config['smtp_user'] = 'm18818555014@163.com';
            $config['smtp_pass'] = '1314zhangxueli';
            $config['mailtype'] = 'html';
            $config['validate'] = true;
            $config['priority'] = 1;
            $config['crlf'] = "\r\n";
            $config['smtp_port'] = '25';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);
            $this->email->from('m18818555014@163.com', '朱团辉');
            $this->email->to($toemail);
            $this->email->subject($title);
            $this->email->message($content);
            if($attach)
            {
                $this->email->attach($attach);
            }
            $ret = $this->email->send();
            return $ret;
            // echo $this->email->print_debugger();
         }

}