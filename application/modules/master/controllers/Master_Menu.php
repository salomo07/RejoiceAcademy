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
	function masterMenu1()
	{
		if($_POST['method']=='loadData')
		{
			$dataMenuAsideLevel1=$this->m_master->getMenuLevel1($_POST['filter']);
			echo json_encode($dataMenuAsideLevel1);
		}
		else if($_POST['method']=='updateItem')
		{
			$this->m_master->updateMenuLevel1($_POST['filter']);
		}
	}
}
