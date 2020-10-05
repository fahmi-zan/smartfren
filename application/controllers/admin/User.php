<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
    }
    

        public function index()
        {
              $user =$this->User_model->listing();      
            
            $data= ['title'=> 'Data Pengguna',
                    'user' => $user,
                    'isi'   => 'admin/user/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }
        

        public function tambah()
        {
            $valid = $this->form_validation;

            $valid->set_rules('nama', 'Nama Pengguna', 'required|max_length[24]',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('email', 'Email Pengguna', 'required|valid_email',
            array('required'      => '%s Harus Diisi',
                    'valid_email' => '%s Tidak Valid'));
            
            $valid->set_rules('username', 'Username Pengguna', 'required|min_length[5]|max_length[24]|is_unique[user.username]',
            array('required' => '%s Harus Diisi',
                    'min_length' => '%s Minimal 5 karakter',
                    'max_length' => '%s Maksimal 24 karakter',
                    'is_unique' => '%s Sudah ada. Buat Username Baru !!'
                ));

            $valid->set_rules('password', 'Password Pengguna', 'required',
            array('required'      => '%s Harus Diisi'));


                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Tambah Pengguna',
                            'isi'   => 'admin/user/tambah'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i = $this->input;
                    $data = [
                        'nama'          => $i->post('nama'),
                        'email'         => $i->post('email'),
                        'username'      => $i->post('username'),
                        'password'      => md5($i->post('password')),
                        'tlp_user'      => $i->post('tlp_user'),
                        'level_akses'   => $i->post('level_akses')
                    ];
                

                    $this->User_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/user'));
                }
        }

        public function hapus($id_user)
        {
            $data = [
                'id_user' => $id_user
            ];

            $this->User_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/user'));
        }


        public function edit($id_user)
        {
            $user = $this->User_model->detail($id_user);

            // validasi input
            $valid = $this->form_validation;

            $valid->set_rules('nama', 'Nama Pengguna', 'required|max_length[24]',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('email', 'Email Pengguna', 'required|valid_email',
            array('required'      => '%s Harus Diisi',
                    'valid_email' => '%s Tidak Valid'));

            $valid->set_rules('password', 'Password Pengguna', 'required',
            array('required'      => '%s Harus Diisi'));

            $valid->set_rules('tlp_user', 'Nomor Telephone Pengguna', 'requiredmin_length[10]|max_length[13]',
            array('required'      => '%s Harus Diisi',
            'min_length' => '%s Minimal 11 karakter',
            'max_length' => '%s Maksimal 13 karakter'));


                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Edit Pengguna',
                            'user'   => $user,
                            'isi'   => 'admin/user/edit'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i = $this->input;
                    $data = [
                        'id_user'           => $id_user,
                        'nama'              => $i->post('nama'),
                        'email'             => $i->post('email'),
                        'username'          => $i->post('username'),
                        'password'          => $i->post('password'),
                        'tlp_user'          => $i->post('tlp_user'),
                        'level_akses'       => $i->post('level_akses')
                    ];
                

                    $this->User_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/user'));
                }
        }

        public function profile()
        {
            $id_user       = $this->session->userdata('id_user');
            $user          = $this->User_model->detail($id_user);

            $valid = $this->form_validation;

                $valid->set_rules('nama', 'Nama Pengguna', 'required',
                array('required' => '%s Harus Diisi'));

                $valid->set_rules('username', 'Username Pengguna', 'required',
                array('required' => '%s Harus Diisi'));

                $valid->set_rules('email', 'Email Pengguna', 'required',
                array('required'      => '%s Harus Diisi'));

                $valid->set_rules('password', 'Password Pengguna', 'required',
                array('required'      => '%s Harus Diisi'));

                $valid->set_rules('tlp_user', 'Nomor Telephone Pengguna', 'required|min_length[10]|max_length[13]',
                array('required'      => '%s Harus Diisi',
                'min_length' => '%s Minimal 11 karakter',
                'max_length' => '%s Maksimal 13 karakter'));

                $valid->set_rules('alamat_user', 'Alamat Pengguna', 'required',
                array('required' => '%s Harus Diisi'));

                if($valid->run() === FALSE){

            $data = [
                'title'            => 'My Profile',
                'user'             => $user,
                'isi'              => 'admin/user/profile'
            ];
        
            $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else {

            $i = $this->input;

            // jika password >6 karakter,maka terganti
            if(strlen($i->post('password')) >= 6){
                $data = [
                    'id_user'           => $id_user,
                    'nama'              => $i->post('nama'),
                    'username'          => $i->post('username'),
                    'password'          => md5($i->post('password')),
                    'tlp_user'          => $i->post('tlp_user'),
                    'alamat_user'       => $i->post('alamat_user'),
                ];
            }else{
                $data = [
                    'id_user'           => $id_user,
                    'nama'              => $i->post('nama'),
                    // 'password'          => md5($i->post('password')),
                    'tlp_user'          => $i->post('tlp_user'),
                    'alamat_user'       => $i->post('alamat_user'),
                ];

            }

            $this->User_model->edit($data);
            $this->session->set_flashdata('sukses', 'Update Profile Berhasil');
            redirect(base_url('admin/user/profile'));
        }
        

        }
}
        
    /* End of file  user.php */
        
                            