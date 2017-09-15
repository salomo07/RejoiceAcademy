<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
        $this->general->getHeaderAside();
        $data['header']=$this->general->header;
        $data['asideleft']=$this->general->asideleft;
		$this->load->view('home',$data);
	}
    
    function tryLogin()
    {
        $this->general->tryLogin();
    }
	public function signout()
	{
		$arrayDataUser=$this->general->dataUser;
        $this->m_login->updateSignout($arrayDataUser->IdUser);
        $this->session->sess_destroy();
        redirect(current_url());             
	}
    public function getModalChangePassword()
    {
        $data['idUser']= $this->input->post('idUser');
        $this->load->view('template/modal/changepassword',$data);
    }
    public function changePassword()
    {
        $idUser= $this->input->post('id');
        $old= $this->input->post('old');
        $newpass= $this->input->post('newpass');//echo $idUser.$old.$newpass.$verify;
        $verify=$this->m_login->verifyPassword($idUser,base64_encode($old));//print_r($verify);
        if(count($verify)>0)
        {
            $this->m_login->updatePassword($idUser,base64_encode($newpass));
        }
        else{echo "Password lama salah";}
    }
}
