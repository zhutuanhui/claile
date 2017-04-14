<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RoleModel extends CI_Model
{
	var $id;
	var $name;
	var $description;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
		if($row)
		{
			
			$i = new RoleModel();
			$i->id		= $row->id;
			$i->name	= $row->name;
			$i->description	= $row->description;
			
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
		$result = $this->db->get('acl_pms_role');
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
		$row = $this->db->get_where('acl_pms_role',array('id'=>$roleid))->row();
		return $this->setup($row);

	}

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('acl_pms_role',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function update($id,$data)
    {
    	$this->load->database();
    	$this->db->where('id',$id);
    	$ret = $this->db->update('acl_pms_role',$data);
    	return $ret;
    }
}
