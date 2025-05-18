<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_menu() {
        return $this->db->get('menu')->result_array();
    }

    public function get_menu_by_semester($id_semester)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('menu.id_semester', $id_semester); // Menambahkan kondisi untuk id_semester
        $query = $this->db->get();
        return $query->result_array();
    }
    

    function insertData($data){
        return $this->db->insert("menu",$data);

    }

   // Fungsi untuk mengupdate data berdasarkan id_materi
   public function updateData($id_materi, $data)
   {
       $this->db->where('id', $id_materi);
       return $this->db->update('menu', $data); // Gantilah 'materi' dengan nama tabel Anda
   }

}
