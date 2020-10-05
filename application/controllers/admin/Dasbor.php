<?php 

class Dasbor extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
    }
    

    public function index() 
    { 
        $user =$this->User_model->detail('id_user');
        $data = [
            'title' => 'Halaman Admin',
            'user' => $user,
            'isi' => 'admin/dasbor/list'
    ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

}