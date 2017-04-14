<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PermissionModel extends CI_Model
{
	var $id;
	var $user_id;
	var $role_id;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new PermissionModel();
			$i->id		= $row->id;
			$i->user_id	= $row->user_id;
			$i->role_id	= $row->role_id;
			
			return $i;
		}
	}
	 protected function rsetup($row){
		if($row)
		{
			$this->load->model('RoleModel');
			$i = new PermissionModel();
			$i->id		= $row->id;
			$i->user_id	= $row->user_id;
			$i->role_id	= $row->role_id;
			$i->role 	= $this->RoleModel->one($row->role_id);
			
			return $i;
		}
	}
	public function showAll($uid)
	{
		$this->load->database();
		$result = $this->db->get_where('acl_permission',array('user_id'=>$uid));
		$data = array();
		if($result->num_rows()>0)
		{
			foreach($result->result() as $row)
			{
				$data = $this->setup($row);
			}
		}
		return $data;
	}
	public function one($uid)
	{
		$this->load->database();
		$row = $this->db->get_where('acl_permission',array('user_id'=>$uid))->row();
		return $this->rsetup($row);
	}

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('acl_permission',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function update($data)
    {
    	$this->load->database();
    	$this->db->where('user_id',$data['userid']);
    	$ret = $this->db->update('acl_permission',array('role_id'=>$data['group']));
    	return $ret;
    }
}
