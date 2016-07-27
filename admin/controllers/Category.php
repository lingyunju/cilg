<?php

/**
 * Created by PhpStorm.
 * 分类管理控制器
 * Date: 2016/7/27
 * Time: 14:40
 */
class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common->checklogin();
    }
    /*分类列表*/
    public function index(){
        //获取分类

        $this->load->view('category_list');
    }

    /*分类添加页面*/
    public function category_add(){
        if($this->input->post('cate_add')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cat_name', 'Cat_name', 'required',array('required' => '分类名称不能为空'));
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('category_add');
            }
            else
            {
                $this->load->database();
                $data=array(
                    'cat_name'=>$this->input->post('cat_name'),
                    'cat_img'=>$this->input->post('cat_img'),
                    'cat_img_link'=>$this->input->post('cat_img_link'),
                    'keywords'=>$this->input->post('keywords'),
                    'cat_desc'=>$this->input->post('cat_desc'),
                    'parent_id'=>$this->input->post('parent_id'),
                    'sort_order'=>$this->input->post('sort_order'),
                    'show_in_nav'=>$this->input->post('show_in_nav'),
                    'is_show'=>$this->input->post('is_show'),
                );
                $result=$this->db->insert('ci_category',$data);
                if($result){
                    $this->load->helper('url');
                    redirect('/category/index');
                }else{
                    show_error('添加分类失败，请稍后重试！');
                }
            }
        }else{
            $this->load->library('form_validation');
            $this->load->model('category_model');
            $cate=$this->category_model->get_cate();
            $this->load->view('category_add');
        }
    }
}