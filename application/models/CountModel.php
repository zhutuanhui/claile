<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CountModel extends CI_Model
{
	var $id;
	var $ip;
	var $createtime;
	var $lasttime;
	var $count;
	
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new CountModel();
			$i->id		= $row->id;
			$i->ip	= $row->ip;
			$i->createtime	= $row->createtime;
			$i->lasttime	= $row->lasttime;
			$i->count	= $row->count;
			return $i;
		}
	}
	


	public function show()
	{
		$this->load->database();
		$result = $this->db->get('counts');
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $this->setup($row);
			}
		}
		return $data;
	}
	public function one($ip)
	{
		$this->load->database();
		$row = $this->db->get_where('counts',array('ip'=>$ip))->row();
		return $this->setup($row);
	}
    public function count()
    {
        $this->load->database();
        $this->db->where('lasttime',date('Y-m-d'));
       return $this->db->count_all_results('counts');
        // echo $this->db->last_query();
    }
    public function counts()
    {
        $this->load->database();
        $this->db->select('sum(count) as num');
        $row = $this->db->get_where('counts')->row();
        return $row;
        // echo $this->db->last_query();
    }

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('counts',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function delresource($id)
    {
    	$this->load->database();
    	$ret = $this->db->delete('counts',array('id'=>$id));
    	return $ret;
    }
    public function updata($id,$data)
    {
    	$this->load->database();
    	$this->db->where('ip',$id);
    	$ret = $this->db->update('counts',$data);
    	return $ret;
    }
}
