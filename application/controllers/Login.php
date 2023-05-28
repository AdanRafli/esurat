<?php

class Login extends CI_Controller
 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
 
    public function index()
    {
        $this->load->view('login/login');
    }
 
    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //   print_r($password);
        // exit();
        if($this->Login_m->login_user($username,$password))
        {
            redirect('home');
        }
        else
        {
            $this->session->set_flashdata('error','Username & Password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('is_login');
        redirect('login');
    }

    

}