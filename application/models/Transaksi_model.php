<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Transaksi_model extends CI_Model {
                       
    // listing all transaksis
    public function listing(){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

      // listing all transaksis berdasarkan HEADER TRANSAKSI
    public function kode_transaksi($kode_transaksi){
        $this->db->select('transaksi.*,
        barang.nama_barang,
        barang.kode_barang');
        $this->db->from('transaksi');
        // JOIN
        $this->db->join('barang', 'barang.id_barang = transaksi.id_barang', 'left');
        // end
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function tambah($data)
    {
        $this->db->insert('transaksi', $data);
        
    }

    public function edit($data)
    {   
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    public function delete($data)
    {   
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('transaksi', $data);
    }
                        
    public function detail($id_transaksi){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }                 
    
    public function read($slug_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('slug_transaksi', $slug_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }                 
    
    
   
                        
}
                        
/* End of file ModelTransaksi.php */
    
                        