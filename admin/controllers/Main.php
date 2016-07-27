<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->common->checklogin();
    }
    /*管理系统主界面构建*/
    public function index(){
        $this->load->view('index');
    }

    public function top(){
        $this->load->view('top');
    }

    public function left(){
        $this->load->view('left');
    }

    public function footer(){
        $this->load->view('footer');
    }

    /*管理系统主页面*/
    public function admin(){
        $this->load->view('main');
    }

}