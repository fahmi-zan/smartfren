<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // proteksi page
        $this->simple_login->cek_login();
        $this->load->model('Rekening_model');
        $this->load->model('Header_transaksi_model');
        $this->load->model('Transaksi_model');
     
    }
    

        public function index()
        {
            
              $header_transaksi =$this->Header_transaksi_model->listing();      
            
                $data= [
                    'title'             => 'Data Transaksi ',
                    'header_transaksi'  => $header_transaksi,
                    'isi'               => 'admin/transaksi/list'
                ];

                $this->load->view('admin/layout/wrapper', $data);
        }

        public function detail($kode_transaksi)
        {
        
                $header_transaksi   = $this->Header_transaksi_model->detail_transaksi($kode_transaksi); 
                $transaksi          = $this->Transaksi_model->kode_transaksi($kode_transaksi);
        
        
            $data = [
                'title'                 => 'Data Detail',
                'header_transaksi'      => $header_transaksi,
                'transaksi'             => $transaksi,
                'isi'                   => 'admin/transaksi/detail'
            ];
        
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        
        
        }

        
        public function cetak($kode_transaksi)
        {
        
                $header_transaksi   = $this->Header_transaksi_model->detail_transaksi($kode_transaksi); 
                $transaksi          = $this->Transaksi_model->kode_transaksi($kode_transaksi);
                $site               = $this->Konfigurasi_model->listing();
        
        
            $data = [
                'title'                 => 'Cetak Data',
                'header_transaksi'      => $header_transaksi,
                'transaksi'             => $transaksi,
                'site'                  => $site,
            ];
        
            $this->load->view('admin/transaksi/cetak', $data, FALSE);
        
        }

        public function pdf($kode_transaksi)
        {
        
                $header_transaksi   = $this->Header_transaksi_model->detail_transaksi($kode_transaksi); 
                $transaksi          = $this->Transaksi_model->kode_transaksi($kode_transaksi);
                $site               = $this->Konfigurasi_model->listing();
        
        
            $data = [
                'title'                 => 'Cetak Data',
                'header_transaksi'      => $header_transaksi,
                'transaksi'             => $transaksi,
                'site'                  => $site,
            ];
        
            // $this->load->view('admin/transaksi/cetak', $data, FALSE);

            $html = $this->load->view('admin/transaksi/cetak', $data, true);

            $mpdf = new \Mpdf\Mpdf();

            // Write some HTML code:
            $mpdf->WriteHTML($html);
            
            // Output a PDF file directly to the browser
            $nama_file_pdf = url_title($kode_transaksi, 'dash','true').'-'.date('d-m-Y',strtotime($header_transaksi->tgl_transaksi)).'.pdf';
            $mpdf->Output($nama_file_pdf, 'I');
        }

        
        public function kirim($kode_transaksi)
        {
        
                $header_transaksi   = $this->Header_transaksi_model->detail_transaksi($kode_transaksi); 
                $transaksi          = $this->Transaksi_model->kode_transaksi($kode_transaksi);
                $site               = $this->Konfigurasi_model->listing();
        
        
            $data = [
                'title'                 => 'Cetak Data',
                'header_transaksi'      => $header_transaksi,
                'transaksi'             => $transaksi,
                'site'                  => $site,
            ];
        
            // $this->load->view('admin/transaksi/kirim', $data, FALSE);

            $html = $this->load->view('admin/transaksi/kirim', $data, true);

            $mpdf = new \Mpdf\Mpdf();

            // Define the Header/Footer before writing anything so they appear on the first page
            $mpdf->SetHTMLHeader('
            <div style="text-align: left; font-weight: bold;">
                <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px; ">
            </div>');
            $mpdf->SetHTMLFooter('
            <div style="margin: 10px; padding: 10px 10px; font-size: 12px; color: black;">
            <hr>
            <table width="100%">
                    <tr>
                        <td width="25%">'.$site->namaweb.'</td>
                        <td width="50%" style="text-align: center;">'.$site->alamat.'</td>
                        <td width="25%" style="text-align: right;">'.$site->telephone.'</td>
                    </tr>
                </table>
            </div>
          ');

            // Write some HTML code:
            $mpdf->WriteHTML($html);
            // Output a PDF file directly to the browser
            $nama_file_pdf = url_title($site->namaweb, 'dash','true').'-'.$kode_transaksi.'.pdf';
            $mpdf->Output($nama_file_pdf, 'I');
        }
}