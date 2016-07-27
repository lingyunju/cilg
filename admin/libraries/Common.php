<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*公共函数库（该库自动加载）*/
class Common
{
    public function checklogin(){
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
            return true;
        }else{
            $CI =& get_instance();
            //判断如果用户记住密码自动登录
            if(isset($_COOKIE['info'])){
                $CI->load->library('encryption');
                $info=$CI->encryption->decrypt($_COOKIE['info']);
                $_SESSION['user_name']=$info['user_name'];
                $_SESSION['user_id']=$info['user_id'];
                return true;
            }else{
                $CI->load->helper('url');
                redirect('/login/index');
            }
        }
    }
}