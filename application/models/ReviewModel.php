<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('FontuserModel.php');
class ReviewModel extends CI_Model
{
    var $id;
    var $uid;
    var $articid;
    var $text;
    var $createtime;
    var $status;
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new ReviewModel();
            $i->id      = $row->id;
            $i->uid      = $row->uid;
            $i->articid      = $row->articid;
            $i->text   = $row->text;
            $i->createtime   = $row->createtime;
            $i->status   = $row->status;
            return $i;
        }
    }
        protected function rsetup($row){
        if($row)
        {
            
            $i = new ReviewModel();
            $t = new FontuserModel();
            $i->id      = $row->id;
            $i->uid      = $row->uid;
            $i->articid      = $row->articid;
            $i->text   = $row->text;
            $i->createtime   = $row->createtime;
            $i->status   = $row->status;
            $i->users = $t->one($row->uid);
            return $i;
        }
    }
    
    public function whereShow($id)
    {
        $this->load->database();
        $this->db->order_by('createtime','desc');
        $result = $this->db->get_where('sky_review',array('articid'=>$id,'status'=>0));
         if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $this->rsetup($row);
            }
             return $data;
        }
    }
      public function whereSearch($page,$per,$search="")
    {
        $this->load->database();
        if($page)
        {
           $this->db->limit($page,$per); 
        }else
        {
            $this->db->limit($per); 
        }
        if($search)
        {
            $this->db->where('author',$search);
            $this->db->or_where('title',$search); 
        }
        $this->db->order_by('createtime','desc');
        $result = $this->db->get('sky_review');
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
        $result = $this->db->get_where('sky_review',array('status'=>0));
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
        $row = $this->db->get_where('sky_review',array('id'=>$id,'status'=>0))->row();
        return $this->setup($row);

    }
    public function count()
    {
        $this->load->database();
        return $this->db->count_all_results('sky_review');
    }

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_review',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function delresource($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_review',array('id'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('id',$id);
        $ret = $this->db->update('sky_review',$data);
        return $ret;
    }

  
}
