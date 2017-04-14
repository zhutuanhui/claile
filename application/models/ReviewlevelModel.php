<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('FontuserModel.php');
class ReviewlevelModel extends CI_Model
{
    var $lid;
    var $uid;
    var $rid;
    var $rname;
    var $contents;
    var $createtime;
    var $status;
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new ReviewlevelModel();
            $i->lid      = $row->lid;
            $i->uid      = $row->uid;
            $i->rid      = $row->rid;
            $i->rname      = $row->rname;
            $i->contents   = $row->contents;
            $i->createtime   = $row->createtime;
            $i->status   = $row->status;
            return $i;
        }
    }
        protected function rsetup($row){
        if($row)
        {
            
            $i = new ReviewlevelModel();
            $t = new FontuserModel();
            $i->lid      = $row->lid;
            $i->uid      = $row->uid;
            $i->rid      = $row->rid;
            $i->rname      = $row->rname;
            $i->contents   = $row->contents;
            $i->createtime   = $row->createtime;
            $i->status   = $row->status;
            $i->users = $t->one($row->uid);
            return $i;
        }
    }
    
    public function whereShow($id)
    {
        $this->load->database();
        $this->db->order_by('createtime','asc');
        $result = $this->db->get_where('sky_reviewlevel',array('rid'=>$id,'status'=>0));
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
        $result = $this->db->get('sky_reviewlevel');
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
        $result = $this->db->get_where('sky_reviewlevel',array('status'=>0));
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
        $row = $this->db->get_where('sky_reviewlevel',array('id'=>$id,'status'=>0))->row();
        return $this->setup($row);

    }
    public function count()
    {
        $this->load->database();
        return $this->db->count_all_results('sky_reviewlevel');
    }

    public function insert($data)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_reviewlevel',$data);
        $res = $this->db->query($sql);
        return $res;
    }
    public function delresource($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_reviewlevel',array('id'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('id',$id);
        $ret = $this->db->update('sky_reviewlevel',$data);
        return $ret;
    }

  
}
