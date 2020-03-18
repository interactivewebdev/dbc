<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class faq_model extends CI_Model
{
    var $table = 'faq';
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFaq($faq = null)
    {
        return $this->db->from($this->table)
            ->select("*, date_format(created_at,'%b %d, %Y') as created, date_format(modified_at,'%b %d, %Y') as last_modified")
            ->where('faq_id', $faq)
            ->order_by('order_by', 'DESC')
            ->get()
            ->row();
    }

    public function getFaqs()
    {
        return $this->db->from($this->table)
            ->select("*, date_format(created_at,'%b %d, %Y') as created, date_format(modified_at,'%b %d, %Y') as last_modified")
            ->order_by('order_by', 'DESC')
            ->get()
            ->result();
    }
    
    function addfaq($info)
    {
        $this->db->set($info);
        //echo $this->db->set($info)->get_compiled_insert($this->table); die;
        $this->db->insert($this->table);

        return TRUE;
    }

    function updatefaq($data, $faq_id)
    {
        $this->db->where('faq_id', $faq_id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function deleteFaqs($ids)
    {
        $this->db->where_in('faq_id', $ids);
        $this->db->delete($this->table);
        return TRUE;
    }

    function changeFaqStatus($faq_id, $status)
    {
        $data = array('status' => $status);        
        $this->db->where('faq_id', $faq_id);
        $this->db->update($this->table, $data);
        return TRUE;
    }

}

  