<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smartys extends CI_Controller {
    public function __construct()
        {
                parent::__construct();
        }

    public function index()
    { 
        //$this->load->view('welcome_message');

        $data["title"]="标题";
        $data["num"]="123123";

        $this->Ci_smarty->assign('data','nibu');

        $this->display("test.html"); 
    }
    public function ww()
    {
    	echo '你好';
    }
}