<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_pembayaran','pembayaran');
  }

  public function index()
  {
      $data['DataPembayaran'] = $this->pembayaran->getDataPembayaran();
      $data['judul'] = "PPOB | Halaman Data Pembayaran";
      $data['konten'] = "admin/v_pembayaran";
      $this->load->view('components/layouts/v_template', $data);
  }

  public function data_pembayaran($id){
    $data=$this->pembayaran->data_pembayaran($id);
    echo json_encode($data);
  }

  public function konfirmasi_pembayaran(){
      $data=$this->pembayaran->konfirmasi_pembayaran();
      $this->session->set_flashdata('message', '
					<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
						Berhasil Konfirmasi Pembayaran
						<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
      redirect('pembayaran');
  }

  public function tolak_pembayaran(){
    $data=$this->pembayaran->tolak_pembayaran();
    $this->session->set_flashdata('message', '
          <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Pembayaran dibatalkan
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
    redirect('pembayaran');
  }

}
