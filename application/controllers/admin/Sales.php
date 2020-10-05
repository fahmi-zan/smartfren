<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Sales extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
    }
    

        public function index()
        {
              $sales =$this->Sales_model->listing();      
            
            $data= ['title'=> 'Data Sales',
                    'sales' => $sales,
                    'isi'   => 'admin/sales/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }
        

        public function tambah()
        {
            $valid = $this->form_validation;

            $valid->set_rules('id_sales', 'ID Sales', 'required|min_length[11]|max_length[11]|is_unique[sales.id_sales]',
            array('required' => '%s Harus Diisi',
                    'min_length' => '%s Minimal 11 karakter',
                    'max_length' => '%s Maksimal 11 karakter',
                    'is_unique' => '%s ID sudah ada !!'
                ));

            $valid->set_rules('nama_sales', 'Nama Sales', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('alamat_sales', 'Alamat Sales', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('email_sales', 'Email Sales', 'required|valid_email',
            array('required'      => '%s Harus Diisi',
                    'valid_email' => '%s Tidak Valid'));

            $valid->set_rules('tlp_sales', 'Nomor Telephone Sales', 'required',
            array('required' => '%s Harus Diisi'));

            
                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Tambah Sales',
                            'isi'   => 'admin/sales/tambah'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i              = $this->input;
                    $slug_sales  = url_title($this->input->post('nama_sales'), 'dash', TRUE);

                    $data = [
                        'id_sales'       => $i->post('id_sales'),
                        'nama_sales'     => $i->post('nama_sales'),
                        'alamat_sales'   => $i->post('alamat_sales'),
                        'email_sales'    => $i->post('email_sales'),
                        'tlp_sales'      => $i->post('tlp_sales'),
                        'slug_sales'     => $slug_sales,
                        'urutan'         => $i->post('urutan')
                    ];
                

                    $this->Sales_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/sales'));
                }
        }

        public function hapus($id_sales)
        {
            $data = [
                'id_sales' => $id_sales
            ];

            $this->Sales_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/sales'));
        }


        public function edit($id_sales)
        {
            $sales = $this->Sales_model->detail($id_sales);

            // validasi input
            $valid = $this->form_validation;

            $valid->set_rules('id_sales', 'ID Sales', 'required|min_length[11]|max_length[11]|is_unique[sales.id_sales]',
            array('required' => '%s Harus Diisi',
                    'min_length' => '%s Minimal 11 karakter',
                    'max_length' => '%s Maksimal 11 karakter',
                    'is_unique' => '%s ID sudah ada !!'
                ));

            $valid->set_rules('nama_sales', 'Nama Sales', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('alamat_sales', 'Alamat Sales', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('email_sales', 'Email Sales', 'required|valid_email',
            array('required'      => '%s Harus Diisi',
                    'valid_email' => '%s Tidak Valid'));

            $valid->set_rules('tlp_sales', 'Nomor Telephone Sales', 'required',
            array('required' => '%s Harus Diisi'));

                if($valid->run() === FALSE){
                    
                    $data= ['title'=> 'Edit Sales',
                            'sales'   => $sales,
                            'isi'   => 'admin/sales/edit'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);
                }else {

                    $i = $this->input;
                    $slug_sales  = url_title($this->input->post('nama_sales'), 'dash', TRUE);

                    $data = [
                        
                        'id_sales'       => $i->post('id_sales'),
                        'nama_sales'     => $i->post('nama_sales'),
                        'alamat_sales'   => $i->post('alamat_sales'),
                        'email_sales'    => $i->post('email_sales'),
                        'tlp_sales'      => $i->post('tlp_sales'),
                        'slug_sales'     => $slug_sales,
                        'urutan'         => $i->post('urutan')
                    ];

                    $this->Sales_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/sales'));
                }
        }
}
        
    /* End of file  sales.php */
        
                            