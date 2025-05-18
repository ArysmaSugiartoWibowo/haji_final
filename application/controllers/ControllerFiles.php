<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class ControllerFiles extends CI_Controller
 {
    function __construct()
 {
        parent::__construct();
        $this->load->database();
        $this->load->model( 'FileModel' );
        $this->load->model( 'MenuModel' );
        $this->load->model( 'MateriModel' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'Datatables' );
        $this->load->helper( array( 'form', 'url', 'download', 'file' ) );

        // // Cek apakah user sudah login
        // if ( empty( $this->session->session_login[ 'username' ] ) ) {
        //     $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
        //     redirect( site_url( 'controllerLogin' ) );
        // } elseif ( $this->session->session_login[ 'level' ] != 'admin' ) {
        //     show_404();
        // }
    }

    public function index()
 {
        // Ambil parameter dari URL
        $id_materi = $this->input->get( 'id_materi' );
        $type = $this->input->get( 'type' );

        // Cek apakah ada id_materi dan/atau type
        if ( $id_materi ) {
            if ( $type === 'video' ) {
                // Jika type adalah video, ambil file mp4 berdasarkan id_materi
                $data[ 'files' ] = $this->FileModel->get_files_by_type_and_materi( $id_materi, 'mp4' );
                $data[ 'type' ] = 'video';

            } else {
                // Ambil semua file berdasarkan id_materi
                $data[ 'files' ] = $this->FileModel->get_files_by_type_and_materi( $id_materi, 'pdf' );
                $data[ 'type' ] = 'pdf';
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
        $this->load->view( 'file/listFile', $data );
        $this->load->view( 'footer' );
    }

    public function add()
 {
        $data[ 'materi' ] = $this->MateriModel->get_all_materi();
        $data[ 'menu' ] = $this->MenuModel->get_all_menu();
        // $data[ 'id_materi' ] = 'Tambah Data Project';
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
        $judul_file = strip_tags( $this->input->post( 'judul_file' ) );
        $id_materi = strip_tags( $this->input->post( 'id_materi' ) );

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
            'id_materi' => $id_materi,
            'judul_file' => $judul_file,
        );

        // Insert data ke database

        // Update data di database berdasarkan id
        $update_success = $this->FileModel->insertData( $insert_data );

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
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        $id = $this->uri->segment( 3 );
        $this->db->delete( 'file_custom', array( 'id_file'=>$id ) );
        redirect( $_SERVER[ 'HTTP_REFERER' ] );
    }

}