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

	public function details($id){

		$data['bookdetail'] = $this->m_data->getBook($id)->result();
		$data['review'] = $this->m_data->getReview($id)->result();

		$this->load->view('v_books_details', $data);

	}

	public function review(){
		$content = $this -> input -> post('submit-review');
		
		$user = $this->session->flashdata('userdata');
		$userId = $user['username'];
		
		
	}

	public function pinjam(){
		
	}
}
