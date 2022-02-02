<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_admin extends CI_Model {

  public function getDataAdmin(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level','level.id_level=admin.id_level');
        return $this->db->get()->result();
  }

  public function getDataLevel(){
      $this->db->select('*');
      $this->db->from('level');
      return $this->db->get()->result();
  }

  public function tambah_admin(){
      $password=$this->input->post('password');
      $datasimpan=array(
          'nama_admin'=>$this->input->post('nama_admin'),
          'username'=>$this->input->post('username'),
          'password'=>crypt($password,'garam'),
          'id_level'=>$this->input->post('id_level')
      );
      $this->db->insert('admin',$datasimpan);
      if($this->db->affected_rows()>0){
          return TRUE;
      }else{
          return FALSE;
      }
  }

  public function detail_admin($a)
  {
      return $this->db
                  ->where('id_admin', $a)
                  ->get('admin')
                  ->row();
  }

  public function edit_admin()
  {
      $data = array(
          'nama_admin' => $this->input->post('nama_admin'),
          'username'=>$this->input->post('username'),
          'id_level'=>$this->input->post('id_level'),
      );

      return $this->db->where('id_admin', $this->input->post('id_admin'))
                  ->update('admin', $data);
  }

  public function hapus_admin(){
      $this->db->where('id_admin', $this->input->post('id_admin'));
      $this->db->delete('admin');
  }

}
