<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_books');

		//load helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

	}

	public function detail_buku()
	{
		$this->load->view('d_buku');
	}

	public function admin(){
		$this->load->view('d_admin');
	}
}
