<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class donasi extends CI_Controller
{
  function construct()
  {
    parent:: construct();
    if(empty($this->session->userdata('is_login'))) ; 
    {
        redirect('login');
    }
  }

  public function index() {
    $this->load->view('template/header_v');
    $this->load->view('donasi/donasi');
    $this->load->view('template/footer_v');
  }

}