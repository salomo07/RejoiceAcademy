<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->general->getHeaderAside();
    }
    function index()
	{
		$this->load->view('pagenotfound');
	}
}
