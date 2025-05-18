<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class ControllerMateri extends CI_Controller
 {

    function __construct()
 {
        parent::__construct();
        $this->load->database();
        $this->load->model( 'MateriModel' );
        $this->load->model( 'MenuModel' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'Datatables' );
        $this->load->helper( array( 'form', 'url', 'download', 'file' ) );
        // if ( empty( $this->session->session_login[ 'username' ] ) ) {
        //     $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
        //     redirect( site_url( 'controllerLogin' ) );
        // } elseif ( $this->session->session_login[ 'level' ] == 'admin' ) {
        // } else {
        //     show_404();
        // }
    }

    //     public function json()
    // {
    //         header( 'Content-Type: application/json' );
    //         echo $this->MateriModel->json();
    //     }

    public function index( $id_menu = null )
 {

        if ( $id_menu ) {
            $data[ 'materi' ] = $this->MateriModel->get_materi_by_menu( $id_menu );
        } else {
            $data[ 'materi' ] = $this->MateriModel->get_all_materi();
        }
        $data[ 'menus' ] = $this->MenuModel->get_all_menu();

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

        $this->load->view( 'header', $data );
        $this->load->view( 'materi/listMateri', $data );
        $this->load->view( 'footer' );
    }

    public function insert()
 {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        $nama_materi = strip_tags( $this->input->post( 'nama_materi' ) );
        $id_menu = strip_tags( $this->input->post( 'id' ) );

        // Data untuk diinsert
        $insert_data = array(
            'nama_materi'=>$nama_materi,
            'id_menu' => $id_menu

        );

        // Update data di database berdasarkan id
        $update_success = $this->MateriModel->insertData( $insert_data );

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

    public function edit()
 {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        // Ambil data dari POST
        $id_materi = strip_tags( $this->input->post( 'id_materi' ) );
        $nama_materi = strip_tags( $this->input->post( 'nama_materi' ) );
        $id_menu = strip_tags( $this->input->post( 'id' ) );

        // Data untuk diupdate
        $update_data = array(
            'nama_materi' => $nama_materi,
            'id_menu' => $id_menu
        );

        // Update data di database berdasarkan id_materi

        // Update data di database berdasarkan id
        $update_success = $this->MateriModel->updateData( $id_materi, $update_data );

        // Cek apakah update berhasil
        if ( $update_success ) {
            // Jika berhasil, tampilkan alert dan redirect setelah klik 'OK'
            echo "<script>
             alert('Data berhasil diupdate!');
             window.location.href = '" . $_SERVER[ 'HTTP_REFERER' ] . "';
         </script>";
        } else {
            // Jika gagal, tampilkan alert gagal
            echo "<script>
             alert('Data gagal diupdate. Silakan coba lagi.');
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
        $this->db->delete( 'file_custom', array( 'id_materi'=>$id ) );
        $this->db->delete( 'materi', array( 'id_materi'=>$id ) );
        redirect( $_SERVER[ 'HTTP_REFERER' ] );
    }
}

