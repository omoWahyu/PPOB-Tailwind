<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

  public function getDataPelanggan()
  {
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
      return $this->db->get()->result();
  }

  public function getDataTarif(){
      $this->db->select('*');
      $this->db->from('tarif');
      return $this->db->get()->result();
  }


  public function data_pelanggan($a)
  {
      return $this->db
                  ->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
                  ->where('id_pelanggan', $a)
                  ->get('pelanggan')
                  ->row();
  }

  public function tambah_pelanggan(){
      $nama_pelanggan= $this->input->post('nama_pelanggan');
      $nomor_kwh =$this->input->post('nomor_kwh');
      $alamat= $this->input->post('alamat');
      $username=$this->input->post('username');
      $password=$this->input->post('password');
      $id_tarif=$this->input->post('id_tarif');
      $datasimpan=array(
          'nama_pelanggan'=>$nama_pelanggan,
          'nomor_kwh'=>$nomor_kwh,
          'alamat'=>$alamat,
          'username'=>$username,
          'password'=>crypt($password,'garam'),
          'id_tarif'=>$id_tarif,
      );
      $this->db->insert('pelanggan',$datasimpan);
      if($this->db->affected_rows()>0){
          return TRUE;
      }else{
          return FALSE;
      }
  }

  public function edit_pelanggan()
  {
      $nama_pelanggan=$this->input->post('nama_pelanggan');
      $nomor_kwh=$this->input->post('nomor_kwh');
      $alamat=$this->input->post('alamat');
      $username=$this->input->post('username');
      $id_tarif=$this->input->post('id_tarif');
      $datasimpan=array(
          'nama_pelanggan'=>$nama_pelanggan,
          'nomor_kwh'=>$nomor_kwh,
          'alamat'=>$alamat,
          'username'=>$username,
          'id_tarif'=>$id_tarif,
      );
      return $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))
                  ->update('pelanggan', $datasimpan);
  }

  public function hapus_pelanggan(){
      $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
      $this->db->delete('pelanggan');
  }


}
