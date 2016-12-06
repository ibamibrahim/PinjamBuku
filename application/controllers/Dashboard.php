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
		$this->load->helper('form');


	}

	public function index()
	{
		$this->load->library('session');
		$data['user'] = $this->session->userdata();
		$data['book'] = $this->m_books->getAllBooks()->result();
		$this->load->view('v_dashboard', $data);
	}

	public function add_book(){
		$this->load->library('session');
		$data['user'] = $this->session->userdata();
		$this->load->view('v_add_books', $data);
        }
        
	public function admin(){
		$this->load->view('v_admin');
	}
}
