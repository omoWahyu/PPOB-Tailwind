<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class riwayat extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_riwayat','riwayat');
  }

  public function index()
  {
        $data['DataRiwayat'] = $this->riwayat->getDataRiwayat();
        $data['judul'] = "PPOB | Halaman Data Riwayat";
        $data['konten'] = "admin/v_riwayat";
        $this->load->view('components/layouts/v_template', $data);
  }

  public function detail_riwayat($id){
      $data=$this->riwayat->getDetailRiwayat($id);
      echo json_encode($data);
  }

}
