<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard_admin extends CI_Model {

    public function getDataPembayaran(){
          $dt_penggunaan = $this->db
          ->order_by('id_penggunaan', 'desc')
          ->limit(1)
          ->get('penggunaan')->row();

      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->where('bulan_bayar like','%'.$dt_penggunaan->bulan.'%');
      return $this->db->get()->result();
    }

    public function getDataPembayaranLunas(){
          $dt_penggunaan = $this->db
          ->order_by('id_penggunaan', 'desc')
          ->limit(1)
          ->get('penggunaan')->row();

      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->where('bulan_bayar like','%'.$dt_penggunaan->bulan.'%');
      $this->db->where('status', 'Lunas');
      return $this->db->get()->result();
    }

    public function getDataPembayaranBelumLunas(){
          $dt_penggunaan = $this->db
          ->order_by('id_penggunaan', 'desc')
          ->limit(1)
          ->get('penggunaan')->row();

      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->where('bulan_bayar like','%'.$dt_penggunaan->bulan.'%');
      $this->db->where('status !=', 'Lunas');
      return $this->db->get()->result();
    }

    public function getDataPembayaranSemua(){
      $this->db->select('*');
      $this->db->from('pembayaran');
      return $this->db->get()->result();
    }

    public function getDataPembayaranSemuaLunas(){
      $this->db->select('*');
      $this->db->where('status', 'Lunas');
      $this->db->from('pembayaran');
      return $this->db->get()->result();
    }

    public function getDataPembayaranSemuaBelumLunas(){
      $this->db->select('*');
      $this->db->where('status !=', 'Lunas');
      $this->db->from('pembayaran');
      return $this->db->get()->result();
    }

}

?>
