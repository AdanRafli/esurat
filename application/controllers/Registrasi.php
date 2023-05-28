<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
    $this->load->model('Registrasi_m');
    $this->load->library('form_validation');
  }

  public function index() {

    if($this->session->userdata('akses') == "admin"){
    $data['user'] = $this->Registrasi_m->getAllKelas();
    $this->load->view('template/header_v');
    $this->load->view('registrasi/registrasi', $data);
    $this->load->view('template/footer_v');
    }else{
      redirect('home');
    }
  }

  public function tambah_user() {
  	$data['user'] = $this->Registrasi_m->getAllKelas();
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('akses','Akses','required');
    $this->form_validation->set_rules('email','Email','required');
  
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header_v');
      $this->load->view('registrasi/registrasi', $data);
      $this->load->view('template/footer_v');
    }else{
      $this->Registrasi_m->tambahDataUser(); 
      $this->session->set_flashdata('success','Ditambahkan');
      redirect('registrasi');
    }
  }
  
  public function hapus_user($id) {
    $this->Registrasi_m->hapusDataUser($id);
    $this->session->set_flashdata('success','dihapus');
    redirect('registrasi');
  }

  public function edit_user()
  {
    $this->form_validation->set_rules('id_user','Id_user','required');
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('akses','Akses','required');
    $this->form_validation->set_rules('email','Email','required');

  
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header_v');
      $this->load->view('registrasi/registrasi');
      $this->load->view('template/footer_v');
    }else{
      $id_user = $this->input->post('id_user');
      $username = $this->input->post('username');
      $pass = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
      $nama = $this->input->post('nama');
      $akses = $this->input->post('akses');
      $email = $this->input->post('email');
      $data = array(
            'id_user' => $id_user,
            'username' => $username,
            'password' => $pass,
            'nama' => $nama,
            'akses' => $akses,
            'email' => $email
      );
      $this->Registrasi_m->editDataUser($data, $id_user);
      $this->session->set_flashdata('success','diedit');
      redirect('registrasi');
    }
  }

}


