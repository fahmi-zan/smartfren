<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Konfigurasi extends CI_Controller {

    
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Konfigurasi_model');
        }
        

    public function index()
    {
        $konfigurasi = $this->Konfigurasi_model->listing();
        
        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s Harus Diisi'));

            if($valid->run() === FALSE){
                
                $data= ['title'=> 'Konfigurasi Website',
                        'konfigurasi' => $konfigurasi,
                        'isi'   => 'admin/konfigurasi/list'
                    ];
    
                    $this->load->view('admin/layout/wrapper', $data);
            }else {

                $i              = $this->input;
                $data = [
                    'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                    'namaweb'               => $i->post('namaweb'),
                    'tagline'               => $i->post('tagline'),
                    'email'                 => $i->post('email'),
                    'website'               => $i->post('website'),
                    'keyword'               => $i->post('keyword'),
                    'metatext'              => $i->post('metatext'),
                    'telephone'             => $i->post('telephone'),
                    'alamat'                => $i->post('alamat'),
                    'facebook'              => $i->post('facebook'),
                    'instagram'             => $i->post('instagram'),
                    'deskripsi'             => $i->post('deskripsi'),
                    'rekening_pembayaran'   => $i->post('rekening_pembayaran')
                ];
            

                $this->Konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate');
                redirect(base_url('admin/konfigurasi'));
            }
    }

    // konfigurasi Logo 
    public function logo()
    {
        $konfigurasi = $this->Konfigurasi_model->listing();

        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s Harus Diisi'));

        if($valid->run()){
            // cek jika gambar diganti
          if(!empty($_FILES['logo']['name']))
          {
            $config['upload_path'] = './assets/upload/image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400';
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('logo')){
                
                $data= ['title'     => 'Konfigurasi Logo Website',
                        'konfigurasi'     => $konfigurasi,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/konfigurasi/logo'
                    ];
    
                    $this->load->view('admin/layout/wrapper', $data);

                    // data masuk database
            }else {
               
                $upload_gambar = array('upload_data' => $this->upload->data());

                // create thumbnail
                $config['image_library']    = 'gd2';
                $config['source_image']     = '/assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                $config['new_image']        = './assets/upload/image/thumbs';
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
                    'id_konfigurasi'          => $konfigurasi->id_konfigurasi,
                    'namaweb'                 => $i->post('namaweb'),
                    'logo'                  => $upload_gambar['upload_data']['file_name'],
                ];
            
                $this->Konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate');
                redirect(base_url('admin/konfigurasi/logo'));
            }
        
        } else {

            // edit karya tanpa ganti gmbr
            $i = $this->input;
            $data = [
                'id_konfigurasi'          => $konfigurasi->id_konfigurasi,
                'namaweb'                 => $i->post('namaweb'),
                // 'logo'                  => $upload_gambar['upload_data']['file_name'],
            ];
        
            $this->Konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/logo'));

            }
        }
            // end datamasuk database

            $data= ['title'     => 'Konfigurasi Logo Website',
                        'konfigurasi'     => $konfigurasi,
                        'isi'       => 'admin/konfigurasi/logo'
                    ];
         $this->load->view('admin/layout/wrapper', $data);

    }
        
    // konfigurasi Icon 
    public function icon()
    {
        $konfigurasi = $this->Konfigurasi_model->listing();

        $valid = $this->form_validation;

        $valid->set_rules('namaweb', 'Nama Website', 'required',
        array('required' => '%s Harus Diisi'));

        if($valid->run()){
            // cek jika gambar diganti
          if(!empty($_FILES['icon']['name']))
          {
            $config['upload_path'] = './assets/upload/image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400';
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('icon')){
                
                $data= ['title'     => 'Konfigurasi Icon Website',
                        'konfigurasi'     => $konfigurasi,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/konfigurasi/icon'
                    ];
    
                    $this->load->view('admin/layout/wrapper', $data);

                    // data masuk database
            }else {
               
                $upload_gambar = array('upload_data' => $this->upload->data());

                // create thumbnail
                $config['image_library']    = 'gd2';
                $config['source_image']     = '/assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
                $config['new_image']        = './assets/upload/image/thumbs';
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
                    'id_konfigurasi'          => $konfigurasi->id_konfigurasi,
                    'namaweb'                 => $i->post('namaweb'),
                    'icon'                  => $upload_gambar['upload_data']['file_name'],
                ];
            
                $this->Konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate');
                redirect(base_url('admin/konfigurasi/icon'));
            }
        
        } else {

            // edit karya tanpa ganti gmbr
            $i = $this->input;
            $data = [
                'id_konfigurasi'          => $konfigurasi->id_konfigurasi,
                'namaweb'                 => $i->post('namaweb'),
                // 'logo'                  => $upload_gambar['upload_data']['file_name'],
            ];
        
            $this->Konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/icon'));

            }
        }
            // end datamasuk database

            $data= ['title'          => 'Konfigurasi Icon Website',
                    'konfigurasi'    => $konfigurasi,
                    'isi'            => 'admin/konfigurasi/icon'
                    ];
         $this->load->view('admin/layout/wrapper', $data);
    }
        
}
        
    /* End of file  admin/Konfigurasi.php */
        
                            