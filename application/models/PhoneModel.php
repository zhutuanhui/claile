<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PhoneModel extends CI_Model
{
    var $id;
    var $name;
    var $phone;
    var $email;
    var $states;
    var $createtime;
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new PhoneModel();
            $i->id      = $row->id;
            $i->name      = $row->name;
            $i->phone   = $row->phone;
            $i->email   = $row->email;
            $i->states    = $row->states;
            $i->createtime    = $row->createtime;
            return $i;
        }
    }
    
    public function whereShow($page,$per_num)
    {
        $this->load->database();
        if($page)
        {
           $this->db->limit($page,$per_num); 
        }else
        {
            $this->db->limit($per_num); 
        }
        $this->db->order_by('createtime','desc');
        $result = $this->db->get('sky_phone');
         if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $this->setup($row);
            }
             return $data;
        }
       

    }

    public function show()
    {
        $this->load->database();
        $this->db->order_by('createtime','desc');
        
        $result = $this->db->get('sky_phone');
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
    public function one($id)
    {
        $this->load->database();
        $row = $this->db->get_where('sky_phone',array('id'=>$id))->row();
        return $this->setup($row);

    }
    public function count()
    {
        $this->load->database();
        return $this->db->count_all_results('sky_phone');
    }

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_phone',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function dellife($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_phone',array('lifeid'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('lifeid',$id);
        $ret = $this->db->update('sky_phone',$data);
        return $ret;
    }

  
}
