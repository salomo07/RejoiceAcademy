<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	function __construct() 
	{
        parent::__construct();
        if($this->general->dataUser)
        {
        	redirect (base_url());
        }
    }
    function index()
	{	
		$plain_text = 'This is a plain-text message!';
		// $ciphertext = $this->encryption->encrypt($plain_text);
		// echo $this->encryption->decrypt($ciphertext);
		$data['email']=$_GET['email'];
		$data['uname']=$_GET['uname'];
		$this->load->view('registration',$data);
	}
	function createUser()
	{

	}
	
}
