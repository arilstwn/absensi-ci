<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
		$this->load->model('m_model');
	}
	public function index()
	 {
      $this->load->view('auth/login');
	}
	// public function aksi_login()
    // {
    //     $email = $this->input->post('email', true);
    //     $password = $this->input->post('password', true);
    //     $data = ['email' => $email,];
    //     $query = $this->m_model->getwhere('admin', $data);
    //     $result = $query->row_array();

    //     if (!empty($result) && md5($password) === $result['password']) {
    //         $data = [
    //             'logged_in' => true,
    //             'email' => $result['email'],
    //             'username' => $result['username'],
    //             'role' => $result['role'],
    //             'id' => $result['id'],
    //         ];
    //         $this->session->set_userdata($data);
    //         if ($this->session->userdata('role') == 'admin') {
    //             redirect(base_url('admin'));
    //         }elseif ($this->session->userdata('role') == 'keuangan') {
    //         redirect(base_url('keuangan'))  ;
    //         } else {
    //             redirect(base_url('login'));
    //         }
    //     } else {
    //         redirect(base_url('login'));
    //     }
    // }
	// function logout() {
    //   $this->session->sess_destroy();
	//   redirect(base_url());
	// }















  // Login
    public function login()
    {
        $this->load->view('auth/login');
    }
    public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email,];
        $query = $this->m_model->getwhere('admin', $data);
        $result = $query->row_array();

        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'email'     => $result['email'],
                'username'  => $result['username'],
                'role'      => $result['role'],
                'id'        => $result['id'],
            ];
            $this->session->set_userdata($data);
            if ($this->session->userdata('role') == 'admin') {
                redirect(base_url('admin'));
            }elseif ($this->session->userdata('role') == 'karyawan') {
            redirect(base_url('absensi/index'))  ;
            } else {
                redirect(base_url('auth/login'));
            }
        } else {
            redirect(base_url('Absensi/index'));
        }
    }
	function logout() {
      $this->session->sess_destroy();
	  redirect(base_url('auth/login'));
	}
      





 // Registerin
 public function register()
 {
    $this->load->view('auth/register');
 }
 public function aksi_register()
  {
    $data = [
       
        'username'      => $this->input->post('username'),
        'nama_depan'    => $this->input->post('nama_depan'),
        'nama_belakang' => $this->input->post('nama_belakang'),
        'email'         => $this->input->post('email'),
        'password'      => $this->input->post('password'),
        'role'      => 'admin',
        
    ];

    $this->m_model->register( $data);
    redirect(base_url('auth/login'));
  }


 public function register_karyawan()
 {
    $this->load->view('auth/register_karyawan');
 }
 public function aksi_register_karyawan()
  {
    $data = [
       
        'username'      => $this->input->post('username'),
        'nama_depan'    => $this->input->post('nama_depan'),
        'nama_belakang' => $this->input->post('nama_belakang'),
        'email'         => $this->input->post('email'),
        'password' => md5($this->input->post('password')),
        'role' => 'karyawan',
        
    ];

    $this->m_model->register( $data);
    redirect(base_url('auth/login'));
  }







// Login
public function login_karyawan()
{
    $this->load->view('auth/login_karyawan');
}
public function aksi_login_karyawan()
{
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);
    $data = ['email' => $email,];
    $query = $this->m_model->getwhere('admin', $data);
    $result = $query->row_array();

    if (!empty($result) && md5($password) === $result['password']) {
        $data = [
            'logged_in' => true,
            'email'     => $result['email'],
            'username'  => $result['username'],
            'role'      => $result['role'],
            'id'        => $result['id'],
        ];
        $this->session->set_userdata($data);
        if ($this->session->userdata('role') == 'admin') {
            redirect(base_url('admin'));
        }elseif ($this->session->userdata('role') == 'karyawan') {
        redirect(base_url('absensi/index'))  ;
        } else {
            redirect(base_url('auth/login_karyawan'));
        }
    } else {
        redirect(base_url('Absensi/index'));
    }
}
 










}
?>