<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_surat extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
    $this->load->model('Cetak_surat_m');
    $this->load->library('form_validation');
    
  }

  public function index() {
    $this->load->model('Cetak_surat_m');
    $data['surat'] = $this->Cetak_surat_m->getAllSurat();
    $this->load->view('template/header_v');
    $this->load->view('surat/cetak_surat', $data);
    $this->load->view('template/footer_v');
  }

  public function tambah_surat() {
    $data['surat'] = $this->Cetak_surat_m->getAllUser();
    $this->form_validation->set_rules('nomor','Nomor','required');
    $this->form_validation->set_rules('lampiran','Lampiran','required');
    $this->form_validation->set_rules('perihal','Perihal','required');
    $this->form_validation->set_rules('tgl_surat','Tgl_surat','required');
    $this->form_validation->set_rules('perusahaan','Perusahaan','required');
    $this->form_validation->set_rules('almt_perusahaan','Almt_perusahaan','required');

    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header_v');
      $this->load->view('surat/cetak_surat', $data);
      $this->load->view('template/footer_v');
    }else{
      $this->Siswa_m->tambahDataSurat(); 
      $this->session->set_flashdata('success','Ditambahkan');
      redirect('Cetak_surat');
    }
  }
  
  public function hapus_surat($id) {
    $this->Siswa_m->hapusDataSurat($id);
    $this->session->set_flashdata('success','dihapus');
    redirect('Cetak_surat');
  }

  public function edit_surat()
  {
    $this->form_validation->set_rules('nomor','Nomor','required');
    $this->form_validation->set_rules('lampiran','Lampiran','required');
    $this->form_validation->set_rules('perihal','Perihal','required');
    $this->form_validation->set_rules('tgl_surat','Tgl_surat','required');
    $this->form_validation->set_rules('perusahaan','Perusahaan','required');
    $this->form_validation->set_rules('almt_perusahaan','Almt_perusahaan','required');
  
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header_v');
      $this->load->view('surat/cetak_surat');
      $this->load->view('template/footer_v');
    }else{
      $IdCetak = $this->input->post('IdCetak');
      $lampiran = $this->input->post('lampiran');
      $perihal = $this->input->post('perihal');
      $tgl_surat = $this->input->post('tgl_surat');
      $perusahaan = $this->input->post('perusahaan');
      $almt_perusahaan = $this->input->post('almt_perusahaan');
      $data = array(
            'IdCetak' => $IdCetak,
            'lampiran' => $lampiran,
            'perihal' => $perihal,
            'tgl_surat' => $tgl_surat,
            'perusahaan' => $perusahaan,
            'almt_perusahaan' => $almt_perusahaan,
            'id_user' => $user
      );
      

      $this->Siswa_m->editDataSurat($data, $IdCetak);
     /* print_r($data);
      exit();*/
      $this->session->set_flashdata('success','diedit');
      
      redirect('Cetak_surat');
    }
  }

}