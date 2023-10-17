<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_model');
        $this->load->helper('my_helper');
		$this->load->library('upload');
        if ($this->session->userdata('logged_in')!= true && $this->session->userdata('role') != 'index') {
            redirect(base_url().'auth');
        }
	}


	// Rekap harian
	public function rekap_m() {
	  $data['absensi_mingguan'] = $this->m_model->getAbsensiLast7Days();        
	  $this->load->view('admin/rekap_m', $data);
	}
	public function rekap_b()
	{
        $bulan = $this->input->post('bulan');
        $data['absensi_bulanan'] = $this->m_model->getbulanan($bulan);
		$this->load->view('admin/rekap_b', $data);
	}

	public function rekap_harian()
	{
        $bulan = $this->input->post('bulan');
        $data['absensi_harian'] = $this->m_model->getbulanan($bulan);
		$this->load->view('admin/rekap_h', $data);
	}

    public function aksi_bulanan()
	{
		$this->m_model->getAbsensiMinggu('rekap_m', 'id', $id);
		redirect(base_url('admin/rekap/m'));
	}
	public function rekap_h()
	{
        $date=$this->input->post('date');
        $data['absensi_harian'] = $this->m_model->getHarian($date);
		$this->load->view('admin/rekap_h', $data);
	}


	public function rekap_mingguan() {
		$data['absensi'] = $this->m_model->getAbsensiLast7Days();        
		$this->load->view('pages/admin/rekap_mingguan', $data);
	}

	
	 // export 
	 public function export_mingguan()
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
		 $sheet->setCellValue('B3', "username");
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
		 $data_karyawan = $this->m_model->get_data('rekap_b')->result();
	
		 $no = 1;
		 $numrow = 4;
		 foreach ($data_karyawan as $data) {
		   $sheet->setCellValue('A'.$numrow, $data->id);
		   $sheet->setCellValue('B'.$numrow, $data->username);
		   $sheet->setCellValue('C'.$numrow, $data->email);
		   $sheet->setCellValue('D'.$numrow, $data->nama_depan);
		   $sheet->setCellValue('E'.$numrow, $data->nama_belakang);
		   $sheet->setCellValue('F'.$numrow, $data->status);
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
		 header('Content-Disposition: attachment; filename=".xlsx"');
		 header('Cache-Control: max-age=');
	
		 $writer = new Xlsx($spreadsheet);
		 $writer->save('php://output');
	 }
	
  
//  Export bulanan
	 public function export_rekap_b()
     {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $style_col = [
                'font' => [ 'bold' => true ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                    'top' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'right' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'bottom' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'left' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ]
                ]
            ];

            $style_row = [
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                    'top' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'right' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'bottom' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                    'left' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ]
                ]
            ];

            $sheet->setCellValue( 'A1', 'DATA KARYAWAN' );
            $sheet->mergeCells( 'A1:E1' );
            $sheet->getStyle( 'A1' )->getFont()->setBold( true );

            // Head
            $sheet->setCellValue( 'A3', 'NO' );
            $sheet->setCellValue( 'B3', 'ID KARYAWAN' );
            $sheet->setCellValue( 'C3', 'KEGIATAN' );
            $sheet->setCellValue( 'D3', 'DATE' );
            $sheet->setCellValue( 'E3', 'JAM MASUK' );
            $sheet->setCellValue( 'F3', 'JAM KELUAR' );
            $sheet->setCellValue( 'G3', 'KETERANGAN IZIN' );
            $sheet->setCellValue( 'H3', 'STATUS' );

            $sheet->getStyle( 'A3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'B3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'C3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'D3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'E3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'F3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'G3' )->applyFromArray( $style_col );
            $sheet->getStyle( 'H3' )->applyFromArray( $style_col );

            // Get data from database
			$bulan = $this->input->post('bulan');
			$data_absensi = $this->m_model->get_data('absensi')->result();

            $no = 1;
            $numrow = 4;
            foreach ( $data as $dataa ) {
                $sheet->setCellValue( 'A'.$numrow, $no );
                $sheet->setCellValue( 'B'.$numrow, $dataa->id );
                $sheet->setCellValue( 'C'.$numrow, $dataa->id_karyawan  );
                $sheet->setCellValue( 'D'.$numrow, $dataa->kegiatan  );
                $sheet->setCellValue( 'E'.$numrow, $dataa->date  );
                $sheet->setCellValue( 'F'.$numrow, $dataa->jam_masuk  );
                $sheet->setCellValue( 'G'.$numrow, $dataa->jam_keluar );
                $sheet->setCellValue( 'H'.$numrow, $dataa->keterangan_izin  );
                $sheet->setCellValue( 'I'.$numrow, $dataa->status );

                $sheet->getStyle( 'A'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'B'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'C'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'D'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'E'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'E'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'G'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'H'.$numrow )->applyFromArray( $style_row );
                $sheet->getStyle( 'I'.$numrow )->applyFromArray( $style_row );

                $no++;
                $numrow++;
            }

            $sheet->getColumnDimension( 'A' )->setWidth( 5 );
            $sheet->getColumnDimension( 'B' )->setWidth( 25 );
            $sheet->getColumnDimension( 'C' )->setWidth( 25 );
            $sheet->getColumnDimension( 'D' )->setWidth( 20 );
            $sheet->getColumnDimension( 'E' )->setWidth( 10 );
            $sheet->getColumnDimension( 'F' )->setWidth( 25 );
            $sheet->getColumnDimension( 'G' )->setWidth( 25 );
            $sheet->getColumnDimension( 'H' )->setWidth( 15 );
            $sheet->getColumnDimension( 'I' )->setWidth( 15 );

            $sheet->getDefaultRowDimension()->setRowHeight( -1 );

            $sheet->getPageSetup()->setOrientation( \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );

            $sheet->setTitle( 'LAPORAN DATA BULANAN' );

            header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
            header( 'Content-Disposition: attachment; filename="absensi.xlsx"' );
            header( 'Cache-Control: max-age=0' );

            $writer = new Xlsx( $spreadsheet );
            $writer->save( 'php://output' );
   }


//    public function export_minggu() {

// 	// Load autoloader Composer
// 	require 'vendor/autoload.php';
	
// 	$spreadsheet = new Spreadsheet();

// 	// Buat lembar kerja aktif
//    $sheet = $spreadsheet->getActiveSheet();
// 	// Data yang akan diekspor (contoh data)
// 	$data = $this->m_model->getAbsensiLast7Days();
	
// 	// Buat objek Spreadsheet
// 	$headers = ['NO','NAMA KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
// 	$rowIndex = 1;
// 	foreach ($headers as $header) {
// 		$sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
// 		$rowIndex++;
// 	}
	
// 	// Isi data dari database
// 	$rowIndex = 2;
// 	$no = 1;
// 	foreach ($data as $rowData) {
// 		$columnIndex = 1;
// 		$nama_karyawan = '';
// 		$kegiatan = '';
// 		$tanggal = '';
// 		$jam_masuk = '';
// 		$jam_keluar = '';
// 		$izin = ''; 
// 		foreach ($rowData as $cellName => $cellData) {
// 			if ($cellName == 'kegiatan') {
// 			   $kegiatan = $cellData;
// 			} else if($cellName == 'id_karyawan') {
// 				$nama_karyawan = tampil_id_karyawan($cellData);
// 			} elseif ($cellName == 'date') {
// 				$tanggal = $cellData;
// 			} elseif ($cellName == 'jam_masuk') {
// 				if($cellData == NULL) {
// 					$jam_masuk = '-';
// 				}else {
// 					$jam_masuk = $cellData;
// 				}
// 			} elseif ($cellName == 'jam_keluar') {
// 				if($cellData == NULL) {
// 					$jam_keluar = '-';
// 				}else {
// 					$jam_keluar = $cellData;
// 				}
// 			} elseif ($cellName == 'keterangan_izin') {
// 				$izin = $cellData;
// 			}
	
// 			// Anda juga dapat menambahkan logika lain jika perlu
			
// 			// Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
// 			$columnIndex++;
// 		}
// 		// Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
// 		// Anda dapat mengisinya ke dalam lembar kerja Excel di sini
// 		$sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
// 		$sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
// 		$sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
// 		$sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
// 		$sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
// 		$sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_keluar);
// 		$sheet->setCellValueByColumnAndRow(7, $rowIndex, $izin);
// 		$no++;
	
// 		$rowIndex++;
// 	}
// 	// Auto size kolom berdasarkan konten
// 	foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
// 		$sheet->getColumnDimension($col)->setAutoSize(true);
//             }
            
//             // Set style header
//             $headerStyle = [
//                 'font'=> ['bold' => true],
//             'alignment'=> [
//                 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
//                 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
//             ],
//             ];
//             $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
//             // Konfigurasi output Excel
//             $writer = new Xlsx($spreadsheet);
//             $filename = ' REKAP_MINGGUAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
//             // Set header HTTP untuk mengunduh file Excel
//             header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//             header('Content-Disposition: attachment;filename="' . $filename . '"');
//             header('Cache-Control: max-age=0');
            
//             // Outputkan file Excel ke browser
//             $writer->save('php://output');
            
//         }

/// harian
        public function export_harian() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
            $tanggal = date('Y-m-d'); // Ambil nilai tanggal yang dipilih dari form
            $data = $this->m_model->getharian($tanggal);
            
            // Buat objek Spreadsheet
            $headers = ['NO' ,'KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
            $rowIndex = 1;
            foreach ($headers as $header) {
                $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
                $rowIndex++;
            }
            
            // Isi data dari database
            $rowIndex = 2;
            $no = 1;
            foreach ($data as $rowData) {
                $columnIndex = 1;
                
                $kegiatan = '';
                $tanggal = '';
                $jam_masuk = '';
                $jam_keluar = '';
                $izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
					 } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_keluar') {
                        if($cellData == NULL) {
                            $jam_keluar = '-';
                        }else {
                            $jam_keluar = $cellData;
                        }
                    } elseif ($cellName == 'keterangan_izin') {
                        $izin = $cellData;
                    }
            
                    // Anda juga dapat menambahkan logika lain jika perlu
                    
                    // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                    $columnIndex++;
                }
                // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
                // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $tanggal);
				$sheet->setCellValueByColumnAndRow(4, $rowIndex, $jam_masuk);
                $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_keluar);
                $sheet->setCellValueByColumnAndRow(6, $rowIndex, $izin);
                 $no++;
            
                $rowIndex++;
            }
            // Auto size kolom berdasarkan konten
            foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
            
            // Set style header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment'=> [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
                ],
            ];
            $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
            // Konfigurasi output Excel
            $writer = new Xlsx($spreadsheet);
            $filename = 'REKAP_HARIAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
            // Set header HTTP untuk mengunduh file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            // Outputkan file Excel ke browser
            $writer->save('php://output');
            
        }

		// akhajohoahak mingguan
        public function export_minggu() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
             $data = $this->m_model->getAbsensiLast7Days();
            
            // Buat objek Spreadsheet
            $headers = ['NO' ,'KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
            $rowIndex = 1;
            foreach ($headers as $header) {
                $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
                $rowIndex++;
            }
            
            // Isi data dari database
            $rowIndex = 2;
            $no = 1;
            foreach ($data as $rowData) {
                $columnIndex = 1;
                
                $kegiatan = '';
                $tanggal = '';
                $jam_masuk = '';
                $jam_keluar = '';
                $izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
					 } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_keluar') {
                        if($cellData == NULL) {
                            $jam_keluar = '-';
                        }else {
                            $jam_keluar = $cellData;
                        }
                    } elseif ($cellName == 'keterangan_izin') {
                        $izin = $cellData;
                    }
            
                    // Anda juga dapat menambahkan logika lain jika perlu
                    
                    // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                    $columnIndex++;
                }
                // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
                // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $tanggal);
				$sheet->setCellValueByColumnAndRow(4, $rowIndex, $jam_masuk);
                $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_keluar);
                $sheet->setCellValueByColumnAndRow(6, $rowIndex, $izin);
                 $no++;
            
                $rowIndex++;
            }
            // Auto size kolom berdasarkan konten
            foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
            
            // Set style header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment'=> [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
                ],
            ];
            $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
            // Konfigurasi output Excel
            $writer = new Xlsx($spreadsheet);
            $filename = 'REKAP_MINGGUAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
            // Set header HTTP untuk mengunduh file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            // Outputkan file Excel ke browser
            $writer->save('php://output');
            
        }



/// bulan
		public function export_bulan() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
            $bulan = date('m');; // Ambil nilai bulan yang dipilih dari form
            $data = $this->m_model->getbulanan($bulan);
            
            // Buat objek Spreadsheet
            $headers = ['NO','NAMA KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
            $rowIndex = 1;
            foreach ($headers as $header) {
                $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
                $rowIndex++;
            }
            
            // Isi data dari database
            $rowIndex = 2;
            $no = 1;
            foreach ($data as $rowData) {
                $columnIndex = 1;
                $nama_karyawan = '';
                $kegiatan = '';
                $tanggal = '';
                $jam_masuk = '';
                $jam_keluar = '';
                $izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
                    } else if($cellName == 'id_karyawan') {
                        $nama_karyawan = tampil_id_karyawan($cellData);
                    } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_keluar') {
                        if($cellData == NULL) {
                            $jam_keluar = '-';
                        }else {
                            $jam_keluar = $cellData;
                        }
                    } elseif ($cellName == 'keterangan_izin') {
                        $izin = $cellData;
                    }
					// Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                    $columnIndex++;
                }
                // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
                // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
                $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
                $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_keluar);
                $sheet->setCellValueByColumnAndRow(7, $rowIndex, $izin);
                $no++;
            
                $rowIndex++;
            }
            // Auto size kolom berdasarkan konten
            foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
            
            // Set style header
            $headerStyle =[
                'font'=> ['bold' => true],
                'alignment'=> [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
            ]];
            $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
            // Konfigurasi output Excel
            $writer = new Xlsx($spreadsheet);
            $filename = ' REKAP_BULANAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
            // Set header HTTP untuk mengunduh file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            // Outputkan file Excel ke browser
            $writer->save('php://output');
            
        }
	



		





























		public function export_seluruh() {

            // Load autoloader Composer
            require 'vendor/autoload.php';
            
            $spreadsheet = new Spreadsheet();
    
            // Buat lembar kerja aktif
           $sheet = $spreadsheet->getActiveSheet();
            // Data yang akan diekspor (contoh data)
            $data = $this->m_model->get_data('absensi')->result();
            
            // Buat objek Spreadsheet
            $headers = ['NO','NAMA KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN'];
            $rowIndex = 1;
            foreach ($headers as $header) {
                $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
                $rowIndex++;
            }
            
            // Isi data dari database
            $rowIndex = 2;
            $no = 1;
            foreach ($data as $rowData) {
                $columnIndex = 1;
                $nama_karyawan = '';
                $kegiatan = '';
                $tanggal = '';
                $jam_masuk = '';
                $jam_keluar = '';
                $izin = ''; 
                foreach ($rowData as $cellName => $cellData) {
                    if ($cellName == 'kegiatan') {
                       $kegiatan = $cellData;
                    } else if($cellName == 'id_karyawan') {
                        $nama_karyawan = tampil_id_karyawan($cellData);
                    } elseif ($cellName == 'date') {
                        $tanggal = $cellData;
                    } elseif ($cellName == 'jam_masuk') {
                        if($cellData == NULL) {
                            $jam_masuk = '-';
                        }else {
                            $jam_masuk = $cellData;
                        }
                    } elseif ($cellName == 'jam_keluar') {
                        if($cellData == NULL) {
                            $jam_keluar = '-';
                        }else {
                            $jam_keluar = $cellData;
                        }
                    } elseif ($cellName == 'keterangan_izin') {
                        $izin = $cellData;
                    }
            
                    // Anda juga dapat menambahkan logika lain jika perlu
                    
                    // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                    $columnIndex++;
                }
                // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
                // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
                $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
                $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
                $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
                $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
                $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_keluar);
                $sheet->setCellValueByColumnAndRow(7, $rowIndex, $izin);
                $no++;
            
                $rowIndex++;
            }
            // Auto size kolom berdasarkan konten
            foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }
            
            // Set style header
            $headerStyle = [
                'font'=> ['bold' => true],
            'alignment'=> [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
            ],
            ];
			$sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
            
            // Konfigurasi output Excel
            $writer = new Xlsx($spreadsheet);
            $filename = ' REKAP_KESELURUHAN.xlsx'; // Nama file Excel yang akan dihasilkan
            
            // Set header HTTP untuk mengunduh file Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            
            // Outputkan file Excel ke browser
            $writer->save('php://output');
            
        }
            
                    // Anda juga dapat menambahkan logika lain jika perlu

}	
		 
		 



