<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->general->getHeaderAside();
    }
	
	public function index()
	{   
        // require(APPPATH .'third_party/HTMLParser/simple_html_dom.php');  
        // $url='https://sg.linkedin.com/company/talentvis';
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_REFERER, $url);
        // curl_setopt($ch, CURLOPT_URL, $url);
        // $data = curl_exec($ch);
        // curl_close($ch);


        // $html = str_get_html($data);
        // $dom =new simple_html_dom($html);
        // $aaa=$dom->find('.discovery-panel');
        // foreach ($aaa as $key => $value) {
        //     echo $value."\n";
        // }
        // echo count($aaa);
        $this->load->view('home');
	}
    
    function tryLogin()
    {
        $this->general->tryLogin();
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
    function signout()
    {
        $this->general->signout();
    }
}
