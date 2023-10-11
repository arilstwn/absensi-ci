<?php

class M_model extends CI_Model{
    function get_data($table){
        return $this->db->get($table);
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data); 
    }
    
    public function delete($table, $field, $id)
    {
        $data=$this->db->delete($table, array($field => $id));
        return $data;
    }
  
     
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


}
