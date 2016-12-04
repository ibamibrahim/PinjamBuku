<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_books');


		//load helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

	}

	public function index()
	{
		$this->load->library('session');
		$data['user'] = $this->session->userdata();
		$data['book'] = $this->m_books->getAllBooks()->result();
		$this->load->view('v_dashboard', $data);
	}
}