<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_tagihan extends CI_Controller {

	public function __construct() {
    parent::__construct();
        if ($this->session->userdata('login')!=TRUE) {
             $this->session->set_flashdata('message','
                <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                  Kamu Harus Login Terlebih dahulu
                  <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('user/login','refresh');
        }
        elseif ($this->session->userdata('id_level')==TRUE) {
            redirect('dashboard_admin','refresh');
        }

        $this->load->model('m_tagihan','tagihan');
	 }

	public function index()
	{
    $data['DataTagihan'] = $this->tagihan->getDataLaporanTagihan();
		$data['judul'] = 'PPOB | Generate Laporan Tagihan Pelanggan';
    $data['konten'] = 'user/v_laporan_tagihan';
		$this->load->view('components/layouts/v_template', $data);
	}

}
