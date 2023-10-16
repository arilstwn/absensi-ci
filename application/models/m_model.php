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


}
