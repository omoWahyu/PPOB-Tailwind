<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function getDataTagihan(){
      $this->db->select('*');
      $this->db->from('tagihan');
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      $this->db->where('penggunaan.id_pelanggan', $this->session->userdata('id_pelanggan'));
      $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
      $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
      $this->db->order_by('penggunaan.bulan','desc');
      $this->db->limit(1);
      return $this->db->get()->result();
    }

    public function getDataTagihanBulanan(){
      $this->db->select('*');
      $this->db->from('tagihan');
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      $this->db->where('penggunaan.id_pelanggan', $this->session->userdata('id_pelanggan'));
      $this->db->order_by('penggunaan.bulan','desc');
      $this->db->limit(1);
      return $this->db->get()->result();
    }

    public function getDataTagihanLunas(){
      $this->db->select('*');
      $this->db->from('tagihan');
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      $this->db->where('penggunaan.id_pelanggan', $this->session->userdata('id_pelanggan'));
      $this->db->where('tagihan.status', 'Lunas');
      return $this->db->get()->result();
    }

    public function getDataTagihanBelumLunas(){
      $this->db->select('*');
      $this->db->from('tagihan');
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      $this->db->where('penggunaan.id_pelanggan', $this->session->userdata('id_pelanggan'));
      $this->db->where('tagihan.status !=', 'Lunas');
      return $this->db->get()->result();
    }




}

?>
