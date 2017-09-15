<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Menu extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_master');
        $this->general->getHeaderAside();
    }
    public function index()
	{		
		//$data['header']=$this->session->userdata('header');
        //$data['asideleft']=$this->session->userdata('asideleft');
		$this->load->view('master/menu');
	}
}
