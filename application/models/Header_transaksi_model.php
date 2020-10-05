<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Header_transaksi_model extends CI_Model {
                       
    // listing all header_transaksis
    public function listing(){
        $this->db->select('header_transaksi.*,
                            pelanggan.nama_pelanggan,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        // join dgn tabel transaksi
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
        
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function pelanggan($id_pelanggan){
        $this->db->select('header_transaksi.*,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        $this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
        // join dgn tabel transaksi
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function tambah($data)
    {
        $this->db->insert('header_transaksi', $data);
        
    }

    public function edit($data)
    {   
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->update('header_transaksi', $data);
    }

    public function delete($data)
    {   
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->delete('header_transaksi', $data);
    }
                        
    public function detail($id_header_transaksi){
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('id_header_transaksi', $id_header_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    } 

    public function detail_transaksi($kode_transaksi){
        $this->db->select('header_transaksi.*,
                            pelanggan.nama_pelanggan,
                            rekening.nama_bank AS bank,
                            rekening.nomor_rekening,
                            rekening.nama_pemilik,
                            SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        // join dgn tabel transaksi
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
        $this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
        // End
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    } 
    
    public function sudah_login($email, $nama_header_transaksi)
    {
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('email', $email);
        $this->db->where('nama_header_transaksi', $nama_header_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
                                  

    }
    
      // login Header_transaksi
      public function login($email,$password)
      {
          $this->db->select('*');
          $this->db->from('header_transaksi');
          $this->db->where([
              'email' => $email,
              'password' => md5($password)
          ]);
          $this->db->order_by('id_header_transaksi', 'desc');
          $query = $this->db->get();
          return $query->row();
                                      
      }                        
            
      
       // FILTERING TANGGA
    public function view_by_date($tgl) 
    {
        $this->db->select('header_transaksi.*,
                        SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        $this->db->where('DATE(tgl_post)', $tgl); // tampilkan data sesuai tanggal
        // join dgn tabel transaksi
        $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
        
        $this->db->group_by('header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function view_by_month($bulan, $tahun)
    {
        $this->db->select('header_transaksi.*,
                        SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        $this->db->where('MONTH(tgl_post)', $bulan);      // tampilkan data sesuai bulan dan tahun
        $this->db->where('YEAR(tgl_post)', $tahun);
         // join dgn tabel transaksi
         $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
         
         $this->db->group_by('header_transaksi.id_header_transaksi');
         $this->db->order_by('id_header_transaksi', 'desc');
         $query = $this->db->get();
         return $query->result();
    

    }

    public function view_by_year($tahun)
    {
        $this->db->select('header_transaksi.*,
                        SUM(transaksi.jumlah) AS total_item');
        $this->db->from('header_transaksi');
        $this->db->where('YEAR(tgl_post)', $tahun);    // tampilkan data sesuai tahun 
         // join dgn tabel transaksi
         $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
         
         $this->db->group_by('header_transaksi.id_header_transaksi');
         $this->db->order_by('id_header_transaksi', 'desc');
         $query = $this->db->get();
         return $query->result();

    }

    public function option_tahun()
    {
        $this->db->select('YEAR(tgl_post) AS tahun');
        $this->db->from('header_transaksi');
        $this->db->group_by('YEAR(tgl_post)');
        $this->db->order_by('YEAR(tgl_post)');
        
        return $this->db->get()->result();
    }


    // Nomor Resi
    function generateRandomString($length = 10) 
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = 'GO-';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    

}
                        
/* End of file ModelHeader_transaksi.php */
    
                        