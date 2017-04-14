<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GroupModel extends CI_Model
{
	var $id;
	var $role_id;
    var $resource_id;
    
    public function __construct()
    {
            parent::__construct();
    }
    public function setup($row)
    {
        if($row)
        {
            
            $i = new GroupModel();
            $i->id      = $row->id;
            $i->role_id = $row->role_id;
            $i->resource_id = $row->resource_id;
            
            return $i;
        }
    }

    //group表操作
    public function groupshow($roleid)
    {
    	$this->load->database();
    	$result = $this->db->get_where('acl_pms_group',array('role_id'=>$roleid));

    	$data = array();
    	if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $this->setup($row);
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
