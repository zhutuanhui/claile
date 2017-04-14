<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AclModel extends CI_Model
{
	var $id;
	var $rsc_type;
	var $rsc_class;
	var $rsc_function;
	var $rsc_action;
	var $rsc_view;
	var $description;
	var $can_admin;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new AclModel();
			$i->id		= $row->id;
			$i->rsc_type	= $row->rsc_type;
			$i->rsc_class	= $row->rsc_class;
			$i->rsc_function	= $row->rsc_function;
			$i->rsc_action	= $row->rsc_action;
			$i->rsc_view	= $row->rsc_view;
			$i->can_admin	= $row->can_admin;
			$i->description	= $row->description;
			
			return $i;
		}
	}
	


	public function show()
	{
		$this->load->database();
		$result = $this->db->get('acl_resource');
		if($result->num_rows() > 0)
		{
			foreach($result->result() as $row)
			{
				$data[] = $this->setup($row);
			}
		}
		return $data;
	}
	public function one($resourceid)
	{
		$this->load->database();
		$row = $this->db->get_where('acl_resource',array('id'=>$resourceid))->row();
		return $this->setup($row);

	}

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('acl_resource',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function delresource($id)
    {
    	$this->load->database();
    	$ret = $this->db->delete('acl_resource',array('id'=>$id));
    	return $ret;
    }
    public function updata($id,$data)
    {
    	$this->load->database();
    	$this->db->where('id',$id);
    	$ret = $this->db->update('acl_resource',$data);
    	return $ret;
    }

    public function  aclresource($roleid)
    {

    	$ret = $this->groupshow($roleid);
    	if(empty($ret))
    	{
    		return 0;
    	}
    	$this->load->database();
    	$data = array();
    	foreach($ret as $val)
    	{
    		$result = $this->db->get_where('acl_resource',array('id'=>$val->resource_id));
	    	if($result->num_rows()>0)
	    	{
	    		foreach($result->result() as $row)
	    		{
	    			$data[] = $this->setup($row);
	    		}
	    		
	    	}
    	}
    	return $data;
    	
    }

    //group表操作
    public function groupshow($roleid)
    {
    	$this->load->database();
    	$res = $this->db->get_where('acl_pms_group',array('role_id'=>$roleid));

    	$data = array();
    	if($res->num_rows()>0)
    	{
    		foreach($res->result() as $row)
    		{
    			$data[] = $row;
    		}
    		
    	}
    	return $data;
    }
    public function groupadd($resourceid,$roleid)
    {
    	$this->load->database();
    	$retd = $this->db->get_where('acl_pms_group',array('resource_id'=>$resourceid,'role_id'=>$roleid))->row();
    	$ret = array();
    	if(empty($retd))
    	{
    		$sql = $this->db->insert_string('acl_pms_group',array('resource_id'=>$resourceid,'role_id'=>$roleid));
    		$ret = $this->db->query($sql);
    	}
    	return $ret;
    }
    public function delgroup($roleid,$resourceid)
    {
    	$this->load->database();
    	$ret = $this->db->delete('acl_pms_group',array('role_id'=>$roleid,'resource_id'=>$resourceid));
    	return $ret;
    }
}
