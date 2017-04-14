<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ArticleModel extends CI_Model
{
    var $id;
    var $uid;
    var $title;
    var $content;
    var $author;
    var $intro;
    var $img;
    var $ip;
    var $createtime;
    var $updatetime;
    
    public function __construct()
    {
            parent::__construct();
    }

    protected function setup($row){
        if($row)
        {
            
            $i = new ArticleModel();
            $i->id      = $row->id;
            $i->uid      = $row->uid;
            $i->title    = $row->title;
            $i->content   = $row->content;
            $i->author   = $row->author;
            $i->intro   = $row->intro;
            $i->img   = $row->img;
            $i->ip    = $row->ip;
            $i->createtime  = $row->createtime;
            $i->updatetime    = $row->updatetime;
            return $i;
        }
    }
    
    public function whereShow($page,$per)
    {
        $this->load->database();
        if($page)
        {
           $this->db->limit($page,$per); 
        }else
        {
            $this->db->limit($per); 
        }
        $this->db->order_by('createtime','desc');
        $result = $this->db->get('sky_article');
         if($result->num_rows() > 0)
        {
            foreach($result->result() as $row)
            {
                $data[] = $this->setup($row);
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
        $result = $this->db->get('sky_article');
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
        $result = $this->db->get('sky_article');
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
        $row = $this->db->get_where('sky_article',array('id'=>$id))->row();
        return $this->setup($row);

    }
    public function count()
    {
        $this->load->database();
        return $this->db->count_all_results('sky_article');
    }

    public function insert($title,$content,$ip,$uid,$createtime,$author,$intro,$img)
    {
        $this->load->database();
        $sql = $this->db->insert_string('sky_article',array('title'=>$title,'content'=>$content,'ip'=>$ip,'uid'=>$uid,'createtime'=>$createtime,'author'=>$author,'intro'=>$intro,'img'=>$img));
        $res = $this->db->query($sql);
        return $res;
    }
    public function delresource($id)
    {
        $this->load->database();
        $ret = $this->db->delete('sky_article',array('id'=>$id));
        return $ret;
    }
    public function updata($id,$data)
    {
        $this->load->database();
        $this->db->where('id',$id);
        $ret = $this->db->update('sky_article',$data);
        return $ret;
    }

  
}
