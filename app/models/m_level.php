<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_level extends CI_Model {


    public function getDataLevel(){
        $this->db->select('*');
        $this->db->from('level');
        return $this->db->get()->result();
    }

    public function detail_level($a)
	  {
        return $this->db
                    ->where('id_level', $a)
                    ->get('level')
                    ->row();
    }

    public function tambah_level(){
        $datasimpan=array(
            'nama_level'=>$this->input->post('nama_level'),
        );
        $this->db->insert('level',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit_level()
    {
        $data = array(
            'nama_level' => $this->input->post('nama_level'),
        );

        return $this->db->where('id_level', $this->input->post('id_level'))
                    ->update('level', $data);
    }

    public function hapus_level(){
        $this->db->where('id_level', $this->input->post('id_level'));
        $this->db->delete('level');
    }


}
