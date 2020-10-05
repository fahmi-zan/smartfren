<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Barang extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
        
        // proteksi page
        $this->simple_login->cek_login();
    }
    

        public function index()
        {
              $barang =$this->Barang_model->listing();      
            
            $data= ['title'  => 'Data Barang',
                    'barang' => $barang,
                    'isi'    => 'admin/barang/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }
        
        public function gambar($id_barang)
        {
            $barang  = $this->Barang_model->detail($id_barang);
            $gambar = $this->Barang_model->gambar($id_barang);
            
            $valid = $this->form_validation;

            $valid->set_rules('judul_gambar', 'Nama Gambar', 'required',
            array('required' => '%s Harus Diisi'));

            if($valid->run()){
                
                $config['upload_path']      = './assets/upload/produk';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar')){
                    
                    $data= ['title'     => 'Tambah Gambar Barang ; '.$barang->nama_barang,
                            'barang'     => $barang,
                            'gambar'    => $gambar,
                            'error'     => $this->upload->display_errors(),
                            'isi'       => 'admin/barang/gambar'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);

                        // data masuk database
                }else {
                   
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // create thumbnail
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/produk/'.$upload_gambar['upload_data']['file_name'];
                    $config['new_image']        = './assets/upload/produk/thumbs';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    // end

                    $i = $this->input;
                    $data = [
                       
                        'id_barang'             => $id_barang,
                        'judul_gambar'          => $i->post('judul_gambar'),
                        'gambar'                => $upload_gambar['upload_data']['file_name'],
                    ];
                

                    $this->Barang_model->tambah_gambar($data);
                    $this->session->set_flashdata('sukses', 'Data gambar telah ditambah');
                    redirect(base_url('admin/barang/gambar/'.$id_barang));
                }}
                // end datamasuk database

                $data= ['title'     => 'Tambah Gambar Barang : '.$barang->nama_barang,
                        'barang'     => $barang,
                        'gambar'    => $gambar,
                        'isi'       => 'admin/barang/gambar'
                 ];
             $this->load->view('admin/layout/wrapper', $data);
        }

        public function tambah()
        {
            $kategori = $this->Kategori_model->listing();

            $valid = $this->form_validation;

            $valid->set_rules('nama_barang', 'Nama Barang', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('kode_barang', 'Kode Barang', 'required|is_unique[barang.kode_barang]',
            array('required' => '%s Harus Diisi',
                'is_unique' => '%s Sudah ada. Buat kode barang yg baru'));


            if($valid->run()){
                
                $config['upload_path']      = './assets/upload/produk';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '2400';
                $config['max_width']        = '2024';
                $config['max_height']       = '2024';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar')){
                    
                    $data= ['title'      => 'Tambah Barang',
                            'kategori'   => $kategori,
                            'error'      => $this->upload->display_errors(),
                            'isi'        => 'admin/barang/tambah'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);

                        // data masuk database
                }else {
                   
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // create thumbnail
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/produk/'.$upload_gambar['upload_data']['file_name'];
                    $config['new_image']        = './assets/upload/produk/thumbs';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    // end

                    $i = $this->input;
                    $slug_barang = url_title($this->input->post('nama_barang').'-'.$this->input->post('kode_barang'), 'dash', TRUE);
                    $data = [
                        'id_user'               => $this->session->userdata('id_user'),
                        'id_kategori'           => $i->post('id_kategori'),
                        'kode_barang'           => $i->post('kode_barang'),
                        'nama_barang'           => $i->post('nama_barang'),
                        'slug_barang'           => $slug_barang,
                        'keyword'               => $i->post('keyword'),
                        'harga_beli'            => $i->post('harga_beli'),
                        'harga_jual'            => $i->post('harga_jual'),
                        'keterangan'            => $i->post('keterangan'),
                        'gambar'                => $upload_gambar['upload_data']['file_name'],
                        'stok'                  => $i->post('stok'),
                        'status_barang'          => $i->post('status_barang'),
                        'tgl_post'              => date('Y-m-d H:i:s')
                    ];
                

                    $this->Barang_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/barang'));
                }}
                // end datamasuk database

                $data= ['title'=> 'Tambah Barang',
                'kategori'   => $kategori,
                'isi'   => 'admin/barang/tambah'
                 ];
             $this->load->view('admin/layout/wrapper', $data);
        }

        public function hapus($id_barang)
        {
            $barang = $this->Barang_model->detail($id_barang);
            unlink('./assets/upload/produk/'.$barang->gambar);
            unlink('./assets/upload/produk/thumbs/'.$barang->gambar);
            $data = [
                'id_barang' => $id_barang
            ];

            $this->Barang_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/barang'));
        }

        public function delete_gambar($id_barang,$id_gambar)
        {
            $gambar = $this->Barang_model->detail_gambar($id_gambar);

            unlink('./assets/upload/produk/'.$gambar->gambar);
            unlink('./assets/upload/produk/thumbs/'.$gambar->gambar);
            $data = [
                'id_gambar' => $id_gambar
            ];
            $this->Barang_model->delete_gambar($data);
            $this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
            redirect(base_url('admin/barang/gambar/'.$id_barang));
        }


        public function edit($id_barang)
        {
            $barang = $this->Barang_model->detail($id_barang);
            $kategori = $this->Kategori_model->listing();

            $valid = $this->form_validation;

            $valid->set_rules('nama_barang', 'Nama Barang', 'required',
            array('required' => '%s Harus Diisi'));

            $valid->set_rules('kode_barang', 'Kode Barang', 'required',
            array('required' => '%s Harus Diisi'));


            if($valid->run()){
                // cek jika gambar diganti
              if(!empty($_FILES['gambar']['name']))
              {
                $config['upload_path'] = './assets/upload/produk';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']  = '2400';
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar')){         //end Validasi
                    
                    $data= [
                            'title'     => 'Edit Barang :'.$barang->nama_barang,
                            'kategori'  => $kategori,
                            'barang'     => $barang,
                            'error'     => $this->upload->display_errors(),
                            'isi'       => 'admin/barang/edit'
                        ];
        
                        $this->load->view('admin/layout/wrapper', $data);

                        // data masuk database
                }else {
                   
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // create thumbnail
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = '/assets/upload/produk/'.$upload_gambar['upload_data']['file_name'];
                    $config['new_image']        = './assets/upload/produk/thumbs';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    // end

                    $i = $this->input;
                    $slug_barang = url_title($this->input->post('nama_barang').'-'.$this->input->post('kode_barang'), 'dash', TRUE);
                    $data = [
                        'id_barang'             => $id_barang,
                        'id_user'               => $this->session->userdata('id_user'),
                        'id_kategori'           => $i->post('id_kategori'),
                        'kode_barang'           => $i->post('kode_barang'),
                        'nama_barang'           => $i->post('nama_barang'),
                        'slug_barang'           => $slug_barang,
                        'keyword'               => $i->post('keyword'),
                        'harga_beli'            => $i->post('harga_beli'),
                        'harga_jual'            => $i->post('harga_jual'),
                        'keterangan'            => $i->post('keterangan'),
                        'gambar'                => $upload_gambar['upload_data']['file_name'],
                        'stok'                  => $i->post('stok'),
                        'status_barang'         => $i->post('status_barang'),
                        'tgl_post'              => date('Y-m-d H:i:s')
                    ];
                

                    $this->Barang_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/barang'));
                }
            
            } else {

                // edit barang tanpa ganti gmbr
                $i = $this->input;
                $slug_barang = url_title($this->input->post('nama_barang').'-'.$this->input->post('kode_barang'), 'dash', TRUE);
                $data = [
                    'id_barang'             => $id_barang,
                    'id_user'               => $this->session->userdata('id_user'),
                    'id_kategori'           => $i->post('id_kategori'),
                    'kode_barang'           => $i->post('kode_barang'),
                    'nama_barang'           => $i->post('nama_barang'),
                    'slug_barang'           => $slug_barang,
                    'keyword'               => $i->post('keyword'),
                    'harga_beli'            => $i->post('harga_beli'),
                    'harga_jual'            => $i->post('harga_jual'),
                    'keterangan'            => $i->post('keterangan'),
                    // 'gambar'             => $upload_gambar['upload_data']['file_name'],
                    'stok'                  => $i->post('stok'),
                    'status_barang'         => $i->post('status_barang'),
                    'tgl_post'              => date('Y-m-d H:i:s')
            ];
            

                $this->Barang_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/barang'));

                }
            }
                // end datamasuk database

                $data= ['title'     => 'Edit Barang : '.$barang->nama_barang,
                        'kategori'  => $kategori,
                        'barang'     => $barang,
                        'isi'       => 'admin/barang/edit'
                 ];
             $this->load->view('admin/layout/wrapper', $data);

        }
}
        
    /* End of file  barang.php */
        
                            