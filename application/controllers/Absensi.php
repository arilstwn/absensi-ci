<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Absensi extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        // if ($this->session->userdata('logged_in')!= true && $this->session->userdata('role') != 'karyawan') {
        //     redirect(base_url().'auth');
        // }
	}
   













    // Absensi
    public function index()
	{           
    $data['karyawan'] = $this->m_model->get_data('karyawan')->num_rows();
		$data['absensi'] = $this->m_model->get_data('absensi')->num_rows();
		$data['admin'] = $this->m_model->get_data('admin')->num_rows();
    $data['data'] = $this->m_model->get_data('karyawan')->result();
		         $this->load->view('absensi/index', $data);
	}
  
// // //upload image
// public function upload_img($value)
// {
//   $kode = round(microtime(true) * 1000);
//   $config['upload_path'] = './images/siswa/';
//   $config['allowed_types'] = '.jpg|png|jpeg';
//   $config['max_size'] = '3000';
//   $config['file_name'] = $kode;
//   $this->upload->initialize($config);
//   if (!$this->upload->do_upload($value)) {
//     return array( false, '' );
//   } else {
//     $fn = $this->upload->data();
//     $nama = $fn['file_name'];
//     return array( true, $nama );
//   }
// }



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

  
  
// akun
public function akun()
{         
    $data['admin'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();


    $this->load->view('absensi/akun', $data);

}

  
 

// public function upload_img($value)
//     {
//         $kode = round(microtime(true) * 1000);
//         $config['upload_path'] = '../../image/';
//         $config['allowed_types'] = 'jpg|png|jpeg';
//         $config['max_size'] = '30000';
//         $config['file_name'] = $kode;
        
//         $this->load->library('upload', $config); // Load library 'upload' with config
        
//         if (!$this->upload->do_upload($value)) {
//             return array(false, '');
//         } else {
//             $fn = $this->upload->data();
//             $nama = $fn['file_name'];
//             return array(true, $nama);
//         }
//     }
    // public function aksi_update_profile()
    // {
    //     $foto = $_FILES['foto']['name'];
    //     $foto_temp = $_FILES['foto']['tmp_name'];
    //     $username = $this->input->post('username');
    //     $nama_depan = $this->input->post('nama_depan');
    //     $nama_belakang = $this->input->post('nama_belakang');
    //     // $foto = $this->upload_img('foto');
    //     // Jika ada foto yang diunggah
    //     if ($foto) {
    //         $kode = round(microtime(true) * 100);
    //         $file_name = $kode . '_' . $foto;
    //         $upload_path = './image/' . $file_name;

    //         if (move_uploaded_file($foto_temp, $upload_path)) {
    //             // Hapus foto lama jika ada
    //             $old_file = $this->m_model->get_profil_by_id($this->input->post('id'));
    //             if ($old_file && file_exists(' ./image/' . $old_file)) {
    //                 unlink(' ./image/' . $old_file);
    //             }

    //             $data = [
    //                 'image' => $file_name,
    //                 'username' => $username,
    //                 'nama_depan' => $nama_depan,
    //                 'nama_belakang' => $nama_belakang,
    //             ];
    //         } else {
    //             // Gagal mengunggah foto baru
    //             redirect(base_url('absensi/dashboard'));
    //         }
    //     } else {
    //         // Jika tidak ada foto yang diunggah
    //         $data = [
    //             'username' => $username,
    //             'nama_depan' => $nama_depan,
    //             'nama_belakang' => $nama_belakang,
    //         ];
    //     }

    //     // Eksekusi dengan model ubah_data
    //     $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

    //     if ($update_result) {
    //         $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     Berhasil Merubah Profile
    //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //         </div>');
    //         redirect(base_url('absensi/akun'));
    //     } else {
    //         redirect(base_url('absensi/akun'));
    //     }
    
    // }

/// aksi update akun
public function aksi_update_profil()
{
  $foto = $_FILES['foto']['name'];
  $foto_temp = $_FILES['foto']['tmp_name'];
  $username = $this->input->post('username');
  $nama_depan = $this->input->post('nama_depan');
  $nama_belakang = $this->input->post('nama_belakang');
  $foto = $this->upload_img('foto');
  if ($foto) {
    $kode = round(microtime(true) * 100);
    $file_name = $kode .'_' . $foto;
    $upload_path = './image/' . $file_name;

    if (move_uploaded_file($foto_temp, $upload_path)) {
      $old_file = $this->m_model->get_akun_by_id($this->input->post('id'));
      if ($old_file && file_exists(' ./image/' . $old_file)) {
        unlink(' ./image' . $old_file);
      }
      $data = [
        'foto'         => $file_name,
        'username'      => $username,
        'nama_depan'    => $nama_depan,
        'nama_belakang' => $nama_belakang,
      ];
    } else {
      $foto = $_FILES['foto']['name'];
      $foto_temp = $FILES['foto']['tmp_name'];
      $username = $this->input->post('username');
      $nama_depan = $this->input->post('nama_depan');
      $nama_belakang = $this->input->post('nama_belakang');
      $data = [
          'foto'         => $image[1],
          'email'         => $email,
          'username'      => $username,
          'nama_depan'    => $nama_depan,
          'nama_belakang' => $nama_belakang,
      ];
  } 
  }
  // EKSEKUSI DENGAN MODEL UBAH_DATA
  $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

  if ($update_result) {
    $this->session->set_flashdata('sukses', '<div class="alert alert-success arlet-dismissible fade show" role="alret">
    Berhasil Merubah Profile
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect(base_url('absensi/akun'));
  } else {
    $this->session->set_flashdata('message', '<div class="alert alert-danger arlet-dismissible fade show" role="alret">
    Berhasil Merubah Profile
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect(base_url('absensi/akun'));
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
            redirect(base_url('absensi/akun'));
        } else {
            $this->session->set_flashdata('error' , 'gagal...');
            redirect(base_url('absensi/akun'));
        }
    }




    public function aksi_ubah_password()
    {
    
        $password_lama = $this->input->post('password_lama', true);

        $user = $this->m_model->getWhere('admin', ['id' => $this->session->userdata('id')])->row_array();

        if (md5($password_lama) === $user['password']) {
            $password_baru = $this->input->post('password_baru', true);
            $konfirmasi_password = $this->input->post('konfirmasi_password', true);

            // Pastikan password baru dan konfirmasi password sama
            if ($password_baru === $konfirmasi_password) {
                // Update password baru ke dalam database
                $data = ['password' => md5($password_baru)];
                $this->m_model->ubah_data('admin', $data, ['id' => $this->session->userdata('id')]);

                $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Merubah Password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        redirect(base_url('absensi/akun'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Baru dan Konfirmasi Password Tidak Cocok<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect(base_url('absensi/akun'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Anda Salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
            }            redirect(base_url('absensi/akun'));
            redirect(base_url('absensi/akun'));
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
    $data['absensi'] = $this->m_model->get_data('absensi')->result();
    $this->load->view('absensi/izin', $data);
  }
  public function aksi_izin()
	{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id = $this->session->userdata('id');
    $tanggal_izin = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $izin_terakhir = $this->m_model->get('absensi', array(
        'id' => $id
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($izin_terakhir && $izin_terakhir->date !== $tanggal_izin) {
        $izin_terakhir = null; // Atur $izin_terakhir menjadi null jika tanggal berbeda
    }

    if ($izin_terakhir && $izin_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('absensi/history'));
    	} else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id' => $id,
            'kegiatan' => '-',
            'date' => $tanggal_izin,  
            'jam_masuk' => null, 
            'jam_keluar' => null,
            'keterangan_izin' => $this->input->post('izin'),
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('absensi/history'));
    	}
	}

 


  


// percobaan
public function coba()
{
  $data['karyawan'] = $this->m_model->get_data('karyawan')->result();
  $this->load->view('absensi/coba', $data);
}


// Hapus 
public function hapus_karyawan($id)
{
  $this->m_model->delete_karyawan('karyawan', 'id', $id);
  redirect(base_url('absensi'));
}
  public function hapus_absensi($id)
  {
    $this->m_model->delete_absensi('absensi', 'id', $id);
    redirect(base_url('absensi/history'));
  }


 public function dasboard()
 {
  $this->load->view('absensi/dasboard');
 }

  

// public function ubah_password($id)
// {
//   $data['admin'] = $this-> m_model->get_by_id('admin' , 'id' , $id)->result();
//   $this->load->view('action/ubah_password',$data);
// }
// public function aksi_ubah_password()
// {
//     $password_lama = $this->input->post('password_lama', true);
//     $password_baru = $this->input->post('password_baru', true);
//     $password_baru2 = $this->input->post('password_baru2', true);
//     $data = ['email' => $this->session->userdata('email')];
//     $query = $this->m_model->getwhere('admin', $data);
//     $result = $query->row_array();
//     if (md5($password_lama) === $result['password']) {
//       if ($password_baru === $password_baru2) {
//             $data =  [
//                 'password' => md5($this->input->post('password_baru')),
//             ];
//             $eksekusi = $this->m_model->update('admin', $data, array('id'=> $this->session->userdata('id')));
//             if($eksekusi) {
//                 $this->session->set_flashdata('sukses' , 'berhasil');
//                 redirect(base_url('profile'));
//             } else {
//                 $this->session->set_flashdata('error' , 'gagal...');
//                 redirect(base_url('profile/ubah_profile/'.$this->session->userdata('id')));
//             }
//         }else {
//             $this->session->set_flashdata('password_baru' , 'Password tidak cocok');
//             redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
//         }
//     } else {
//         $this->session->set_flashdata('password_lama' , 'Password lama dengan inputan tidak cocok');
//         redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
//     }
//   }

  // Absensi
  public function absensi()
  {
   
    $this->load->view('absensi/absensi');
  }
  
// absensi
public function aksi_absensi()
{        
  date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id = $this->session->userdata('id');
    $tanggal_absensi = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $absensi_terakhir = $this->m_model->getlast('absensi', array(
        'id' => $id
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($absensi_terakhir && $absensi_terakhir->date !== $tanggal_absensi) {
        $absensi_terakhir = null; // Atur $absensi_terakhir menjadi null jika tanggal berbeda
    }

    if ($absensi_terakhir && $absensi_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('absensi/history'));
    } else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id' => $id,
            'kegiatan' => $this->input->post('kegiatan'),
            'jam_masuk' => $waktu_sekarang, 
            'jam_keluar' => null,
            'date' => $tanggal_absensi,  
            'keterangan_izin' => '-',
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('absensi/history'));
    }
}

// public function edit_profil()
// {
//   $data['user'] = $this-> m_model->get_by_id('admin' , 'id' ,$this->session->userdata('id') )->result();

//   $this->load->view('absensi/edit_profil',$data);
// }
 // export Karyawan
 public function export ()
 {
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();

   $style_col = [
     'font' => ['bold' => true],
     'alignment' => [
       'horizontal' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
       'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
     ],
     'borders' => [
       'top' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
       'right' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
       'bottom' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
       'left' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
     ]
     ];

     $style_row = [
       'alignment' => [
         'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
       ],
       'borders' => [
         'top' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
         'right' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
         'bottom' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
         'left' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
       ]
     ];

     $sheet->setCellValue('A1', "DATA PEMBAYARAN");
     $sheet->mergeCells('A1:E1');
     $sheet->getStyle('A1')->getFont()->setBold(true);

     // Head
     $sheet->setCellValue('A3', "NO");
     $sheet->setCellValue('B3', "USERNAME");
     $sheet->setCellValue('C3', "EMAIL");
     $sheet->setCellValue('D3', "NAMA DEPAN");
     $sheet->setCellValue('E3', "NAMA BELAKANG");
     $sheet->setCellValue('F3', "STATUS");

     $sheet->getStyle('A3')->applyFromArray($style_col);
     $sheet->getStyle('B3')->applyFromArray($style_col);
     $sheet->getStyle('C3')->applyFromArray($style_col);
     $sheet->getStyle('D3')->applyFromArray($style_col);
     $sheet->getStyle('E3')->applyFromArray($style_col);
     $sheet->getStyle('F3')->applyFromArray($style_col);

     // Get data from databse
     $data_karyawan = $this->m_model->get_data('karyawan')->result();

     $no = 1;
     $numrow = 4;
     foreach ($data_karyawan as $data) {
       $sheet->setCellValue('A'.$numrow, $data->id);
       $sheet->setCellValue('B'.$numrow, $data->username);
       $sheet->setCellValue('C'.$numrow, $data->email);
       $sheet->setCellValue('D'.$numrow, $data->nama_depan);
       $sheet->setCellValue('E'.$numrow, $data->nama_belakang);
       $sheet->setCellValue('F'.$numrow, $data->status);

       $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
       $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
       $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
       $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
       $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
       $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);

       $no++;
       $numrow++;
     }

     $sheet->getColumnDimension('A')->setWidth(5);
     $sheet->getColumnDimension('B')->setWidth(25);
     $sheet->getColumnDimension('C')->setWidth(25);
     $sheet->getColumnDimension('D')->setWidth(20);
     $sheet->getColumnDimension('E')->setWidth(30);
     $sheet->getColumnDimension('F')->setWidth(20);

     $sheet->getDefaultRowDimension()->setRowHeight(-1);

     $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

     $sheet->setTitle("LAPORAN DATA KARYAWAN");

     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment; filename="KARYAWAN.xlsx"');
     header('Cache-Control: max-age=');

     $writer = new Xlsx($spreadsheet);
     $writer->save('php://output');
 }

 // import karyawan
 public function import(){

  if (isset($_FILES["file"]["name"])) {
    $path = $_FILES["file"]["tmp_name"];
    $object = PhpOffice\PhpSpreadsheet\IOFACTORY::load($path);
    foreach ($object->getWorksheetIterator() as $worksheet) {
$highestrow = $worksheet->getHighestRow();
$highestColumn= $worksheet->getHighestColumn();
for ($row=2; $row <= $highestrow ; $row++) { 
  $username= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
  $email= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
  $nama_depan= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
  $nama_belakang= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
  $status= $worksheet->getCellByColumnAndRow(9, $row)->getValue();

$get_id_by_status= $this->m_model->get_by_nisn($status);
$data =array(
  'username'=> $username,
  'email'=> $email,
  'nama_depan'=> $nama_depan,
  'nama_belakang'=> $nama_belakang,
  'status'=> $get_id_by_status
);

$this->m_model->tambah_data('karyawan',$data);
}
}
redirect(base_url('absensi/absensi'));
}else {
  echo "Invalid errror";
}
}

public function export_karyawan()
{
  $data['data_karyawan'] = $this->m_model->get_data('karyawan')->result();
  $data['nama'] = 'karyawan';
  if ($this->uri->segment(3) == "pdf") {
    $this->load->library('pdf');
    $this->pdf->load_view('absensi/export_data_karyawan', $data);
    $this->pdf->render();
    $this->pdf->stream("data_karyawan.pdf", array("Attachment" => false));
  }else {
    $this->load->view('absensi/download_data_karyawan', $data);
  }
}
public function rekap_h()
	{
        $hari_ini = date('Y-m-d');
        $data['absensi_harian'] = $this->m_model->get_harian($hari_ini);
		$this->load->view('absensi/rekap_h', $data);
	}
  function laporan_harian(){
    cek_session_admin();
    $data = $this->model_app->hari_ini();
      $data = array('record' => $data);
    $this->template->load('app/template','app/mod_laporan/view_harian',$data);
  }



	
// Rekap harian
public function rekap_m() {
  $data['absensi'] = $this->m_model->getAbsensiLast7Days();        
  $this->load->view('absensi/rekap_m', $data);
}




public function rekap_b()
	{
     $data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('absensi/rekap_b', $data);
	}

  
  
  
  

  public function upload_img($value)
	{
		$kode = round(microtime(true) * 1000);
		$config['upload_path'] = './image/';
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

  //  public function edit_profil()
  //  {
  //   $this->load->view('absensi/edit_profil');
  //  }



  ///// aksi profil
    public function aksi_profil()
    {
        $images = $this->upload_img('image');
        if ($images [0] == false) {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $data = [
              'foto' => 'User.png', // Ganti 'foto' menjadi 'image'
              'email' => $email,
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];

            
            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan Konfirmasi password harus sama');
                    redirect(base_url('absensi/profil'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->m_model->ubah_data('admin', $data, ['id' => $this->session->userdata('id')]);
            
            if ($update_result) {
                redirect(base_url('absensi/profil'));
            } else {
                redirect(base_url('absensi/profil'));
            }
        } else {
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $data = [
                'foto' => $image[1],
                'email' => $email,
                'username' => $username,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
            ];
            if (!empty($password_baru)) {
                if ($password_baru === konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan Konfirmasi password harus sama');
                    redirect(base_url('absensi/profil'));
                }
            }
            $this->session->set_userdata($data);
            $update_result = $this->m_model->update('admin', $data, ['id' => $this->session->userdata('id')]);

            if ($update_result) {
                redirect(base_url('absensi/profil'));
              } else {
                redirect(base_url('absensi/profil'));
            }
          }
    }




    





    // public function upload_foto()
    // {
    //     $file = $_FILES['foto']['name'];
    //     $foto_temp = $_FILES['foto']['tmp_name'];
    
    //     // $foto = $this->upload_img('foto');
    //     // Jika ada foto yang diunggah
    //     if ($foto) {
    //         $kode = round(microtime(true) * 100);
    //         $file_name = $kode . '_' . $foto;
    //         $upload_path = './image/' . $file_name;

    //         if (move_uploaded_file($foto_temp, $upload_path)) {
    //             // Hapus foto lama jika ada
    //             $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
    //             if ($old_file && file_exists(' ./image/' . $old_file)) {
    //                 unlink(' ./image/' . $old_file);
    //             }

    //             $data = [
    //                 'foto' => $file_name,
                   
    //             ];
    //         } else {
    //             // Gagal mengunggah foto baru
    //             redirect(base_url('absensi/index'));
    //         }
    //     } else {
    //         // Jika tidak ada foto yang diunggah
    //         $data = [
    //           'foto' => $foto[1],
    //         ];
    //     }

    //     // Eksekusi dengan model ubah_data
    //     $update_result = $this->m_model->ubah_data('admin', $data, array('email' => $this->session->userdata('email')));

    //     if ($update_result) {
    //         $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     Berhasil Merubah Profile
    //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //         </div>');
    //         redirect(base_url('absensi/profil'));
    //     } else {
    //         redirect(base_url('absensi/profil'));
    //     }
    
    // }

    public function profil()
    {         
        $data['user'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();


        $this->load->view('absensi/profil',$data);

    }

    public function upload_image()
    {
      $foto = $this->upload_img('image');
      if ($foto[0] == false) {
        $data = [
          'foto' => 'User.png',
         
         
        ];
        $this->m_model->tambah_data('admin', $data);
        redirect(base_url('absensi/profil'));
      } else {
        $data = [
          'foto' => $foto[1],
         
         
        ];
        $this->m_model->tambah_data('admin', $data);
        redirect(base_url('absensi/profil'));
      }
    }
    

    // public function aksi_update_profil ()
    // {
    //   $foto = $_FILES['foto']['name'];
    //     $foto_temp = $_FILES['foto']['tmp_name'];
    //     $username = $this->input->post('username');
    //     $nama_depan = $this->input->post('nama_depan');
    //     $nama_belakang = $this->input->post('nama_belakang');
    //     // $foto = $this->upload_img('foto');
    //     // Jika ada foto yang diunggah
    //     if ($foto) {
    //         $kode = round(microtime(true) * 900);
    //         $file_name = $kode . '_' . $foto;
    //         $upload_path = './image/' . $file_name;
    
    //         if (move_uploaded_file($foto_temp, $upload_path)) {
    //             // Hapus foto lama jika ada
    //             $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
    //             if ($old_file && file_exists(' ./image/' . $old_file)) {
    //                 unlink(' ./image/' . $old_file);
    //             }
    
    //             $data = [
    //                 'images' => $file_name,
    //                 'username' => $username,
    //                 'nama_depan' => $nama_depan,
    //                 'nama_belakang' => $nama_belakang,
    //             ];
    //         } else {
    //             // Gagal mengunggah foto baru
    //             redirect(base_url('karyawan/dashboard'));
    //         }
    //     } else {
    //         // Jika tidak ada foto yang diunggah
    //         $data = [
    //             'username' => $username,
    //             'nama_depan' => $nama_depan,
    //             'nama_belakang' => $nama_belakang,
    //         ];
    //     }
        
    //     // Eksekusi dengan model ubah_data
    //     $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
        
    //     if ($update_result) {
    //         $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         Berhasil Merubah Profile
    //                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //            </div>');
    //         redirect(base_url('karyawan/akun'));
    //     } else {
    //         redirect(base_url('karyawan/dashboard'));
    //     }
     
    // }



    // // profil
    // public function profile()
    // { $data['title']='Account';
    //  $data['user'] = $this-> m_model->get_by_id('admin' , 'id' ,$this->session->userdata('id') )->result();
    //  $this->load->view('absensi/profile', $data);
    // }

   
   

   



  



    public function pulang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('Y-m-d H:i:s');
        $data = [
            'jam_keluar' => $waktu_sekarang,
            'status' => 'done'
        ];
        $this->m_model->ubah_data('absensi', $data, array('id'=> $id));
        redirect(base_url('absensi/history'));
    }


 // export history
 public function export_absensi()
 {
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();

   $style_col = [
   'font' => ['bold' => true],
   'alignment' => [
     'horizontal' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
     'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
   ],
   'borders' => [
     'top' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'right' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'bottom' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'left' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
   ]
   ];

   $style_row = [
     'alignment' => [
     'vertical' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
     ],
     'borders' => [
     'top' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'right' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'bottom' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
     'left' =>['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
     ]
   ];

   $sheet->setCellValue('A1', "DATA ABSENSI");
   $sheet->mergeCells('A1:E1');
   $sheet->getStyle('A1')->getFont()->setBold(true);

   // Head
   $sheet->setCellValue('A3', "NO");
   $sheet->setCellValue('B3', "ID KARYAWAN");
   $sheet->setCellValue('C3', "KEGIATAN");
   $sheet->setCellValue('D3', "DATE");
   $sheet->setCellValue('E3', "JAM MASUK");
   $sheet->setCellValue('F3', "JAM KELUAR");
   $sheet->setCellValue('G3', "KATERANGAN IZIN");

   $sheet->getStyle('A3')->applyFromArray($style_col);
   $sheet->getStyle('B3')->applyFromArray($style_col);
   $sheet->getStyle('C3')->applyFromArray($style_col);
   $sheet->getStyle('D3')->applyFromArray($style_col);
   $sheet->getStyle('E3')->applyFromArray($style_col);
   $sheet->getStyle('F3')->applyFromArray($style_col);
   $sheet->getStyle('G3')->applyFromArray($style_col);

   // Get data from databse
   $data_absensi = $this->m_model->get_data('absensi')->result();

   $no = 1;
   $numrow = 4;
   foreach ($data_absensi as $data) {
     $sheet->setCellValue('A'.$numrow, $data->id);
     $sheet->setCellValue('B'.$numrow, $data->id_karyawan);
     $sheet->setCellValue('C'.$numrow, $data->kegiatan);
     $sheet->setCellValue('D'.$numrow, $data->date);
     $sheet->setCellValue('E'.$numrow, $data->jam_masuk);
     $sheet->setCellValue('F'.$numrow, $data->jam_keluar);
     $sheet->setCellValue('G'.$numrow, $data->keterangan_izin);

     $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
     $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);

     $no++;
     $numrow++;
   }

   $sheet->getColumnDimension('A')->setWidth(5);
   $sheet->getColumnDimension('B')->setWidth(25);
   $sheet->getColumnDimension('C')->setWidth(25);
   $sheet->getColumnDimension('D')->setWidth(20);
   $sheet->getColumnDimension('E')->setWidth(30);
   $sheet->getColumnDimension('F')->setWidth(20);
   $sheet->getColumnDimension('G')->setWidth(20);

   $sheet->getDefaultRowDimension()->setRowHeight(-1);

   $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

   $sheet->setTitle("LAPORAN DATA ABSENSI");

   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment; filename="ABSENSI.xlsx"');
   header('Cache-Control: max-age=');

   $writer = new Xlsx($spreadsheet);
   $writer->save('php://output');
 }



public function tampilan()
{
  $this->load->view('absensi/tampilan');
}


public function logout()
{
    $this->session->sess_destroy();
    redirect(base_url('auth/login'));
}





















// public function edit_profile()
// {
//     $password_baru = $this->input->post('password_baru');
//     $konfirmasi_password = $this->input->post('konfirmasi_password');
//     $email = $this->input->post('email');
//     $username = $this->input->post('username');
//     $nama_depan = $this->input->post('nama_depan');
//     $nama_belakang = $this->input->post('nama_belakang');
// {
// $password_lama = $this->input->post('password_lama');
// $password_baru = $this->input->post('password_baru');
// $konfirmasi_password = $this->input->post('konfirmasi_password');
// $email = $this->input->post('email');
// $username = $this->input->post('username');
// $nama_depan = $this->input->post('nama_depan');
// $nama_belakang = $this->input->post('nama_belakang');

//     $data = array(
//         'email' => $email,
//         'username' => $username,
//         'nama_depan' => $nama_depan,
//         'nama_belakang' => $nama_belakang,
//     );
// $data = array(
//   'email' => $email,
//   'username' => $username,
//   'nama_depan' => $nama_depan,
//   'nama_belakang' => $nama_belakang,
// );

//     if (!empty($password_baru)) {
//         if ($password_baru === $konfirmasi_password) {
//             $data['password'] = md5($password_baru);
//             $this->session->set_flashdata('ubah_password', 'Berhasil mengubah password');
//         } else {
//             $this->session->set_flashdata('kesalahan_password', 'Password baru dan Konfirmasi password tidak sama');
//             redirect(base_url('karyawan/profile'));
// $stored_password = $this->m_model->getPasswordById($this->session->userdata('id')); // Ganti dengan metode sesuai dengan struktur database Anda
//     if (md5($password_lama) != $stored_password) {
//         $this->session->set_flashdata('kesalahan_password_lama', 'Password lama yang dimasukkan salah');
//         redirect(base_url('karyawan/profile'));
//     } else {
//         if (!empty($password_baru)) {
//             if ($password_baru === $konfirmasi_password) {
//                 $data['password'] = md5($password_baru);
//                 $this->session->set_flashdata('ubah_password', 'Berhasil mengubah password');
//             } else {
//                 $this->session->set_flashdata('kesalahan_password', 'Password baru dan Konfirmasi password tidak sama');
//                 redirect(base_url('karyawan/profile'));
//             }
//         }
//     }

//     $this->session->set_userdata($data);
//     $update_result = $this->m_model->update_data('users', $data, array('id' => $this->session->userdata('id')));
// $this->session->set_userdata($data);
// $update_result = $this->m_model->update_data('users', $data, array('id' => $this->session->userdata('id')));

//     if ($update_result) {
//         $this->session->set_flashdata('update_akun', 'Data berhasil diperbarui');
//         redirect(base_url('karyawan/profile'));
//     } else {
//         $this->session->set_flashdata('gagal_update', 'Gagal memperbarui data');
//         redirect(base_url('karyawan/profile'));
//     }
// }
// if ($update_result) {
//   $this->session->set_flashdata('update_user', 'Data berhasil diperbarui');
//   redirect(base_url('karyawan/profile'));
// } else {
//   $this->session->set_flashdata('gagal_update', 'Gagal memperbarui data');
//   redirect(base_url('karyawan/profile'));
// }
// }
// }
// }

// public function edit_image()
// {
//     $image = $_FILES['image']['name'];
//     $image_temp = $_FILES['image']['tmp_name'];
//     // Jika ada image yang diunggah
//     if ($image) {
//         $kode = round(microtime(true) * 1000);
//         $file_name = $kode . '_' . $image;
//         $upload_path = './images/user/' . $file_name;
//         $this->session->set_flashdata('berhasil_ubah_foto', 'Foto berhasil diperbarui.');
//         if (move_uploaded_file($image_temp, $upload_path)) {
//             // Hapus image lama jika ada
//             $old_file = $this->m_model->get_karyawan_image_by_id($this->input->post('id'));
//             if ($old_file && file_exists('./images/user/' . $old_file)) {
//                 unlink('./images/user/' . $old_file);
//             }
//             $data = [
//                 'image' => $file_name
//             ];
//         } else {
//             // Gagal mengunggah image baru
//             redirect(base_url('karyawan/ubah_image/' . $this->input->post('id')));
//         }
//     } else {
//         // Jika tidak ada image yang diunggah
//         $data = [
//             'image' => 'User.png'
//         ];
//     }
//     // Eksekusi dengan model ubah_data
//     $eksekusi = $this->m_model->ubah_data('users', $data, array('id' => $this->input->post('id')));
//     if ($eksekusi) {
//         redirect(base_url('karyawan/profile'));
//     } else {
//         redirect(base_url('karyawan/ubah_image/' . $this->input->post('id')));
//     }
//   }
  

public function aksi_edit_foto()
	{
		$foto = $this->upload_img('foto');
		if ($foto[0] == false) {
			$data = [
				'images' => 'User.png',
				
			];
			$this->m_model->tambah_data('admin', $data);
			redirect(base_url('absensi/profil'));
		} else {
			$data = [
				'images' => $foto[1],
			
			];
			$this->m_model->tambah_data('admin', $data);
			redirect(base_url('absensi/profil'));
		}
	}



















  public function ubah_password()
  {
  
      $password_lama = $this->input->post('password_lama', true);

      $user = $this->m_model->getWhere('admin', ['id' => $this->session->userdata('id')])->row_array();

      if (md5($password_lama) === $user['password']) {
          $password_baru = $this->input->post('password_baru', true);
          $konfirmasi_password = $this->input->post('konfirmasi_password', true);

          // Pastikan password baru dan konfirmasi password sama
          if ($password_baru === $konfirmasi_password) {
              // Update password baru ke dalam database
              $data = ['password' => md5($password_baru)];
              $this->m_model->ubah_data('admin', $data, ['id' => $this->session->userdata('id')]);

              $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Merubah Password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                      redirect(base_url('absensi/profil'));
          } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Baru dan Konfirmasi Password Tidak Cocok<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                  redirect(base_url('absensi/profil'));
          }
      } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Anda Salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>');
          }            redirect(base_url('absensi/profil'));
          redirect(base_url('absensi/profil'));
      }

      







    // Tambah Siswa
	public function tambah_karyawan()
	{
		$data['karyawan']=$this->m_model->get_data('karyawan')->result();
		$this->load->view('absensi/tambah_karyawan', $data);
	}
	
	

	public function aksi_tambah_karyawan()
	{
		$foto = $this->upload_img('foto');
		if ($foto[0] == false) {
			$data = [
				'foto' => 'User.png',
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'status' =>$this->input->post('status'),
			];
			$this->m_model->tambah_data('siswa', $data);
			redirect(base_url('absensi/karyawan'));
		} else {
			$data = [
				'foto' => $foto[1],
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'status' =>$this->input->post('status'),
			];
			$this->m_model->tambah_data('karyawan', $data);
			redirect(base_url('absensi/karyawan'));
		}
	}




























}
?>