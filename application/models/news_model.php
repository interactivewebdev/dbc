<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class category_model extends CI_Model
{
    var $table = 'category';
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getParentCategories()
    {
        return $this->db->from($this->table)
                ->where('parent_id',0)
                ->order_by('order_by', 'DESC')
                ->get()
                ->result();
    }

    public function getCategory($category = null)
    {
        return $this->db->from('category as c1')
            ->join('category c2', 'c1.parent_id=c2.category_id','left')
            ->select("c2.title as parent, c1.*, if(c1.status=1,'Active','Deactive') as category_status, date_format(c1.created_at,'%b %d, %Y') as created, date_format(c1.modified_at,'%b %d, %Y') as last_modified")
            ->where('c1.category_id', $category)
            ->order_by('c1.order_by', 'DESC')
            ->get()
            ->row();
    }

    public function getCategories()
    {
        return $this->db->from('category as c1')
            ->join('category c2', 'c1.parent_id=c2.category_id','left')
            ->select("c2.title as parent, c1.*, if(c1.status=1,'Active','Deactive') as category_status, date_format(c1.created_at,'%b %d, %Y') as created, date_format(c1.modified_at,'%b %d, %Y') as last_modified")
            ->order_by('c1.order_by', 'DESC')
            ->get()
            ->result();
    }
    
    function addcategory($info)
    {
        $this->db->set($info);
        //echo $this->db->set($info)->get_compiled_insert($this->table); die;
        $this->db->insert($this->table);

        return TRUE;
    }

    function updatecategory($data, $category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function deleteCategories($ids)
    {
        $this->db->where_in('category_id', $ids);
        $this->db->delete($this->table);
        return TRUE;
    }

    function changeCategoriesStatus($category_id, $status)
    {
        $data = array('status' => $status);        
        $this->db->where('category_id', $category_id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

}

  