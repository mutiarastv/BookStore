<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class model_penerbit extends CI_Model{
    public function get_all_penerbit()
    {
        return $this->db->get('tbl_penerbit');
        // $this->db->select('*');
        // $this->db->from('tbl_penerbit');
        // $query = $this->db->get(); 

        // return $query;
    }
    public function simpan_penerbit($data)
    {
        $this->db->insert('tbl_penerbit', $data);
    }

    public function hapus_penerbit($kode)
    {
        $this->db->where('kd_penerbit', $kode);
        $query = $this->db->get('tbl_buku');

        if ($query->num_rows()>0){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Gagal Dihapus!
          </div>');
        }else {
            $this->db->where('kd_penerbit', $kode);
            $this->db->delete('tbl_penerbit');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
          </div>');
        } 
    }

    public function get_penerbit_by_kode($kode)
    {
        return $this->db->get_where('tbl_penerbit', array('kd_penerbit' => $kode));
    }

    public function update_penerbit($data, $kode)
    {
        $this->db->where('kd_penerbit', $kode);
        $this->db->update('tbl_penerbit', $data);
    }
}