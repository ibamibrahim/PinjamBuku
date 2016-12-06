<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('v_add_books', array('error' => ' ' ));
        }

        public function test(){
                echo "test";
        }

        public function do_upload()
        {
                $config['upload_path']          = 'data/book_image';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('v_add_books', $error);
                }

                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
?>