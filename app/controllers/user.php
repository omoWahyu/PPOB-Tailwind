<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 $this->load->model('m_user','user');
	}

	public function login()
	{
		if ($this->session->userdata('login')==TRUE){
				redirect('dashboard','refresh');
		}
		else{
			$data = array(
				'title' => 'User Login', // Judul Halaman Pada Browser
				'title_head' => 'Log In dan gunakan Aplikasi', // Judul Halaman pada Form
				'URL' => 'user/proses_login', //Action Halaman
				'regist' => true, // Boolean
				'min_psl' => 6 // Minimal Password Length
			);
			 $data['DataTarif'] = $this->user->getDataTarif();
			//  $this->load->view('components/layouts/v_header';
			 $this->load->view('components/parts/v_login',$data);
			//  $this->load->view('components/layouts/v_footer');
		}
	}

	public function proses_login(){
            $this->form_validation->set_rules('username','username', 'trim|required');
            $this->form_validation->set_rules('password','password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
               if($this->user->get_login()->num_rows()>0){
                   $data=$this->user->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'nama_pelanggan'=>$data->nama_pelanggan,
                        'id_pelanggan'=>$data->id_pelanggan,
                        'id_tarif'=>$data->id_tarif
                    );
                    $this->session->set_userdata($array);
                    $this->session->set_flashdata('pesan_sukses','
						<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Berhasil Masuk ke Akun
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
                    redirect('dashboard','refresh');
                }else{
                    $this->session->set_flashdata('message','
						<div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Username atau Password Salah
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
                    redirect('user/login','refresh');
                }
            }else{
                $this->session->set_flashdata('message','
						<div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							'.validation_errors().'
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
                 redirect('user/login','refresh');
            }
    }

		public function register()
		{
			  $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
				$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
				$this->form_validation->set_rules('nomor_kwh', 'nomor_kwh', 'trim|required');
				$this->form_validation->set_rules('username', 'username', 'trim|required');
			  $this->form_validation->set_rules('password', 'password', 'trim|required');
				$this->form_validation->set_rules('id_tarif', 'id_tarif', 'trim|required');
		 	if ($this->form_validation->run() == TRUE) {

			 if($this->user->registrasi_akun()==TRUE){
				 $this ->session->set_flashdata('message','
						<div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Berhasil Mendaftar, Silahkan Login
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				 redirect('user/login','refresh');
			 }

			 else{
				 $this->session->set_flashdata('message','
						<div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
							Akun gagal Didaftarkan
							<button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>');
				 $this->load->view('user/register','refresh');
			 }
		 }
	 }

	 public function logout()
	 {
		 $this->session->sess_destroy();
		 $this->session->set_flashdata('message','
            <div class="alert bg-orange-300 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                <strong class="mr-1">Logout, </strong>Sampai Jumpa Lain waktu.
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
		 redirect('user/login','refresh');
	 }




}
