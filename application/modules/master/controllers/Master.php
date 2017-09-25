<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
        parent::__construct();
    }
    public function index()
	{
		//echo current_url();
		if(isset($_GET['c']))
		{
			redirect(current_url().'_'.$_GET['c']);
		}
		// $data['dataMenu']=$this->m_master->getMenu();
		// $data['dataMenu2']=$this->m_master->getMenu2();
		// $data['header']=$this->session->userdata('header');
		// $data['asideleft']=$this->session->userdata('asideleft');
		//$this->load->view('master/menu',$data);
	}
}
