<?php

/**
 * Created by PhpStorm.
 * User: supumall
 * Date: 2016/7/27
 * Time: 15:41
 */
class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_cate(){
        $this->load->database();
        $this->db->from('ci_category');
        $cate=$this->db->get();
        return $cate->result_array();
    }
}