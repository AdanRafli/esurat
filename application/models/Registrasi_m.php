<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_m extends CI_Model{
    public function getAllKelas(){
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('tbl_user')->result_array();
    }

    public function tambahDataUser() {
        $data = [
        "username" => $this->input->post('username', true),
        "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
        "nama" => $this->input->post('nama', true),
        "akses" => $this->input->post('akses', true),
        "email" => $this->input->post('email', true)
        ];     
        $this->db->insert('tbl_user', $data);
       
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
        }

    public function editDataUser($data, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }
}

