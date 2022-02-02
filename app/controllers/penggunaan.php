<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penggunaan extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_penggunaan','penggunaan');
  }

  public function index()
    {
        $data['DataPelanggan'] = $this->penggunaan->getDataPelanggan();
        $data['DataTarif'] = $this->penggunaan->getDataTarif();
        $data['judul'] = "PPOB | Halaman Penggunaan Listrik";
        $data['konten'] = "admin/v_penggunaan";
        $this->load->view('components/layouts/v_template', $data);
    }

   public function tambah_penggunaan()
   {
      if($this->penggunaan->cek_penggunaan()==TRUE){
          $this->session->set_flashdata('message', '
            <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Tagihan Bulan ini sudah ada
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
       }
       else{
        $proses=$this->penggunaan->tambah_penggunaan();
        if($proses){
            $this->session->set_flashdata('message', '
                <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                    Penggunaan Berhasil Ditambahkan
                    <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } elseif($proses == false) {
            $this->session->set_flashdata('message', '
                <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                  Meter Akhir tidak dapat lebih besar dari meter awal
                  <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }else {
            $this->session->set_flashdata('message', '
                <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                  Penggunaan Gagal ditambahkan
                  <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }
      }
      redirect('penggunaan');
   }

  public function get_data_pelanggan($id){
      $data=$this->penggunaan->data_pelanggan($id);
      echo json_encode($data);
  }

  public function detail_penggunaan($id)
  {
      $data['DataPenggunaan'] = $this->penggunaan->getDataPenggunaan($id);
      $data['judul'] = "PPOB | Halaman Data Detail Penggunaan";
      $data['konten'] = "admin/v_penggunaan_detail";
      $this->load->view('components/layouts/v_template', $data);
  }

  public function data_penggunaan($id){
      $data=$this->penggunaan->data_penggunaan($id);
      echo json_encode($data);
  }

  public function data_tagihan($id){
      $data=$this->penggunaan->data_tagihan($id);
      echo json_encode($data);
  }

  public function data_tagihan_detail($id){
      $data=$this->penggunaan->data_tagihan_detail($id);
      echo json_encode($data);
  }

  public function edit_penggunaan(){
      $data=$this->penggunaan->edit_penggunaan();
      echo json_encode($data);
      $this->session->set_flashdata('message', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil mengubah Penggunaan Pelanggan
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('penggunaan/detail_penggunaan/'.$this->input->post('id_pelanggan'));
  }

  public function detail_tagihan($id){
    $data['DataTagihan'] = $this->penggunaan->getDataTagihan($id);
    $data['DataTarif'] = $this->penggunaan->getDataTarif();
    $data['judul'] = "PPOB | Halaman Data Tagihan Pelanggan";
    $data['konten'] = "admin/v_tagihan";
    $this->load->view('components/layouts/v_template', $data);
  }

  public function hapus_tagihan(){
    $this->db->where('id_tagihan', $this->input->post('id_tagihan'));
    $this->db->delete('tagihan');

    $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'));
    $this->db->delete('penggunaan');

    $this->session->set_flashdata('message', '
        <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            Berhasil Menghapus Penggunaan Pelanggan
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    redirect('penggunaan');
  }

}
