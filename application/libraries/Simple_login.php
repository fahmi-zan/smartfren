<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Simple_login
{
        protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        // load data Model User
        $this->CI->load->model('User_model');
    }

    // fungsi login

    public function login($username,$password)
    {
        $cek = $this->CI->User_model->login($username,$password);

        // jika ada user, maka buat session login
        if ($cek)
        {
            $id_user        = $cek->id_user;
            $nama           = $cek->nama;
            $level_akses    = $cek->level_akses;

            // buat session 
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('level_akses', $level_akses);

            redirect(base_url('admin/dasbor'));


        }else {

            // jika gagal / tidak ada username/password, maka login lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password Salah !!');
            redirect(base_url('login'));
        }


    }

    public function cek_login()
    {
        // unutk memeriksa jika session ada / belum, maka redirect ke login 
        if ($this->CI->session->userdata('username') == "")
        {
            $this->CI->session->set_flashdata('warning', 'Anda belum login !!');
            redirect(base_url('login'));
        }
        

    }

    public function logout()
    {
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('level_akses');
        
        $this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
        redirect(base_url('login'),'refresh');

    }

                            
}
                                                
/* End of file Simple_login.php */
    
                        