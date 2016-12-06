<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_books');
		$this->load->model('m_review');


		//load helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

		$this->load->helper('form');

	}

	public function index()
	{
		
	}

	public function details($id){

		$data['bookdetail'] = $this->m_books->getBook($id)->result();
		$data['review'] = $this->m_review->getReview($id)->result();

		$this->load->view('v_books_details', $data);

	}

	public function review(){
		$this->load->library('session');
		$content = $this -> input -> post('content');
		$user_id = $this->session->userdata('user_id');
		
		$date = date('y-m-d');; //dummy
		$bookid = $this->input->post('book-id'); 

		$this->m_review->addReview($bookid, $user_id, $date, $content);
		
		redirect(base_url(). 'PPWE_1/index.php/books/details/'.$bookid);

	}

	public function pinjam(){
		$user_id = $this->session->userdata('user_id');		
		$book_id = $this -> input -> post('book_id_pinjam');
		$this->m_books->pinjam($user_id, $book_id);
	}

	public function add_book(){
		// taken from https://www.codeigniter.com/userguide3/libraries/file_uploading.html
		$config['upload_path']          = base_url().'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        /*$config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
		*/

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('image'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('v_add_books', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('v_add_books_success', $data);
        }
	}
}
