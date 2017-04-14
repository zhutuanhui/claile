<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MessageModel extends CI_Model
{
    var $id;
    var $phone;
    var $content;
    var $count;
    var $status;
    var $createtime;
    var $sendtime;
    var $check;
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new MessageModel();
            $i->id      = $row->id;
            $i->content      = $row->content;
            $i->count      = $row->count;
            $i->phone   = $row->phone;
            $i->status    = $row->status;
            $i->createtime    = $row->createtime;
            $i->sendtime    = $row->sendtime;
            $i->check    = $row->check;
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
        $result = $this->db->get('sky_message');
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
        
        $result = $this->db->get('sky_message');
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
        $row = $this->db->get_where('sky_message',array('id'=>$id))->row();
        return $this->setup($row);

    }
    public function count()
    {
        $this->load->database();
        return $this->db->count_all_results('sky_message');
    }

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_message',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function dellife($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_message',array('lifeid'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('id',$id);
        $ret = $this->db->update('sky_message',$data);
        return $ret;
    }

  
}
