<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->load->library('session');
		$data['user'] = $this->session->flashdata('userdata');
		$data['book'] = $this->m_data->getBook()->result();
		$this->load->view('v_dashboard', $data);
	}
}
