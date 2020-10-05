<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Barang_model extends CI_Model {
                       
    // listing all barang
    public function listing(){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('id_barang', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function home(){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->where('barang.status_barang', 'Publish');
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('id_barang', 'desc');
        $this->db->limit(12);
        
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function read($slug_barang){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->where('barang.status_barang', 'Publish');
        $this->db->where('barang.slug_barang', $slug_barang);
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('id_barang', 'desc');
        
        $query = $this->db->get();
        return $query->row();
                                    
    }


    public function tambah($data)
    {
        $this->db->insert('barang', $data);
        
    }

    public function edit($data)
    {   
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $data);
    }

    public function delete($data)
    {   
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('barang', $data);
    }

    public function delete_gambar($data)
    {   
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);
    }
                        
    public function detail_gambar($id_gambar){
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }  

    // nampilkan data barang
    public function barang($limit,$start){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->where('barang.status_barang', 'Publish');
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('id_barang', 'desc');
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result();
                                    
    }

    // total barang
    public function total_barang()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('barang');
        $this->db->where('status_barang', 'Publish');

        $query =$this->db->get();
        return $query->row();
        
    }

    // nampilkan data kategori
    public function kategori($id_kategori, $limit,$start){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->where('barang.status_barang', 'Publish');
        $this->db->where('barang.id_kategori', $id_kategori);
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('id_barang', 'desc');
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result();
                                    
    }

    // total kategori
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('barang');
        $this->db->where('status_barang', 'Publish');
        $this->db->where('id_kategori', $id_kategori);

        $query =$this->db->get();
        return $query->row();
        
    }

    // listing Kategori
    public function listing_kategori(){
        $this->db->select('barang.*,
                user.nama,
                kategori.nama_kategori,
                kategori.slug_kategori,
                COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('barang');
        // join
        
        $this->db->join('user', 'user.id_user = barang.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_barang = barang.id_barang', 'left');
        
        // endjoin
        $this->db->group_by('barang.id_kategori');
        $this->db->order_by('id_barang', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function detail($id_barang){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('id_barang', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }  

    public function gambar($id_barang)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }               
    
    public function tambah_gambar($data)
    {
        $this->db->insert('gambar', $data);
        
    }
                        
}
                        
/* End of file ModelBarang.php */
    
                        