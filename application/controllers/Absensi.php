<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Absensi extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in')!= true && $this->session->userdata('role') != 'index') {
            redirect(base_url().'auth');
        }
	}
   
    // Absensi
    public function index()
	{
		         $this->load->view('absensi/index');
	}












}
?>