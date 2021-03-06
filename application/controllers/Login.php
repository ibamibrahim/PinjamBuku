<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		// load model
		$this->load->model('m_user');


		//load helper
		$this->load->helper('url');

		//load session
		$this->load->library('session');

	}

	public function index()
    {
        if ($this->session->has_userdata('username')) {
            redirect(base_url(). 'PPWE_1/index.php/dashboard');
        } else {
            $this->load->view('v_login');
        }
    }
	public function login(){
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
	
		$userData = $this ->m_user-> getUser()->result();
		$isLoggedIn = false;

		foreach($userData as $user){
			$uname = $user->username;
			$pass = $user->password;
			$role = $user->role;
			$user_id = $user->user_id;

			$userdata = array(
				'user_id' => $user_id,
				'username' => $uname,
				'password' => $pass,
				'role' => $role);

			if($uname == $username && $password == $password){
				$isLoggedIn = true;
				$this->session->set_userdata($userdata);
				redirect(base_url(). 'PPWE_1/index.php/dashboard');
				break;
			}
		}

		if(!$isLoggedIn){
			$data = array(
				'loggedIn' => false
				);
			$this->load->view('v_login', $data);
		}
	}
}
