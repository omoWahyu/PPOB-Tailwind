<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {


  public function getDataPembayaran()
  {
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->where('pembayaran.status', 'Belum Dikonfirmasi');
      $this->db->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan');
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
      $this->db->order_by('pembayaran.id_pembayaran','Desc');
      return $this->db->get()->result();
  }

  public function data_pembayaran($a)
  {
    return $this->db
                ->where('id_pembayaran', $a)
                ->get('pembayaran')
                ->row();
  }

  public function konfirmasi_pembayaran(){

      $data = array(
          'status' => "Lunas",
          'id_admin' => $this->session->userdata('id_admin')
      );

      $this->db->where('id_pembayaran', $this->input->post('id_pembayaran'))
               ->update('pembayaran', $data);

      $datatag = array(
          'status' => "Lunas",
      );

      $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
               ->update('tagihan', $datatag);

      if($this->db->affected_rows() > 0){
        return TRUE;
        } else {
        return FALSE;
      }
  }

  public function tolak_pembayaran(){

      $data = array(
          'status' => "Pembayaran Ditolak",
          'id_admin' => $this->session->userdata('id_admin')
      );

      $this->db->where('id_pembayaran', $this->input->post('id_pembayaran'))
               ->update('pembayaran', $data);

      $datatag = array(
          'status' => "Bukti Ditolak Silahkan Upload Lagi"
      );
      $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
               ->update('tagihan', $datatag);

      if($this->db->affected_rows() > 0){
        return TRUE;
        } else {
        return FALSE;
      }
  }

}
