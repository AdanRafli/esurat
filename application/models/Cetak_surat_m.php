<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_surat_m extends CI_Model{
    public function getAllSurat(){
        $this->db->order_by('IdCetak', 'DESC');
        return $this->db->get('tbl_surat_cetak')->result_array();
    }

    public function tambahDataSurat() {
        $data = [
        "nomor" => $this->input->post('nomor', true),
        "lampiran" => $this->input->post('lampiran', true),
        "perihal" => $this->input->post('perihal', true),
        "tgl_surat" => $this->input->post('tgl_surat',true), 
        "perusahaan" => $this->input->post('perusahaan', true),
        "almt_perusahaan" => $this->input->post('almt_perusahaan', true)
        ];     
        $this->db->insert('tbl_cetak_surat', $data);
       
    }

    public function hapusDataSurat($id)
    {
        $this->db->where('IdCetak', $id);
        $this->db->delete('tbl_cetak_surat');
        }

    public function editDataSurat($data, $IdCetak)
    {
        $this->db->where('IdCetak', $IdCetak);
        $this->db->update('tbl_cetak_surat', $data);
    }

}

