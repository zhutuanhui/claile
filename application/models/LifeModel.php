<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LifeModel extends CI_Model
{
    var $lifeid;
    var $uid;
    var $content;
    var $ip;
    var $createtime;
    var $img;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new LifeModel();
            $i->lifeid      = $row->lifeid;
            $i->uid      = $row->uid;
            $i->content   = $row->content;
            $i->ip    = $row->ip;
            $i->createtime  = $row->createtime;
            $i->img    = $row->img;
            return $i;
        }
    }
    
    public function whereShow()
    {
        $this->load->database();
        $this->db->limit('5');
        $this->db->order_by('createtime','desc');
        $result = $this->db->get('sky_life');
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
        
        $result = $this->db->get('sky_life');
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
        $row = $this->db->get_where('sky_life',array('lifeid'=>$id))->row();
        return $this->setup($row);

    }

    public function insert($img,$content,$ip,$uid,$createtime)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_life',array('img'=>$img,'content'=>$content,'ip'=>$ip,'uid'=>$uid,'createtime'=>$createtime));
        $res = $this->db->query($sql);
        return $res;
    }
    public function dellife($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_life',array('lifeid'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('lifeid',$id);
        $ret = $this->db->update('sky_life',$data);
        return $ret;
    }

  
}
