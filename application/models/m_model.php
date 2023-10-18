<?php

class M_model extends CI_Model{
    function get_data($table){
        return $this->db->get($table);
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data); 
    }
    
    // public function delete($table, $field, $id)
    // {
    //     $data=$this->db->delete($table, array($field => $id));
    //     return $data;
    // }
  
     
    public function get_by_id($tabel, $id_column)
    {
        $data=$this->db->where($id_column)->get($tabel);
        return $data;
    }
    public function ubah_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }


  
    public function get_by_akun($tabel, $id_column)
    {
        $data=$this->db->where($id_column)->get($tabel);
        return $data;
    }
    function tambah_data($table, $data)

    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function register($data) {
        $this->db->insert('admin', $data);
    }
    
    public function delete_pembayaran($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }
    
    
    // public function ubah_data($tabel, $data, $where)
    // {
    //     $data=$this->db->update($tabel, $data, $where);
    //     return $this->db->affected_rows();
    // }

    // public function get_by_id($tabel, $id_column)
    // {
    //     $data=$this->db->where($id_column)->get($tabel);
    //     return $data;
    // }
    // public function ubah_data($tabel, $data, $where)
    // {
    //     $data=$this->db->update($tabel, $data, $where);
    //     return $this->db->affected_rows();
    // }


  
    // public function get_by_akun($tabel, $id_column)
    // {
    //     $data=$this->db->where($id_column)->get($tabel);
    //     return $data;
    // }
  
    // import
    public function get_by_nisn($nisn)
    {
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('nisn', $nisn);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_siswa;

        } else {
            return false;
        }
    }

    public function delete_karyawan($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }
    public function delete_absensi($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }
    // public function get_siswa() {
        public function aksi_ubah_profil($table, $field, $id)
        {
            $data=$this->db->aksi_ubah_profil($table, array($field => $id));
            return $data;
        }
        
    //     $this->db->select('karyawan.*, usename, email, nama_depan, nama_belakang, status');
            
    //     // Mengatur sumber data untuk query dari tabel karyawan
    //     $this->db->from('karyawan');
        
    //     // Menggunakan metode join untuk menggabungkan tabel karyawan dengan tabel kelas
    //     // Berdasarkan kolom "id_kelas" yang ada di kedua tabel
    //     // 'left' mengindikasikan jenis join yang digunakan (left join)
    //     $this->db->join('kelas', 'karyawan.username = email , nama_depan, nama_belakang, status', 'left');
    //     // $this->db->join('sekolah', 'kelas.id_sekolah = sekolah.id', 'left');
        
    //     // Menjalankan query
    //     $query = $this->db->get();
        
    //     // Mengembalikan hasil query dalam bentuk array objek
    //     return $query->result();
    // }



    public function getlast($table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
      }
      // izin
    public function get($table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row();
    }


// // harian
// public function get_harian()
// { 
//       $this->db->select('id, id_karyawan,kegiatan, date, jam_masuk, jam_keluar, keterangan_izin, status');
//       $this->db->from('absensi');
//       $this->db->join('id', 'id_karyawan','kegiatan', 'date', 'jam_masuk', 'jam_keluar', 'keterangan_izin', 'status');
//       $this->db->where('date', date('Y-m-d'));
//       $db = $this->db->get();
//       return $db->result(); 
// }


public function getAbsensiLast7Days() {
    $this->load->database();
    $end_date = date('Y-m-d');
    $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));        
    $query = $this->db->select('date, kegiatan, jam_masuk, jam_keluar, keterangan_izin, status, COUNT(*) AS total_absences')
                      ->from('absensi')
                      ->where('date >=', $start_date)
                      ->where('date <=', $end_date)
                      ->group_by('date, kegiatan, jam_masuk, jam_keluar, keterangan_izin, status')
                      ->get();
    return $query->result_array();
}




public function getHarian($date) {        
    $query = $this->db->select('date, kegiatan, jam_masuk, jam_keluar, keterangan_izin, status, COUNT(*) AS total_absences')
                      ->from('absensi')
                      ->where('date', date('Y-m-d'))
                      ->get();
    return $query->result_array();
}






public function getAbsensiMinggu($date) {       
    $query = $this->db->select('date, kegiatan, jam_masuk, jam_keluar, keterangan_izin, status, COUNT(*) AS total_absences')
                      ->from('absensi')
                      ->where('date >=', $start_date)
                      ->where('date <=', $end_date)
                      ->get();
    return $query->result_array();
}



public function getbulanan($bulan)
{
    $start_date = date('Y-m-d');
    $query = $this->db->select('date, kegiatan, jam_masuk, jam_keluar, keterangan_izin, status, COUNT(*) AS total_absences')
    ->from('absensi')
    ->where('date >=', $start_date)
    ->get();
return $query->result_array();
}





public function get_foto_by_id($id)
{
    $this->db->select('images');
    $this->db->from('admin');
    $this->db->where('id', $id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->f;
    } else {
        return false;
    }
}

}
