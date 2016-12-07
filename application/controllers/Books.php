<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_books');
		$this->load->model('m_loan');
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
        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');
        $data['bookdetail'] = $this->m_books->getBook($id)->result();
		$data['review'] = $this->m_review->getReview($id)->result();
        $data['loaned_book'] = $this->m_loan->getLoanedBook($user_id)->result();

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
        $page = $this->input->post('page');
        if($page == 'dashboard'){
            redirect(base_url().'PPWE_1/index.php/dashboard');
        } else if ($page == 'page-details'){
            redirect(base_url().'PPWE_1/index.php/books/details/'.$book_id);
        } else {
            redirect(base_url().'PPWE_1/index.php/dashboard/pinjaman');
        }
	}

	public function kembalikan(){
		$loan_id = $this -> input -> post('loan_id');
		$book_id = $this -> input -> post('book_id_kembalikan');
		$this->m_books->kembalikan($loan_id, $book_id);
        $page = $this->input->post('page');
        if($page == 'dashboard'){
            redirect(base_url().'PPWE_1/index.php/dashboard');
        } else if ($page == 'page-details'){
            redirect(base_url().'PPWE_1/index.php/books/details/'.$book_id);
        } else {
            redirect(base_url().'PPWE_1/index.php/dashboard/pinjaman');
        }
	}

	public function add_book(){
		$config['upload_path']          = 'data/book_image';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

		$title = $this -> input -> post('judul');
		$author = $this -> input -> post('penulis');
		$publisher = $this -> input -> post('penerbit');
		$description = $this -> input -> post('deskripsi');
		$quantity = $this -> input -> post('jumlah');
		$added_book_title = $this->m_books->getAllJudul()->result();

        if ( ! $this->upload->do_upload('book_image'))
        {
        		//upload error; 

                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
                

                //$this->load->view('v_add_books', $error);
        }

        else
        {
                $data = array('upload_data' => $this->upload->data());
                $file_name = $data['upload_data']['file_name'];
                $img_path = base_urL() . "PPWE_1/data/book_image/" . $file_name;
                $udahAda = false;
                foreach ($added_book_title as $key => $b) {
                	$existed_title = $b->title;
                	if($existed_title == $title){
                		// udah ada
                		$book_id = $b->book_id;
                		$this->m_books->addQuantityToBook($book_id, $quantity);
                		$udahAda = true;
                		break;
                	} 

                }
            	if(!$udahAda){
                		$this->m_books->addNewBook($img_path, $title, $author, $publisher, $description, $quantity);
                	}
                //$this->load->view('upload_success', $data);
        }
	

		// taken from https://www.codeigniter.com/userguide3/libraries/file_uploading.html
	}
}
