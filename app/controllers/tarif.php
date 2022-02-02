<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarif extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_tarif','tarif');
  }


  public function index()
  {
      $data['DataTarif'] = $this->tarif->getDataTarif();
      $data['judul'] = "PPOB | Data Halaman Tarif";
      $data['konten'] = "admin/v_tarif";
      $this->load->view('components/layouts/v_template', $data);
  }

  public function tambah_tarif()
  {
      if($this->input->post('tambah')){
          $this->tarif->tambah_tarif();
          $this->session->set_flashdata('pesan_sukses', '
            <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Berhasil Menambahkan Tarif
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
          redirect('tarif');
      }
  }

  public function data_tarif($id){
      $data=$this->tarif->data_tarif($id);
      echo json_encode($data);
  }

  public function hapus_tarif()
  {
      $this->tarif->hapus_tarif();
      $this->session->set_flashdata('pesan_sukses', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil Menghapus Tarif
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('tarif');
  }

  public function aktif_tarif()
  {
    $this->tarif->aktif_tarif();
    $this->session->set_flashdata('pesan_sukses', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil Mengaktifkan Tarif
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    redirect('tarif');
  }

  public function nonaktif_tarif()
  {
      $this->tarif->nonaktif_tarif();
      $this->session->set_flashdata('pesan_sukses', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil Menonaktifkan Tarif
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('tarif');
  }

  public function edit_tarif()
  {
      $this->tarif->edit_tarif();
      $this->session->set_flashdata('pesan_sukses', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil Mengubah Tarif
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('tarif');
  }



}
