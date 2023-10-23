 <?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
            redirect(base_url() . 'auth/login');
        }
    }
    // // page akun
    public function akun()
    {         
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();


        $this->load->view('karyawan/akun',$data);

    }
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = '../../image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        
        $this->load->library('upload', $config); // Load library 'upload' with config
        
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }
    public function aksi_update_profile()
    {
        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $username = $this->input->post('username');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        // $foto = $this->upload_img('foto');
        // Jika ada foto yang diunggah
        if ($foto) {
            $kode = round(microtime(true) * 100);
            $file_name = $kode . '_' . $foto;
            $upload_path = './image/' . $file_name;

            if (move_uploaded_file($foto_temp, $upload_path)) {
                // Hapus foto lama jika ada
                $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
                if ($old_file && file_exists(' ./image/' . $old_file)) {
                    unlink(' ./image/' . $old_file);
                }

                $data = [
                    'foto' => $file_name,
                    'username' => $username,
                    'nama_depan' => $nama_depan,
                    'nama_belakang' => $nama_belakang,
                ];
            } else {
                // Gagal mengunggah foto baru
                redirect(base_url('karyawan/dashboard'));
            }
        } else {
            // Jika tidak ada foto yang diunggah
            $data = [
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
        }

        // Eksekusi dengan model ubah_data
        $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

        if ($update_result) {
            $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Merubah Profile
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(base_url('karyawan/akun'));
        } else {
            redirect(base_url('karyawan/akun'));
        }
    
    }
    public function hapus_image()
    { 
        $data = array(
            'foto' => NULL
        );

        $eksekusi = $this->m_model->ubah_data('user', $data, array('id'=>$this->session->userdata('id')));
        if($eksekusi) {
            
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('karyawan/akun'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('karyawan/akun'));
        }
    }
    
    
    
    public function aksi_ubah_password()
        {
        
            $password_lama = $this->input->post('password_lama', true);

            $user = $this->m_model->getWhere('user', ['id' => $this->session->userdata('id')])->row_array();
    
            if (md5($password_lama) === $user['password']) {
                $password_baru = $this->input->post('password_baru', true);
                $konfirmasi_password = $this->input->post('konfirmasi_password', true);
    
                // Pastikan password baru dan konfirmasi password sama
                if ($password_baru === $konfirmasi_password) {
                    // Update password baru ke dalam database
                    $data = ['password' => md5($password_baru)];
                    $this->m_model->ubah_data('user', $data, ['id' => $this->session->userdata('id')]);
    
                    $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Merubah Password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                            redirect(base_url('karyawan/akun'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Baru dan Konfirmasi Password Tidak Cocok<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        redirect(base_url('karyawan/akun'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Anda Salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
                }            redirect(base_url('karyawan/akun'));
                redirect(base_url('karyawan/akun'));
            }
     
            
        

        
            
            

        
        
        // aksi ubah absensi
    
    public function ubah_absen($id)
    {
        $data['absen'] = $this-> m_model->get_by_id('absensi' , 'id', $id)->result();
        $this->load->view('karyawan/ubah_absen',$data);
    }
    public function aksi_ubah_absen()
    {
        $data =  [
            'kegiatan' => $this->input->post('kegiatan'),
        ];
        $eksekusi = $this->m_model->ubah_data('absensi', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('karyawan/history'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('karyawan/ubah_absen'.$this->input->post('id')));
        }
    }
    public function ubah_izin($id)
    {
        $data['izin'] = $this-> m_model->get_by_id('absensi' , 'id', $id)->result();
        $this->load->view('karyawan/ubah_izin',$data);
    }
    public function aksi_ubah_izin()
    {
        $data =  [
            'keterangan_izin' => $this->input->post('izin'),
        ];
        $eksekusi = $this->m_model->ubah_data('absensi', $data, array('id'=>$this->input->post('id')));
        if($eksekusi) {
            $this->session->set_flashdata('sukses' , 'berhasil');
            redirect(base_url('karyawan/history'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('karyawan/ubah_izin'.$this->input->post('id')));
        }
    }



} 