<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FontuserModel extends CI_Model
{
        var $id;
	var $uid;
	var $name;
	var $password;
	var $location;
        var $img;
        var $createtime;
	var $lasttime;

        public function __construct()
        {
                parent::__construct();
        }

        protected function setup($row)
        {
                if($row)
                {
                        $i = new FontuserModel();
                        $i->id          = $row->id;
                        $i->name        = $row->name;
                        $i->password    = $row->password;
                        $i->location      = $row->location;
                        $i->img = $row->img;
                        $i->createtime = $row->createtime;
                        $i->lasttime = $row->lasttime;
                        return $i;  
                }
        }

        public function show()
        {
                $this->load->database();
                $row = $this->db->get('sky_user');
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
		$row = $this->db->get_where('sky_user',array('uid'=>$id))->row();
                // echo $this->db->last_query();
		return $this->setup($row);
	}

        public function insert($data)
        {
                $this->load->database();
                $sql = $this->db->insert_string('sky_user',$data);
                $this->db->query($sql);

                return $this->db->insert_id();
               
        }
        public function deluser($id)
        {
                $this->load->database();
                $ret = $this->db->delete('sky_user',array('id'=>$id));
                return $ret;
        }
        public function update($data)
        {
                $this->load->database();
                $this->db->where('uid', $data['uid']);
                $ret =$this->db->update('sky_user', array('name'=>$data['name'],'img'=>$data['img'],'lasttime'=>$data['lasttime']));
                return $ret;
        }
}
