<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_data');


		//load helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

	}

	public function index()
	{
		
	}

	public function details(){

	}

	public function pinjam(){
		
	}
}
