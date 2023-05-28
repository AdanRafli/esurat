<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
    $this->load->view('home/index');
    $this->load->view('template/footer_v');
  }

}