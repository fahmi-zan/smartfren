<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Sales_model extends CI_Model {
                       
    // listing all saless
    public function listing(){
        $this->db->select('*');
        $this->db->from('sales');
        $this->db->order_by('id_sales', 'desc');
        $query = $this->db->get();
        return $query->result();
                                    
    }

    public function tambah($data)
    {
        $this->db->insert('sales', $data);
        
    }

    public function edit($data)
    {   
        $this->db->where('id_sales', $data['id_sales']);
        $this->db->update('sales', $data);
    }

    public function delete($data)
    {   
        $this->db->where('id_sales', $data['id_sales']);
        $this->db->delete('sales', $data);
    }
                        
    public function detail($id_sales){
        $this->db->select('*');
        $this->db->from('sales');
        $this->db->where('id_sales', $id_sales);
        $this->db->order_by('id_sales', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }                 
    
    public function read($slug_sales)
    {
        $this->db->select('*');
        $this->db->from('sales');
        $this->db->where('slug_sales', $slug_sales);
        $this->db->order_by('id_sales', 'desc');
        $query = $this->db->get();
        return $query->row();
                                    
    }                 
    
    
    
                        
}
                        
/* End of file ModelSales.php */
    
                        