<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookModel extends CI_Model
{
	var $id;
	var $bookname;
	var $bqid;
	var $imgid;
	var $author;
	var $content;
	var $img;
	var $time;
	var $isfree;
	var $status;
	var $week;
	var $tuijian;
	var $cx;
	var $view_num;
	var $linkurl;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new BookModel();
			$i->id		= $row->id;
			$i->bookname	= $row->bookname;
			$i->bqid	= $row->bqid;
			$i->imgid	= $row->imgid;
			$i->author	= $row->author;
			$i->content	= $row->content;
			$i->img	= $row->img;
			$i->time	= $row->time;
			$i->isfree	= $row->isfree;
			$i->status	= $row->status;
			$i->week	= $row->week;
			$i->tuijian	= $row->tuijian;
			$i->cx	= $row->cx;
			$i->view_num	= $row->view_num;
			$i->linkurl	= $row->linkurl;
			return $i;
		}
	}
	 protected function rsetup($row){
		if($row)
		{
			
			$i = new BookModel();
			$i->id		= $row->id;
			$i->bookname	= $row->bookname;
			$i->bqname	= $row->bqname;  
			$i->content	= $row->content;
			$i->img	= $row->img;
			$i->author = $row->author;
			return $i;
		}
	}
	public function show()
	{
		$this->load->database();
		$result = $this->db->get('tonghua_book');
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $this->setup($row);
			}
		}
		return $data;
	}

	public function one($roleid)
	{
		$this->load->database();
		$row = $this->db->get_where('tonghua_book',array('id'=>$roleid))->row();
		return $this->setup($row);

	}

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('tonghua_book',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function update($id,$data)
    {
    	$this->load->database();
    	$this->db->where('id',$id);
    	$ret = $this->db->update('tonghua_book',$data);
    	return $ret;
    }
    //推荐$where 是数组
    public function whereShow($where)
    {
    	$this->load->database();
    	$this->db->where($where);
    	$result = $this->db->get('tonghua_book');
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $this->setup($row);
			}
		}
		return $data;
    }
    //最新更新
    public function bookNew($num='')
    {
    	$this->load->database();
    	$this->db->select('tonghua_book.img,tonghua_book.author,tonghua_book.content,tonghua_book.bookname,tonghua_book.id,bq.bqname');
		$this->db->from('tonghua_book');
		$this->db->join('bq', 'tonghua_book.bqid = bq.id');
    	$this->db->order_by('tonghua_book.time','desc');
    	$this->db->limit($num);
		$result = $this->db->get();
		// echo $this->db->last_query();
         if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $this->rsetup($row);
            }
             return $data;
        }
    }
    //最近更新
    public function xinBook($num=''){
    	$this->load->database();
    	$this->db->select('tonghua_bookfb.*,tonghua_article.id as articleid');
		$this->db->from('tonghua_bookfb');
		$this->db->join('tonghua_article','tonghua_article.bookid = tonghua_bookfb.bookid and shaoer_tonghua_article.orderid = shaoer_tonghua_bookfb.orderid','left');
    	$this->db->order_by('tonghua_bookfb.addtime','desc');
    	$this->db->limit($num);
		$result = $this->db->get();
		// echo $this->db->last_query();die;
         if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $row;
            }
             return $data;
        }
    }
    //点击榜
    public function dianJi($num='')
    {
    	$this->load->database();
    	$this->db->select('img,bookname,author,id');
		$this->db->from('tonghua_book');
    	$this->db->order_by('view_num','desc');
    	$this->db->limit($num);
		$result = $this->db->get();
		if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $row;
            }
             return $data;
        }
    }
    //根据便签来查询书
    public function bqBook($where,$num='')
    {
    	$this->load->database();
    	$this->db->select('img,bookname,id');
    	$this->db->where($where);
		$this->db->from('tonghua_book');
    	$this->db->order_by('time','desc');
    	$this->db->limit($num);
		$result = $this->db->get();
		if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $row;
            }
             return $data;
        }
    }
}
