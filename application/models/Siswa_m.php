<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model{
    public function getAllSiswa(){
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas','tbl_siswa.id_kelas=tbl_kelas.id_kelas');
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get()->result_array();
    }

    public function tambahDataSiswa() {
        $data = [
        "nis" => $this->input->post('nis', true),
        "nama" => $this->input->post('nama', true),
        "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
        "id_kelas" => $this->input->post('kelas',true), 
        "tempat_lahir" => $this->input->post('tempat_lahir', true),
        "tgl_lahir" => $this->input->post('tgl_lahir', true),
        "alamat" => $this->input->post('alamat', true)
        ];     
        $this->db->insert('tbl_siswa', $data);
       
    }

    public function hapusDataSiswa($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('tbl_siswa');
        }

    public function editDataSiswa($data, $id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('tbl_siswa', $data);
    }

}

