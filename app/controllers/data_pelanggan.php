<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pelanggan extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_pelanggan','pelanggan');
  }


  public function index()
    {
        $data['DataPelanggan'] = $this->pelanggan->getDataPelanggan();
        $data['DataTarif'] = $this->pelanggan->getDataTarif();
        $data['judul'] = "PPOB | Halaman Data Pelanggan";
        $data['konten'] = "admin/v_pelanggan";
        $this->load->view('components/layouts/v_template', $data);
    }

    public function get_data_pelanggan($id){
        $data=$this->pelanggan->data_pelanggan($id);
        echo json_encode($data);
    }

    public function tambah_pelanggan(){
        $data=$this->pelanggan->tambah_pelanggan();
        $this->session->set_flashdata('message', '
            <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Berhasil Menambahkan Data Pelanggan
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('data_pelanggan');
    }

    public function edit_pelanggan()
    {
      $this->pelanggan->edit_pelanggan();
      $this->session->set_flashdata('message', '
            <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Berhasil Mengubah Data Pelanggan
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
      redirect('data_pelanggan');
    }

    public function hapus_pelanggan()
    {
        $this->pelanggan->hapus_pelanggan();
        $this->session->set_flashdata('message', '
            <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Berhasil Menghapus Data Pelanggan
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('data_pelanggan');
    }

}
