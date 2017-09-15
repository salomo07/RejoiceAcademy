<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta"); 
        $this->load->model('m_login');
        if ($this->general->validasiTokenLogin()==true) 
        {
            redirect('Home');
        }
               
    }
    public function index()
    {
        $this->load->view('index');
    }
    
        
//     public function validasiTokenLogin()
//     {
//         if($this->session->userdata('dataToken')!='')
//         {
//             $dataToken=$this->session->userdata('dataToken');
//             $cookieUser=substr($dataToken, 0,strlen($dataToken)-(strlen($dataToken)- strpos($dataToken, '|')));

//             $dataToken=str_replace($cookieUser.'|', '', $dataToken);
//             $cookieToken=substr($dataToken, 0,strlen($dataToken)-(strlen($dataToken)- strpos($dataToken, '|')));

//             $dataToken=str_replace($cookieToken.'|', '', $dataToken);
//             $cookieIP=substr($dataToken, 0,strlen($dataToken)-(strlen($dataToken)- strpos($dataToken, '|')));

//             $dataToken=str_replace($cookieIP.'|', '', $dataToken);
//             $cookieHost=$dataToken;
//             $arrayUserToken=$this->m_login->getUserToken($cookieUser,$cookieIP,$cookieHost,$cookieToken);
//             if(count($arrayUserToken)>0)
//             {
//                 return true;
//             }
//             else{return false;}
//         }
//         if($this->input->cookie('dataUser',true))
//         {

//         }
//         else{return false;}
//     }
}
