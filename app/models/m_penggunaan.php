<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penggunaan extends CI_Model {

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

  public function getDataPenggunaan($id)
  {
      $this->db->select('*');
      $this->db->from('penggunaan');
      $this->db->where('penggunaan.id_pelanggan', $id);
      $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
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

  public function data_tagihan($a)
  {
      return $this->db
                  ->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
                  ->where('id_tagihan', $a)
                  ->get('tagihan')
                  ->row();
  }

  public function data_tagihan_detail($a)
  {
      return  $this->db
                   ->where('id_penggunaan',$a)
                   ->get('tagihan')
                   ->row();
  }

  public function cek_penggunaan()
	{
		$cek=$this->db->where('bulan',$this->input->post('bulan'))
					->where('tahun',$this->input->post('tahun'))
					->where('id_pelanggan',$this->input->post('id_pelanggan'))
					->get('penggunaan');
		if($cek->num_rows()>0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

  public function tambah_penggunaan()
  {

    if( $this->input->post('meter_awal') > $this->input->post('meter_akhir') ){
           return false;
    }

    else{
        $data_Penggunaan=array(
          'id_pelanggan'=>$this->input->post('id_pelanggan'),
          'bulan'=>$this->input->post('bulan'),
          'tahun'=>$this->input->post('tahun'),
          'meter_awal'=>$this->input->post('meter_awal'),
          'meter_akhir'=>$this->input->post('meter_akhir')
        );
        $this->db->insert('penggunaan', $data_Penggunaan);

        $tm_penggunaan=$this->db
                ->where('id_pelanggan',$this->input->post('id_pelanggan'))
                ->order_by('id_penggunaan','desc')
                ->limit(1)
                ->get('penggunaan')->row();

        $data_tagihan=array(
          'id_penggunaan'=>$tm_penggunaan->id_penggunaan,
          'status'=>$this->input->post('status'),
          'bulan'=>$this->input->post('bulan'),
          'tahun'=>$this->input->post('tahun'),
          'jumlah_meter'=>(($this->input->post('meter_akhir') - $this->input->post('meter_awal'))*(-1)),
          'status'=> 'Belum Dibayar'
        );
        $this->db->insert('tagihan', $data_tagihan);

        if($this->db->affected_rows() > 0){
          return TRUE;
        } else {
          return FALSE;
        }
      }
   }

    public function data_penggunaan($a)
    {
       return $this->db
                   ->where('id_penggunaan', $a)
                   ->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
                   ->get('penggunaan')
                   ->row();
    }

   public function edit_penggunaan()
   {
       $datasimpan=array(
           'bulan'=>$this->input->post('bulan'),
           'tahun'=>$this->input->post('tahun'),
           'meter_awal'=>$this->input->post('meter_awal'),
           'meter_akhir'=>$this->input->post('meter_akhir')
       );
       $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'))
                   ->update('penggunaan', $datasimpan);

      $meter = (($this->input->post('meter_akhir'))-($this->input->post('meter_awal')));
      $updatemeter=array(
            'jumlah_meter'=> $meter
      );
      $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'))
               ->update('tagihan', $updatemeter);
   }

  public function getDataTagihan($id)
  {
      $this->db->select('*');
      $this->db->from('tagihan');
      $this->db->where('id_pelanggan', $id);
      $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
      return $this->db->get()->result();
  }


}
