<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
    $data['karyawan'] = $this->m_model->get_data('karyawan')->num_rows();
		$data['absensi'] = $this->m_model->get_data('absensi')->num_rows();
	
    $data['data'] = $this->m_model->get_data('karyawan')->result();
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
    $id_karyawan = $this->session->userdata('id');
    $tanggal_izin = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $izin_terakhir = $this->m_model->get('absensi', array(
        'id_karyawan' => $id_karyawan
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
            'id_karyawan' => $id_karyawan,
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
		$data['karyawan'] = $this->m_model->get_data('karyawan')->num_rows();
		$data['absensi'] = $this->m_model->get_data('absensi')->num_rows();
		$this->load->view('absensi/dasboard',$data);
	}

  
 // profil
 public function profil()
 { $data['title']='Account';
  $data['admin'] = $this-> m_model->get_by_id('admin' , 'id' ,$this->session->userdata('id') )->result();
  $this->load->view('absensi/profil', $data);
 }


  
    public function upload_image()
{  
    $base64_image = $this->input->post('base64_image');
    $binary_image = base64_encode($base64_image);
    $data = array(
      'images' => $binary_image
    );
    $eksekusi = $this->m_model->ubah_data('admin', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('absensi/profil'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
        echo "error gais";
    }
}

// hapus image
public function hapus_image()
{ 
    $data = array(
      'image' => NULL
    );
    
    $eksekusi = $this->m_model->update('admin', $data, array('id'=>$this->session->userdata('id')));
    $eksekusi = $this->m_model->ubah_data('admin', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('project/user'));
      } else {
        $this->session->set_flashdata('error' , 'gagal...');
        echo "error gais";
      }
}
public function ubah_password($id)
{
  $data['admin'] = $this-> m_model->get_by_id('admin' , 'id' , $id)->result();
  $this->load->view('action/ubah_password',$data);
}
public function aksi_ubah_password()
{
    $password_lama = $this->input->post('password_lama', true);
    $password_baru = $this->input->post('password_baru', true);
    $password_baru2 = $this->input->post('password_baru2', true);
    $data = ['email' => $this->session->userdata('email')];
    $query = $this->m_model->getwhere('admin', $data);
    $result = $query->row_array();
    if (md5($password_lama) === $result['password']) {
      if ($password_baru === $password_baru2) {
            $data =  [
                'password' => md5($this->input->post('password_baru')),
            ];
            $eksekusi = $this->m_model->update('admin', $data, array('id'=> $this->session->userdata('id')));
            if($eksekusi) {
                $this->session->set_flashdata('sukses' , 'berhasil');
                redirect(base_url('profile'));
            } else {
                $this->session->set_flashdata('error' , 'gagal...');
                redirect(base_url('profile/ubah_profile/'.$this->session->userdata('id')));
            }
        }else {
            $this->session->set_flashdata('password_baru' , 'Password tidak cocok');
            redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
        }
    } else {
        $this->session->set_flashdata('password_lama' , 'Password lama dengan inputan tidak cocok');
        redirect(base_url('profile/ubah_password/'.$this->session->userdata('id')));
    }
  }

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
    $id_karyawan = $this->session->userdata('id');
    $tanggal_absensi = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $absensi_terakhir = $this->m_model->getlast('absensi', array(
        'id_karyawan' => $id_karyawan
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
            'id_karyawan' => $id_karyawan,
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


















public function edit_profil()
{
  $this->load->view('absensi/edit_profil');
}







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
     $sheet->setCellValue('A3', "ID");
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






}
?>