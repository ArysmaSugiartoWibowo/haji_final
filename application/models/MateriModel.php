<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriModel extends CI_Model {
    
    public function get_all_materi()
    {
        $this->db->select('materi.id_materi, materi.id_menu, materi.nama_materi, menu.nama_menu');
        $this->db->from('materi');
        $this->db->join('menu', 'materi.id_menu = menu.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_materi_by_menu($id_menu)
    {
        $this->db->select('materi.id_materi, materi.id_menu, materi.nama_materi, menu.nama_menu');
        $this->db->from('materi');
        $this->db->join('menu', 'materi.id_menu = menu.id');
        $this->db->where('materi.id_menu', $id_menu);
        $query = $this->db->get();
        return $query->result_array();
    }

    function insertData($data){
        return $this->db->insert("materi",$data);

    }

   // Fungsi untuk mengupdate data berdasarkan id_materi
   public function updateData($id_materi, $data)
   {
       $this->db->where('id_materi', $id_materi);
       return $this->db->update('materi', $data); // Gantilah 'materi' dengan nama tabel Anda
   }

 }

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
