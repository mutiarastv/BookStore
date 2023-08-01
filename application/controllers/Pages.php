<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        $data['title'] = "Home";
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
	}

    public function daftar_buku()
	{
        //$data['daftar_buku']= $this->db->get('tbl_buku')->result_array();
		$this->load->model('model_buku');
		$data['daftar_buku']= $this->model_buku->get_all_buku()->result_array();
		$this->load->model('model_penerbit');
		$data['daftar_penerbit']= $this->model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "Daftar Buku";
        $this->load->view('templates/header', $data);
        $this->load->view('daftar_buku', $data);
		$this->load->view('templates/modal');
        $this->load->view('templates/footer');
	}
    public function daftar_penerbit()
	{
		$data['daftar_penerbit']= $this->db->get('tbl_penerbit')->result_array();
        $data['title'] = "Daftar Penerbit";
        $this->load->view('templates/header', $data);
        $this->load->view('daftar_penerbit');
		$this->load->view('templates/modalPenerbit');
        $this->load->view('templates/footer');
	}
	
	public function simpan_buku()
	{
		$data = array(
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_penerbit' => $this->input->post('tahunTerbit'),
			'kd_penerbit' => $this->input->post('Penerbit')
		);
		$this->model_buku->simpan_buku($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  		Data Buku Berhasil Disimpan!
		</div>');
		
		redirect('Pages/daftar_buku');
	}

	public function show_edit_page()
	{
		$this->load->model('model_buku');
		$this->load->model('model_penerbit');
		$kode = $this->uri->segment(3);
		
		//data untuk mengisi inputan sesuai dengan data di database
		$data['daftar_buku']=$this->model_buku->get_buku_by_kode($kode)->row_array();
		//data untuk mengisi pilihan di select
		$data['daftar_penerbit']=$this->model_penerbit->get_all_penerbit()->result_array();
		$data['title']='Daftar Penerbit';
		$this->load->view('templates/header', $data);
        $this->load->view('edit_buku');
        $this->load->view('templates/footer');
	}

	public function update_buku()
	{
		$data = array(
			'judul_buku' => $this->input->post('judulBuku'),
			'tahun_penerbit' => $this->input->post('tahunTerbit'),
			'kd_penerbit' => $this->input->post('Penerbit')
		);
		$kode = $this->input->post('kodeBuku');
		$this->model_buku->update_buku($data, $kode);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  		Data Buku Berhasil Diupdate!
		</div>');

		redirect('Pages/daftar_buku');
	}

	public function hapus_buku()
	{
		$kode = $this->uri->segment(3);
		$this->model_buku->hapus_buku($kode);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
  		Data Buku Berhasil Dihapus!
		</div>');

		redirect('pages/daftar_buku');
	}

	public function simpan_penerbit()
	{
		$data = array(
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit'),
		);
		$this->model_penerbit->simpan_penerbit($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  		Data Penerbit Berhasil Disimpan!
		</div>');
		
		redirect('Pages/daftar_penerbit');
	}

	public function hapus_penerbit()
	{
		$kode = $this->uri->segment(3);
		$this->model_penerbit->hapus_penerbit($kode);
		// $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
  		// Data Penerbit Berhasil Dihapus!
		// </div>');

		redirect('pages/daftar_penerbit');
	}

	public function update_penerbit()
	{
		$data = array(
			'nama_penerbit' => $this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit'),
		
		);
		$kode = $this->input->post('kodePenerbit');
		$this->model_penerbit->update_penerbit($data, $kode);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  		Data Penerbit Berhasil Diupdate!</div');

		redirect('Pages/daftar_penerbit');
	}

	public function show_edit_penerbit()
	{
		$this->load->model('model_penerbit');
		$kode = $this->uri->segment(3);
		
		//data untuk mengisi inputan sesuai dengan data di database
		$data['daftar_penerbit']=$this->model_penerbit->get_penerbit_by_kode($kode)->row_array();
		$data['title']='Daftar Penerbit';
		$this->load->view('templates/header', $data);
        $this->load->view('edit_penerbit');
        $this->load->view('templates/footer');
	}
}
