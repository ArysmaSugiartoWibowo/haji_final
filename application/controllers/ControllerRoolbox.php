<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class ControllerRoolbox extends CI_Controller
 {
    function __construct()
 {
        parent::__construct();
        $this->load->database();
        $this->load->model( 'RoolboxModel' );
        $this->load->model( 'MenuModel' );
        $this->load->model( 'MateriModel' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'Datatables' );
        $this->load->helper( array( 'form', 'url', 'download', 'file' ) );

        // Cek apakah user sudah login
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }
    }

    public function index()
 {
        // Ambil parameter dari URL
        $id_pertemuan = $this->input->get( 'id_pertemuan' );
        $type = $this->input->get( 'type' );
        $kelass = $this->input->get( 'kelas' );

        // Cek apakah ada id_pertemuan dan/atau type
        if ( $id_pertemuan ) {
            if ( $type === 'tugas' ) {
                // Jika type adalah video, ambil file mp4 berdasarkan id_pertemuan

                // Tentukan nilai $kelas berdasarkan kondisi if-else
                $kelas = ( $kelass == '1' ) ? 1 : ( ( $kelass == '2' ) ? 2 : 3 );

                // Panggil fungsi dengan parameter yang benar
                $data[ 'files' ] = $this->RoolboxModel->get_files_by_type_and_pertemuan( $id_pertemuan, 'tugas', $kelas );

                $data[ 'type' ] = 'tugas';

            } else if ( $type === 'soal' ) {

                $kelas = ( $kelass == '1' ) ? 1 : ( ( $kelass == '2' ) ? 2 : 3 );
                // Ambil semua file berdasarkan id_pertemuan
                $data[ 'files' ] = $this->RoolboxModel->get_files_by_type_and_pertemuan( $id_pertemuan, 'soal', $kelas );
                $data[ 'type' ] = 'soal';
            }
        } else {
            redirect( $_SERVER[ 'HTTP_REFERER' ] );
        }

        // Ambil menu untuk ditampilkan di view
        // $data[ 'menu' ] = $this->MenuModel->get_all_menu();
        // Memastikan model dimuat jika belum
        if ( !isset( $this->MenuModel ) ) {
            $this->load->model( 'MenuModel' );
        }

        // Menu Semester 1 Kelas VII
        $id_semester = 1;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menu' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menu' ] = $this->MenuModel->get_all_menu();
        }
        //
        // Menu Semester 2 Kelas VII
        $id_semester = 2;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menu2' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menu2' ] = $this->MenuModel->get_all_menu();
        }
        // END VII

        // Menu Semester 1 Kelas VIII
        $id_semester = 3;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menuVIII1' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menuVIII1' ] = $this->MenuModel->get_all_menu();
        }
        //
        // Menu Semester 2 Kelas VII
        $id_semester = 4;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menuVIII2' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menuVIII2' ] = $this->MenuModel->get_all_menu();
        }
        // END VIII
        // Menu Semester 1 Kelas IX
        $id_semester = 5;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menuIX1' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menuIX1' ] = $this->MenuModel->get_all_menu();
        }
        //
        // Menu Semester 2 Kelas IX
        $id_semester = 6;

        if ( $id_semester ) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data[ 'menuIX2' ] = $this->MenuModel->get_menu_by_semester( $id_semester );
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data[ 'menuIX2' ] = $this->MenuModel->get_all_menu();
        }
        // END IX
        $data[ 'materi' ] = $this->MateriModel->get_all_materi();
        // Tampilkan view dengan data
        $this->load->view( 'header', $data );
        $this->load->view( 'roolbox/listRoolbox', $data );
        $this->load->view( 'footer' );
    }

    public function add()
 {
        $data[ 'materi' ] = $this->MateriModel->get_all_materi();
        $data[ 'menu' ] = $this->MenuModel->get_all_menu();
        // $data[ 'id_pertemuan' ] = 'Tambah Data Project';
        $this->load->view( 'header', $data );
        $this->load->view( 'file/addFile', $data );
        $this->load->view( 'footer' );
    }

    public function insert()
 {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        // Mendapatkan deskripsi project dari input dan menghapus tag HTML
        $judul_tugas = strip_tags( $this->input->post( 'judul_tugas' ) );
        $id_pertemuan = strip_tags( $this->input->post( 'id_pertemuan' ) );
        $type_table = strip_tags( $this->input->post( 'type_table' ) );
        $kelas = strip_tags( $this->input->post( 'kelas' ) );

        // Konfigurasi Upload
        $config[ 'upload_path' ] = './uploads/';
        $config[ 'allowed_types' ] = 'pdf|mp4';
        $config[ 'file_name' ] = uniqid();
        $config[ 'max_size' ] = 5242880;
        // $config[ 'max_size' ] = 2097152;
        // Mengubah nama file menjadi angka unik
        // Memuat library upload dengan konfigurasi yang telah ditentukan
        $this->load->library( 'upload', $config );

        // Variabel untuk nama file
        $nama_file = null;

        // Jika file di-upload
        if ( !empty( $_FILES[ 'nama_file' ][ 'name' ] ) ) {
            if ( $this->upload->do_upload( 'nama_file' ) ) {
                $upload_data = $this->upload->data();
                $nama_file = $upload_data[ 'file_name' ];
                // Mengambil nama file yang telah diubah
            } else {
                // Menyimpan pesan error dalam session flashdata
                $this->session->set_flashdata( 'upload_error', $this->upload->display_errors() );
                redirect( $_SERVER[ 'HTTP_REFERER' ] );
                return;
            }
        } else {
            $this->session->set_flashdata( 'upload_error', 'Tidak ada file yang di-upload' );
            redirect( $_SERVER[ 'HTTP_REFERER' ] );
            return;
        }

        // Data untuk diinsert
        $insert_data = array(
            'nama_file' => $nama_file,
            'id_pertemuan' => $id_pertemuan,
            'type_table'=>$type_table,
            'kelas'=>$kelas,
            'judul_tugas' => $judul_tugas,
        );

        // Insert data ke database

        // Update data di database berdasarkan id
        $update_success = $this->RoolboxModel->insertData( $insert_data );

        // Cek apakah update berhasil
        if ( $update_success ) {
            // Jika berhasil, tampilkan alert dan redirect setelah klik 'OK'
            echo "<script>
               alert('Data berhasil ditambahkan!');
               window.location.href = '" . $_SERVER[ 'HTTP_REFERER' ] . "';
           </script>";
        } else {
            // Jika gagal, tampilkan alert gagal
            echo "<script>
               alert('Data gagal ditambahkan. Silakan coba lagi.');
               window.location.href = '" . $_SERVER[ 'HTTP_REFERER' ] . "';
           </script>";
        }
    }

    public function delete() {
        if ( $this->session->userdata( 'session_login' )[ 'level' ] != 'admin' ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        $id = $this->uri->segment( 3 );
        $this->db->delete( 'tugas_tabel', array( 'id_tugas'=>$id ) );
        redirect( $_SERVER[ 'HTTP_REFERER' ] );
    }

}