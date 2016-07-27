<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    /*用户登录界面*/
    public function index(){

        $this->load->view('login');
    }

    /*管理员登录逻辑*/
    public function dologin(){
        if($this->input->post('user_login')){
            $yzmstatus=$this->check_verify($_POST['vcode']);
            if(!$yzmstatus){
                show_error('验证码错误或已失效');
            }
            $this->load->database();
            $whe=array('user_name'=>$_POST['user_name'],'user_password'=>md5($_POST['user_password']));
            $query = $this->db->get_where('ci_user',$whe);
            if($query->num_rows()>0){
                $row =$query->row_array();
                $this->session->set_userdata($row);
                //记住密码
                $this->load->helper('cookie');
                if($_POST['remember']==1){
                    $this->load->library('encryption');
                    $info=array('user_id'=>$row['user_id'],'user_name'=>$row['user_name']);
                    $userinfo = $this->encryption->encrypt(json_encode($info));
                    set_cookie('info',$userinfo,time()+3600*24*7,'','/');
                }else{
                    delete_cookie('info');
                }
                $this->load->helper('url');
                redirect('/main/index');
            }else{
                show_error('用户名或密码错误');
            }
        }else{
            show_error('非法的访问！');
        }
    }

    /*用户退出登录*/
    public function loginout(){
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect('/login/index');
    }

    /*生成验证码*/
    public function verification(){
        $this->load->library('verify');
        $this->verify->imageW = 112;
        $this->verify->imageH = 42;
        $this->verify->fontSize = 18;
        $this->verify->length = 4;
        $this->verify->codeSet = '0123456789';
        $this->verify->entry();
    }

    /*判断验证码是否正确*/
    function check_verify($code, $id = ''){
        $this->load->library('verify');
        $result=$this->verify->check($code, $id);
        return $result;
    }
}