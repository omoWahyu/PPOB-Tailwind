<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_pembayaran extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('M_laporan_pembayaran','laporan');
  }

  public function index()
  {
        $data['DataPembayaran'] = $this->laporan->getDataPembayaran();
        $data['judul'] = "PPOB | Generate Laporan Pembayaran";
        $data['konten'] = "admin/v_laporan";
        $this->load->view('components/layouts/v_template', $data);
  }

}
