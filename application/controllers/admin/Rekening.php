<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Rekening extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
        $this->load->model('Rekening_model');
        
    }
    

        public function index()
        {
              $rekening =$this->Rekening_model->listing();      
            
            $data= ['title'=> 'Data Rekening',
                    'rekening' => $rekening,
                    'isi'   => 'admin/rekening/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }
        

        public function tambah()
        {
            $valid = $this->form_validation;

            $valid->set_rules('nama_bank', 'Nama Rekening', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('nomor_rekening', 'Nomor Rekening', 'required|is_unique[rekening.nomor_rekening]',
            array('required' => '%s Harus Diisi',
                    'is_unique' => '%s sudah ada. Buat Rekening Baru !!'));

            $valid->set_rules('nama_pemilik', 'Nama Pemilik', 'required',
            array('required' => '%s Harus Diisi'));
            
                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Tambah Rekening',
                            'isi'   => 'admin/rekening/tambah'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i              = $this->input;

                    $data = [
                        'nama_bank'             => $i->post('nama_bank'),
                        'nomor_rekening'        => $i->post('nomor_rekening'),
                        'nama_pemilik'          => $i->post('nama_pemilik')
                    ];
                

                    $this->Rekening_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/rekening'));
                }
        }

        public function hapus($id_rekening)
        {
            $data = [
                'id_rekening' => $id_rekening
            ];

            $this->Rekening_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/rekening'));
        }


        public function edit($id_rekening)
        {
            $rekening = $this->Rekening_model->detail($id_rekening);

            // validasi input
            $valid = $this->form_validation;

            $valid->set_rules('nama_bank', 'Nama Rekening karya', 'required|is_unique[rekening.nama_bank]',
            array('required' => '%s Harus Diisi',
                 'is_unique' => '%s sudah ada. Buat Rekening Baru !!'));

                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Edit Rekening',
                            'rekening'   => $rekening,
                            'isi'   => 'admin/rekening/edit'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i = $this->input;
                    $data = [
                        'nama_bank'             => $i->post('nama_bank'),
                        'nomor_rekening'        => $i->post('nomor_rekening'),
                        'nama_pemilik'          => $i->post('nama_pemilik')
                    ];

                    $this->Rekening_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/rekening'));
                }
        }
}
        
    /* End of file  rekening.php */
        
                            