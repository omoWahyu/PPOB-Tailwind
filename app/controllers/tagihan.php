<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagihan extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 if ($this->session->userdata('login')!=TRUE) {
				$this->session->set_flashdata('pesan_gagal','
				<div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
					Harus Login terlebih dahulu
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
    $data['DataTagihan'] = $this->tagihan->getDataTagihan();
		$data['judul'] = 'PPOB | Halaman Tagihan Pelanggan';
    $data['konten'] = 'user/v_tagihan';
		$this->load->view('components/layouts/v_template', $data);
	}

    public function tambah_tagihan(){
        $data=$this->pelanggan->tambah_pelanggan();
        $this->session->set_flashdata('message', '
            <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                Berhasil Menambahkan Data Pelanggan
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('data_pelanggan');
    }

	public function upload_bukti()
	{
	    $config['upload_path'] = './assets/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '20000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('bukti')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('tagihan','refresh');
			}
			else{
				$update=$this->tagihan->update_bayar();
				if($update == TRUE){
					$this->session->set_flashdata('pesan_sukses', '
						<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Berhasil Menggunggah Bukti Bayar
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				} else {
					$this->session->set_flashdata('pesan_gagal', '
						<div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Gagal Mengunggah Bukti
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				}
				redirect('tagihan','refresh');
			}
	}

}
