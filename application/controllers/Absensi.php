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

 // History
  public function history()
  {
    $data['absensi'] = $this->m_model->get_data('absensi')->result();
    $this->load->view('absensi/history', $data);
  }

  // Absensi
  public function absensi()
  {
    $this->load->view('absensi/absensi');
  }




  
 

  
 
    var $template_data = array();
 
    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }
 
    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
 
}



  // Izin
  public function izin()
  {
    $this->load->view('absensi/izin');
  }

  // profil
  public function profil()
  {
    $this->load->view('absensi/profil');
  }


  // Edit Foto Profil
  public function edit_profil()
  {
    $this->load->view('absensi/edit_profil');
  }



// percobaan
public function coba()
{
  $this->load->view('absensi/coba');
}



// hapus
public function hapus_absensi($id)
{
  $this->m_model->delete('absensi', 'id', $id);
  redirect(base_url('absensi/absensi'));
}

}
?>