<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_Controller {

  public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
				$this->session->set_flashdata('pesan_gagal','Anda Harus Login Dahulu');
			redirect('admin/login','refresh');
		}
		elseif ($this->session->userdata('id_level')==FALSE) {
			redirect('dashboard','refresh');
		}

		$this->load->model('m_dashboard_admin', 'dashboard');
   }

   public function index()
   {
		// Set Lokalisasi Menjadi indonesia
		setlocale(LC_ALL, 'IND');
		$data['DataPembayaran'] = count($this->dashboard->getDataPembayaran());
		$data['DataPembayaranLunas'] = count($this->dashboard->getDataPembayaranLunas());
		$data['DataPembayaranBelumLunas'] = count($this->dashboard->getDataPembayaranBelumLunas());
		$data['DataSemuaPembayaran'] = count($this->dashboard->getDataPembayaranSemua());
		$data['DataSemuaPembayaranLunas'] = count($this->dashboard->getDataPembayaranSemuaLunas());
		$data['DataSemuaPembayaranBelumLunas'] = count($this->dashboard->getDataPembayaranSemuaBelumLunas());
		$data['BulanIni'] = strftime("%B");
		$data['judul'] = 'Halaman Dashboard Admin';
		$data['konten'] = 'admin/v_dashboard';
		$this->load->view('components/layouts/v_template', $data);
   }

   public function getTagihan()
   {
		$data = $this->dashboard->getDataPembayaranSemua();
		echo json_encode($data);
   }



}
