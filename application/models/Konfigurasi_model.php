<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Konfigurasi_model extends CI_Model {
                        
    public function listing()
    {
        $query = $this->db->get('konfigurasi');
        return $query->row();                                
    }

    public function edit($data)
    {
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi', $data);

    }
                            
     // load menu kategori
    public function nav_karya()
    {
        $this->db->select('karya.*,
                kategori.nama_kategori,
                kategori.slug_kategori');
        $this->db->from('karya');
        // join
        
        $this->db->join('kategori', 'kategori.id_kategori = karya.id_kategori', 'left');
        
        // endjoin
        $this->db->group_by('karya.id_kategori');
        $this->db->order_by('kategori.urutan', 'ASC');
        $this->db->order_by('id_karya', 'desc');
        $query = $this->db->get();
        return $query->result();
    }                       
                        
}
                        
/* End of file Konfigurasi_model.php */
    
                        