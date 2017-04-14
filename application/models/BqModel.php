<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BqModel extends CI_Model
{
	var $id;
	var $bqname;
	var $createtime;
	var $describe;
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new BqModel();
			$i->id		= $row->id;
			$i->bqname	= $row->bqname;
			$i->createtime	= $row->createtime;
			$i->describe	= $row->describe;
			return $i;
		}
	}
	//  protected function rsetup($row){
	// 	if($row)
	// 	{
	// 		$this->load->model('RoleModel');
	// 		$i = new RoleModel();
	// 		$i->id		= $row->id;
	// 		$i->name	= $row->name;
	// 		$i->description	= $row->description;
	// 		$i->role 	= $this->RoleModel->one($row->description);
			
	// 		return $i;
	// 	}
	// }
	public function show()
	{
		$this->load->database();
		$result = $this->db->get('bq');
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
		$row = $this->db->get_where('bq',array('id'=>$roleid))->row();
		return $this->setup($row);

	}

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('bq',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function update($id,$data)
    {
    	$this->load->database();
    	$this->db->where('id',$id);
    	$ret = $this->db->update('bq',$data);
    	return $ret;
    }
    //推荐$where 是数组
    public function whereShow($where)
    {
    	$this->load->database();
    	$this->db->where($where);
    	$result = $this->db->get('bq');
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $this->setup($row);
			}
		}
		return $data;
    }
}
