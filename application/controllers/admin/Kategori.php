<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kategori extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
    }
    

        public function index()
        {
              $kategori =$this->Kategori_model->listing();      
            
            $data= ['title'=> 'Data Kategori karya',
                    'kategori' => $kategori,
                    'isi'   => 'admin/kategori/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }
        

        public function tambah()
        {
            $valid = $this->form_validation;

            $valid->set_rules('nama_kategori', 'Nama Kategori karya', 'required|is_unique[kategori.nama_kategori]',
            array('required' => '%s Harus Diisi',
        'is_unique' => '%s sudah ada. Buat Kategori Baru !!'));

            
                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Tambah Kategori karya',
                            'isi'   => 'admin/kategori/tambah'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i              = $this->input;
                    $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

                    $data = [
                        'nama_kategori'     => $i->post('nama_kategori'),
                        'slug_kategori'     => $slug_kategori,
                        'urutan'            => $i->post('urutan')
                    ];
                

                    $this->Kategori_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/kategori'));
                }
        }

        public function hapus($id_kategori)
        {
            $data = [
                'id_kategori' => $id_kategori
            ];

            $this->Kategori_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/kategori'));
        }


        public function edit($id_kategori)
        {
            $kategori = $this->Kategori_model->detail($id_kategori);

            // validasi input
            $valid = $this->form_validation;

            $valid->set_rules('nama_kategori', 'Nama Kategori karya', 'required|is_unique[kategori.nama_kategori]',
            array('required' => '%s Harus Diisi',
                 'is_unique' => '%s sudah ada. Buat Kategori Baru !!'));

                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Edit Kategori karya',
                            'kategori'   => $kategori,
                            'isi'   => 'admin/kategori/edit'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i = $this->input;
                    $slug_kategori  = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

                    $data = [
                        
                        'id_kategori'       => $id_kategori,
                        'nama_kategori'     => $i->post('nama_kategori'),
                        'slug_kategori'     => $slug_kategori,
                        'urutan'            => $i->post('urutan')
                    ];

                    $this->Kategori_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/kategori'));
                }
        }
}
        
    /* End of file  kategori.php */
        
                            