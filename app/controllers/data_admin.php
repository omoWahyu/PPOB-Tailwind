<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_admin extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }
       $this->load->model('m_data_admin','admin');
  }

   public function index()
   {
     $data['konten'] = 'admin/v_admin';
     $data['judul'] = 'PPOB | Halaman Data Admin';
     $data['DataAdmin'] = $this->admin->getDataAdmin();
     $data['DataLevel'] = $this->admin->getDataLevel();
	$this->load->view('components/layouts/v_template', $data);
   }

   public function tambah_admin()
  {
       $this->admin->tambah_admin();
       $this->session->set_flashdata('message', '
          <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
               Berhasil Menambahkan Admin
               <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
       redirect('data_admin');
  }

  public function detail_admin($id)
  {
       $data = $this->admin->detail_admin($id);
       echo json_encode($data);
  }

  public function edit_admin()
  {
       $this->admin->edit_admin();
       $this->session->set_flashdata('message', '
          <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
               Berhasil Mengubah Data Admin
               <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
       redirect('data_admin');
  }

  public function hapus_admin()
  {
       $this->admin->hapus_admin();
       $this->session->set_flashdata('message', '
          <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
               Berhasil Menghapus Admin
               <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
       redirect('data_admin');
  }


}
