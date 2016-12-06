<?php
/**
 * Created by PhpStorm.
 * User: Ibam
 * Date: 12/7/2016
 * Time: 12:04 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    function __construct(){
        parent::__construct();

        //load helper
        $this->load->helper('url');

        //load session
        $this->load->library('session');

    }

    public function index()
    {
        $this->session->unset_userdata('username');
        redirect(base_url()."PPWE_1/");
    }
}
