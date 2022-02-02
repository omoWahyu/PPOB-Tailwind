	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 if ($this->session->userdata('login')!=TRUE) {
						$this->session->set_flashdata('pesan_gagal','Anda Harus Login Dahulu');
					 redirect('user/login','refresh');
			 }
			 elseif ($this->session->userdata('id_level')==TRUE) {
					 redirect('dashboard_admin','refresh');
			 }

			 $this->load->model('m_dashboard','dashboard');
	 }

	public function index()
	{
	  $data['DataTagihan'] = $this->dashboard->getDataTagihan();
		$data['StatusTagihan'] = $this->dashboard->getDataTagihanBulanan();
		$data['JumlahTagihanLunas'] = count($this->dashboard->getDataTagihanLunas());
		$data['JumlahTagihanBelumLunas'] = count($this->dashboard->getDataTagihanBelumLunas());
		$data['judul'] = 'PPOB | Dashboard Pelanggan';
    $data['konten'] = 'user/v_dashboard';
		$this->load->view('components/layouts/v_template', $data);
	}

}
