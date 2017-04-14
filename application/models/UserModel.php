<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model
{
	var $id;
	var $name;
	var $password;
	var $status;
	var $pic;

        public function __construct()
        {
                parent::__construct();
        }

        public function checked($data)
        {
        	$this->load->database();
        	// $this->load->library('session');
                session_start();
        	$row = $this->db->get_where('sky_admin',array('name'=>$data['name'],'password'=>$data['password']))->row();
        	if(!empty($row))
		{
        		$arr =$this->setup($row);
                        $_SESSION['user'] = $arr;
        		// $this->session->set_userdata($arr);
        		return '1';
		}else
		{
			return '0';
		}
        }

        public function get_user($data)
        {
        	$this->load->database();
        	if(is_array($data))
        	{
        		$res = array();
        		foreach($data as $val)
        		{
        			$result = $this->db->get_where('sky_admin',array('id'=>$val));
        			foreach($result->result() as $val)
        			{
        				$res[] = $this->setup($val);
        			}
        		}
        		return $res;
        	}else
        	{
        		$row = $this->db->get_where('sky_admin',array('id'=>$data))->row();
        		return $row;
        	}
        }


        protected function setup($row){
		if($row)
		{
			$i = new UserModel();
			$i->id		= $row->id;
			$i->name	= $row->name;
			$i->password	= $row->password;
			$i->status	= $row->status;
			$i->pic = $row->pic;
			return $i;
		}
	}

        protected function rsetup($row)
        {
                if($row)
                {
                        $this->load->model('PermissionModel');
                        $i = new UserModel();
                        $i->id          = $row->id;
                        $i->name        = $row->name;
                        $i->role        = $this->PermissionModel->one($row->id);
                        $i->password    = $row->password;
                        $i->status      = $row->status;
                        $i->pic = $row->pic;
                        return $i;  
                }
        }

        public function show()
        {
                $this->load->database();
                $row = $this->db->get('sky_admin');
                $data = array();
                foreach($row->result() as $row)
                {
                        $data[] = $this->rsetup($row);
                }
                return $data;
        }

	public function one($id)
	{
		$this->load->database();
		$row = $this->db->get_where('sky_admin',array('id'=>$id))->row();
		return $this->setup($row);
	}

        public function insert($data)
        {
                $this->load->database();
                $sql = $this->db->insert_string('sky_admin',$data);
                $this->db->query($sql);
                return $this->db->insert_id();
               
        }
        public function deluser($id)
        {
                $this->load->database();
                $ret = $this->db->delete('sky_admin',array('id'=>$id));
                return $ret;
        }
        public function update($data)
        {
                $this->load->database();
                $this->db->where('id', $data['userid']);
                $ret =$this->db->update('sky_admin', array('name'=>$data['name'],'password'=>$data['xpassword']));
                return $ret;
        }
}
