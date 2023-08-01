<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class model_buku extends CI_Model{

    public function get_all_buku()
    {
        //return $this->db->get('tbl_buku');
        $this->db->select('*');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_penerbit', 'tbl_penerbit.kd_penerbit = tbl_buku.kd_penerbit');
        $query = $this->db->get();

        return $query;
    }
    
    public function get_buku_by_kode($kode)
    {
        return $this->db->get_where('tbl_buku', array('kd_buku' => $kode));
    }

    public function simpan_buku($data)
    {
        $this->db->insert('tbl_buku', $data);
    }

    public function update_buku($data, $kode)
    {
        $this->db->where('kd_buku', $kode);
        $this->db->update('tbl_buku', $data);
    }

    public function hapus_buku($kode)
    {
        $this->db->where('kd_buku', $kode);
        $this->db->delete('tbl_buku');
    }

    public function get_update_buku($kode)
    {
        return $this->db->get_where('tbl_buku', array('kd_buku'=>$kode));
    }
}