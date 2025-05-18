<?php

class RoolboxModel extends CI_Model {

    // Fungsi untuk mengambil file berdasarkan id_materi dan tipe file

    // public function get_files_by_type_and_pertemuan( $id_pertemuan, $file_type ) {
    //     $this->db->like( 'nama_file', '.' . $file_type );
    //     $this->db->where( 'id_pertemuan', $id_pertemuan );
    //     $query = $this->db->get( 'tugas_tabel' );
    //     return $query->result_array();
    // }

    public function get_files_by_type_and_pertemuan( $id_pertemuan, $search_keyword_type, $search_keyword_kelas ) {
        // Mencari kesamaan isi field 'type_table' dengan kata kunci
        $this->db->like( 'type_table', $search_keyword_type );

        // Mencari kesamaan isi field 'kelas_table' dengan kata kunci
        $this->db->like( 'kelas', $search_keyword_kelas );

        // Filter berdasarkan id_pertemuan
        $this->db->where( 'id_pertemuan', $id_pertemuan );

        // Menjalankan query pada tabel 'tugas_tabel'
        $query = $this->db->get( 'tugas_tabel' );

        // Mengembalikan hasil dalam bentuk array
        return $query->result_array();
    }

    // Fungsi untuk mengambil file berdasarkan tipe file saja

    public function get_files_by_type( $file_type ) {
        $this->db->like( 'nama_file', '.' . $file_type );
        $query = $this->db->get( 'file_custom' );
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua file berdasarkan id_materi

    public function get_files_by_pertemuan( $id_pertemuan ) {
        $this->db->where( 'id_pertemuan', $id_pertemuan );
        $query = $this->db->get( 'tugas_tabel' );
        return $query->result_array();
    }

    // Fungsi untuk mengambil semua file

    public function get_files() {
        $query = $this->db->get( 'file_custom' );
        return $query->result_array();
    }

    function insertData( $data ) {
        return $this->db->insert( 'tugas_tabel', $data );

    }

    public function get_all_roolbox()
 {
        $this->db->select( '*' );
        $this->db->from( 'tugas_tabel' );

        $query = $this->db->get();
        return $query->result_array();
    }
}

?>