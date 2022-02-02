<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

  public function __construct() {
       parent::__construct();
       $this->load->model('m_admin','admin');
  }

  public function login()
  {
    if ($this->session->userdata('login')==TRUE) {
        redirect('dashboard_admin','refresh');
    }
    else{
			$data = array(
				'title' => 'Admin Login', // Judul Halaman Pada Browser
				'title_head' => 'Login Sebagai Admin', // Judul Halaman pada Form
				'URL' => 'admin/proses_login', //Action Halaman
				'regist' => false, // Boolean
				'min_psl' => 5 // Minimal Password Length
			);
			 $this->load->view('components/layouts/v_login',$data);
    }
  }


  public function proses_login(){
          $this->form_validation->set_rules('username','username', 'trim|required');
          $this->form_validation->set_rules('password','password', 'trim|required');
          if($this->form_validation->run() ==TRUE){
             if($this->admin->get_login()->num_rows()>0){
                 $data=$this->admin->get_login()->row();
                  $array=array(
                      'login'=> TRUE,
                      'nama_admin'=>$data->nama_admin,
                      'id_admin'=>$data->id_admin,
                      'id_level'=>$data->id_level
                  );
                  $this->session->set_userdata($array);
                  $this->session->set_flashdata('message','
                    <div class="alert bg-teal-400 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                      Berhasil Masuk ke Akun
                      <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                  redirect('dashboard_admin','refresh');
              }else{
                  $this->session->set_flashdata('message','
                    <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                      Username atau Password Salah
                      <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                  redirect('admin/login','refresh');
              }
          }else{
              $this->session->set_flashdata('message','
                <div class="alert bg-rose-500 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
                  '. validation_errors() .'
                  <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
               redirect('admin/login','refresh');
          }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', '
        <div class="alert bg-orange-300 rounded-lg py-5 px-6 mb-3 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
            <strong class="mr-1">Logout, </strong>Sampai Jumpa Lain waktu.
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    redirect('admin/login');
  }


}
