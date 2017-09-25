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
		$this->load->view('menu');
	}
	function masterAsideMenu1()
	{
		if($_POST['filter'])
		$dataMenuAsideLevel1=$this->m_master->getMenuHeaderLevel1();
		echo json_encode(array("data"=>$dataMenuAsideLevel1,"count"=>count($dataMenuAsideLevel1)));
	}
}
