<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Absensi extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in')!= true && $this->session->userdata('role') != 'karyawan') {
            redirect(base_url().'auth');
        }
	}
   
    // Absensi
    public function index()
	{
            $data['karyawan'] = $this->m_model->get_data('karyawan')->result();
		         $this->load->view('absensi/index', $data);
	}

  // karyawan
  public function karyawan()
  {
    $data['karyawan'] = $this->m_model->get_data('karyawan')->result();
    $this->load->view('absensi/karyawan', $data);
  }

 // Absensi
  public function absensi()
  {
    $data['absensi'] = $this->m_model->get_data('absensi')->result();
    $this->load->view('absensi/absensi', $data);
  }



  // Kegiatan 
  public function kegiatan()
  {
    $this->load->view('absensi/kegiatan');
  }  







}
?>