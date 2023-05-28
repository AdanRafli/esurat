<?php
class Login_m extends CI_Model
{

    function login_user($username,$password)
    {
        $query = $this->db->get_where('tbl_user',array('username'=>$username));
        // print_r($query);
        // exit();
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            // print_r($data_user);
            // exit();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('nama', $data_user->nama);
                $this->session->set_userdata('akses', $data_user->akses);
                $this->session->set_userdata('email', $data_user->email);
                $this->session->set_userdata('id_user', $$data_user->id_user);
                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
            redirect('login');
        }
    }

}