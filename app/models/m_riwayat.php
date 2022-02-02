<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat extends CI_Model {

   public function getDataRiwayat()
   {
       $this->db->select('
           pelanggan.nomor_kwh,
           pelanggan.nama_pelanggan,
           pembayaran.tanggal_pembayaran,
           pembayaran.bulan_bayar,
           pembayaran.biaya_admin,
           pembayaran.total_bayar,
           pembayaran.id_pembayaran,
           pembayaran.status,
           pembayaran.bukti,
           admin.nama_admin');
       $this->db->from('pembayaran');
       $this->db->where('pembayaran.status !=', '');
       $this->db->order_by('id_pembayaran', 'desc');
       $this->db->join('admin','admin.id_admin=pembayaran.id_admin');
       $this->db->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan');
       $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
       $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
       return $this->db->get()->result();
   }

   public function getDetailRiwayat($id)
   {
     return $this->db
              ->select('
                 pelanggan.nomor_kwh,
                 pelanggan.nama_pelanggan,
                 penggunaan.meter_awal,
                 penggunaan.meter_akhir,
                 tagihan.jumlah_meter,
                 pembayaran.bukti,
                 pembayaran.tanggal_pembayaran,
                 pembayaran.bulan_bayar,
                 pembayaran.biaya_admin,
                 pembayaran.total_bayar,
                 pembayaran.id_pembayaran,
                 pembayaran.status,
                 pembayaran.bukti,
                 admin.nama_admin')
             ->where('pembayaran.id_pembayaran', $id)
             ->order_by('id_pembayaran', 'desc')
             ->join('admin','admin.id_admin=pembayaran.id_admin')
             ->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan')
             ->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
             ->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
             ->get('pembayaran')->row();
   }

}
