<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function get_login(){
        $password = crypt($this->input->post('password'),'garam');
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $password);
        return $this->db->get();
    }

    public function getDataTarif(){
      $this->db->select('*');
      $this->db->from('tarif');
      return $this->db->get()->result();
    }

    public function registrasi_akun(){
      $nama_pelanggan=$this->input->post('nama_pelanggan');
      $alamat=$this->input->post('alamat');
      $nomor_kwh=$this->input->post('nomor_kwh');
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      $tarif=$this->input->post('id_tarif');
      $datasimpan=array(
          'nama_pelanggan'=>$nama_pelanggan,
          'alamat'=>$alamat,
          'nomor_kwh'=>$nomor_kwh,
          'username'=>$username,
          'password'=>crypt($password,'garam'),
          'id_tarif'=>$tarif
      );
      $this->db->insert('pelanggan',$datasimpan);
      if($this->db->affected_rows()>0){
          return TRUE;
      }else{
          return FALSE;
      }
  }

}

?>
