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
		$content = $this -> input -> post('content');
		$user = $this->session->flashdata('userdata');
		$userId = $user['user_id'];
		$date = "2016-11-10" ; //dummy
		$bookid = $this->input->post('book-id'); 

		$sql = "INSERT INTO review (book_id, user_id, date, content) VALUES ('$bookid','1','$date','$content')";
		$this->db->query($sql);
		
		//redirect(base_url(). 'elibrary/index.php/dashboard');

	}

	public function pinjam(){
		
	}
}
