<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class level extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_level','level');
  }


	 public function index()
	 {
			 $data['DataLevel'] = $this->level->getDataLevel();
			 $data['judul'] = "PPOB | Halaman Data Level Admin";
			 $data['konten'] = "admin/v_level";
			 $this->load->view('components/layouts/v_template', $data);
	 }

	 public function detail_level($id)
	 {
				$data = $this->level->detail_level($id);
				echo json_encode($data);
	 }


	 public function tambah_level()
	 {
				$this->level->tambah_level();
				$this->session->set_flashdata('message', '
					<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
						Berhasil Menambahkan Level Admin
						<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('level');
	 }

	 public function edit_level()
	 {
				$this->level->edit_level();
				$this->session->set_flashdata('message', '
					<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
						Berhasil Mengubah Level Admin
						<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('level');
	 }

	 public function hapus_level()
	 {
				$this->level->hapus_level();
				$this->session->set_flashdata('message', '
					<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
						Berhasil Menghapus Level Admin
						<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('level');
	 }



}
