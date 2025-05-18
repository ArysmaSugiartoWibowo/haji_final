<?php
class FileModel extends CI_Model {

    // Fungsi untuk mengambil file berdasarkan id_materi dan tipe file
    public function get_files_by_type_and_materi($id_materi, $file_type) {
        $this->db->like('nama_file', '.' . $file_type);
        $this->db->where('id_materi', $id_materi);
        $query = $this->db->get('file_custom');
        return $query->result_array();
    }

    // Fungsi untuk mengambil file berdasarkan tipe file saja
    public function get_files_by_type($file_type) {
        $this->db->like('nama_file', '.' . $file_type);
        $query = $this->db->get('file_custom');
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua file berdasarkan id_materi
    public function get_files_by_materi($id_materi) {
        $this->db->where('id_materi', $id_materi);
        $query = $this->db->get('file_custom');
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua file
    public function get_files() {
        $query = $this->db->get('file_custom');
        return $query->result_array();
    }

    function insertData($data){
        return $this->db->insert("file_custom",$data);

    }
}

?>