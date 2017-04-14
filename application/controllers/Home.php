<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	  public function __construct()
        {
                parent::__construct();
                session_start();
		date_default_timezone_set('PRC');

        }
	public function index()
	{
			// $ip = $this->get_real_ip();
			// if(!isset($_SESSION['wuip'])){
			// 	$this->load->model('CountModel');
			// 	$ret = $this->CountModel->one($ip);
			// 	if($ret)
			// 	{
			// 		$data = array(
			// 			'lasttime'=>date('Y-m-d'),
			// 			'count'=>$ret->count+1
			// 			);
			// 		$this->CountModel->updata($ip,$data);
			// 	}else
			// 	{
			// 		$data = array(
			// 		'ip' => $ip,
			// 		'lasttime' => date('Y-m-d'),
			// 		'createtime'=>date('Y-m-d H:i:s'),
			// 		'count'=>1
			// 		);
			// 		$this->CountModel->insert($data);
			// 	}
			// 	$_SESSION['wuip'] = $ip;
			// }
			$this->load->model('BookModel');
			$data['ret'] = $this->BookModel->show();
			foreach($data['ret'] as $val)
			{
				 $val->content = $this->utf8Substr($val->content,0,45);
			}
			//推荐
			$data['tuijian'] = $this->BookModel->whereShow(array('tuijian'=>2));
			$data['cx'] = $this->BookModel->whereShow(array('cx'=>2));
			$data['booknew'] = $this->BookModel->bookNew(12);
			$data['thbook'] = $this->BookModel->bqBook(array('bqid'=>6),6);
			$data['dwbook'] = $this->BookModel->bqBook(array('bqid'=>13),6);
			$data['yybook'] = $this->BookModel->bqBook(array('bqid'=>15),6);

			foreach($data['booknew'] as $val)
			{
				 $val->content = $this->utf8Substr($val->content,0,45);
			}
			$data['xinbook'] = $this->BookModel->xinBook(27);
			$data['dianji'] = $this->BookModel->dianJi(12);

			// print('<pre>');
			// print_r($data['thbook']);die;
				// $this->load->view('header',$data);
			$this->load->view('home/index',$data);
			// $this->load->view('footer');
	}
 	private function utf8Substr($str, $from, $len)
	{
	  return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
	            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
	            '$1',$str);
	}
	private function get_real_ip(){ 
		$ip=false; 
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
			$ip=$_SERVER['HTTP_CLIENT_IP']; 
		}
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
			$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']); 
			if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
			for ($i=0; $i < count($ips); $i++){
				if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
					$ip=$ips[$i];
					break;
				}
			}
		}
		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']); 
	}

	public function about()
	{
		$this->load->view('home/index');
	}
	public function favor()
	{
		$this->load->model('BqModel');
		$data['bq'] = $this->BqModel->show();
		// print('<br>');
		// print_r($data['bq']);die;
		$this->load->view('header');
		$this->load->view('home/favor',$data);
		$this->load->view('footer');
	}
	
	
	public function appreciate()
	{	
		$search = $this->input->post('sousuo');
		$page = intval($this->input->get('per_page'));
		if(!$page)
		{
			$page=0;
		}
		
		$this->load->model('ArticleModel');
		$this->load->library('pagination');
		$config['base_url'] = '/home/appreciate/';
		$config['total_rows'] = $this->ArticleModel->count();
		$config['per_page'] = 5;
		$this->pagination->initialize($config);
		
		
		$data['ret'] = $this->ArticleModel->whereSearch($page,$config['per_page'],$search);
		$this->load->view('home/appreciate',$data);
	}
	
	//下载数据到excel表格里
	public function xlsx()
	{
		header("Content-type:application/vnd.ms-excel");

		header( "Content-Disposition:attachment;filename=test.csv");
		print "234";
		print ",";
		print "345";
		print "你好";
		print ",";
		print '是吗'; 
	}
	
	//memcache
	private function testmem()
	{
		$mem=new Memcache;

		$mem->addServer("192.168.1.106", 11211);
	//	$mem->addServer("www.lamp.com", 11221);
	//	$mem->addServer("192.167.1.112", 11211);
		$arr = array(
			'2'=>array('2'=>array(4)),
			'3'=>array('2'),
			'4'=>array('2'),
			'5'=>array('2')
			);
		$arr = object($arr);
		$mem->set("mystr", $arr, MEMCACHE_COMPRESSED, 3600);

		
		// $mem->delete("mystr");
		// $mem->flush();

		$str=$mem->get("mystr");
		print("<pre>");
		print_r($str);

		$mem->getVersion();

		print("<pre>");
		$mem->getStats();
		print("<pre>");
	}
	//遍历memcache
	private function num()
	{
		$host='localhost';
		$port=11211;
		$mem=new Memcache();
		$mem->connect($host,$port);
		$items=$mem->getExtendedStats ('items');
		print_r($items);
		echo "<br>";
		$items=$items["$host:$port"]['items'];

		foreach($items as $key=>$values){
			$number=$key;;
			$str=$mem->getExtendedStats ("cachedump",$number,0);
			$line=$str["$host:$port"];

			if( is_array($line) && count($line)>0){
				foreach($line as $key=>$value){
					echo $key.'=>';
					print_r($mem->get($key));
					echo "\r\n";
				}
			}
		}
	}
	
}
