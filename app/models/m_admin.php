<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_login(){
        $password = crypt($this->input->post('password'),'garam');
        // $password = $this->input->post('password');
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $password);
        return $this->db->get();
    }

}

?>
