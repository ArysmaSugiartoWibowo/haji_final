<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class ControllerLogin extends CI_Controller
 {
    function __construct()
 {
        parent::__construct();
        $this->load->database();
        $this->load->library( 'form_validation' );
        $this->load->model( 'LoginModel' );
        $this->load->model( 'MenuModel' );
    }

    public function index()
 {
        if ( empty( $this->session->userdata( 'username' ) ) ) {
            $this->load->view( 'viewLogin' );
        } else {
            redirect( 'ControllerHome' );
        }

    }

    public function cekStatusLogin()
 {
        $this->form_validation->set_rules( 'username', 'Username', 'required' );
        $this->form_validation->set_rules( 'password', 'Password', 'required' );
        $this->form_validation->set_message( 'required', '* {field} Harus diisi' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->index();
        } else {
            $username = $this->input->post( 'username', TRUE );

            $password = $this->input->post( 'password', TRUE );

            $where = [ 'username' => $username ];
            $cek = $this->LoginModel->validasi( 'user', $where )->row_array();

            if ( !empty( $cek ) && password_verify( $password, $cek[ 'password' ] ) ) {
                $data_session = [
                    'username' => $cek[ 'username' ],
                    'id' => $cek[ 'id' ],
                    'level'    => $cek[ 'level' ],
                    'kelas'    => $cek[ 'kelas' ],
                ];

                $this->session->set_userdata( 'session_login', $data_session );
                redirect( site_url( 'controllerHome' ) );
            } else {
                $this->session->set_flashdata( 'pesan', 'Username atau Password salah.' );
                redirect( 'ControllerLogin' );
            }
        }
    }

    public function user()
 {
        // Buat koneksi ke database
        $this->load->database();
        $this->load->library( 'Datatables' );
        $this->load->helper( array( 'form', 'url', 'download', 'file' ) );

        // Cek apakah sesi login ada
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
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

        // Lakukan query ke tabel user
        $query = $this->db->query( 'SELECT * FROM user' );
        $data[ 'user' ] = $query->result();

        // Load view dengan data user
        $this->load->view( 'header', $data );
        $this->load->view( 'user/user', $data );
        $this->load->view( 'footer' );
    }

    public function register()
 {
        // if ( empty( $this->session->session_login[ 'username' ] ) ) {
        //     $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
        //     redirect( site_url( 'controllerLogin' ) );
        // }

        // $data[ 'menu' ] = $this->MenuModel->get_all_menu();
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

        // $this->load->view( 'header', $data );
        $this->load->view( 'register' );
        // $this->load->view( 'footer' );
    }

    public function register_action()
 {
        // // Cek apakah sesi login ada
        // if ( empty( $this->session->session_login[ 'username' ] ) ) {
        //     $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
        //     redirect( site_url( 'controllerLogin' ) );
        // }

        // Validasi input form
        $this->form_validation->set_rules( 'username', 'Username', 'required|is_unique[user.username]' );
        $this->form_validation->set_rules( 'password', 'Password', 'required' );
        $this->form_validation->set_message( 'required', '* {field} Harus diisi' );
        $this->form_validation->set_message( 'is_unique', '* {field} sudah ada' );

        if ( $this->form_validation->run() == FALSE ) {
            $this->register();
            // Menampilkan ulang form jika validasi gagal
        } else {
            // Data yang akan disimpan
            $data = [
                'username' => $this->input->post( 'username' ),
                'kelas' => $this->input->post( 'kelas' ),
                'level' => $this->input->post( 'level' ),
                'password' => password_hash( $this->input->post( 'password' ), PASSWORD_DEFAULT )
            ];

            // Menyimpan data ke database
            $update_success = $this->LoginModel->registerUser( $data );

            // Cek apakah penyimpanan berhasil
            if ( $update_success ) {
                // Jika berhasil, tampilkan alert dan redirect setelah klik 'OK'
                echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = '" . base_url( 'controllerLogin/user' ) . "';
            </script>";
            } else {
                // Jika gagal, tampilkan alert gagal
                echo "<script>
                alert('Data gagal ditambahkan. Silakan coba lagi.');
                window.location.href = '" . $_SERVER[ 'HTTP_REFERER' ] . "';
            </script>";
            }
        }
    }

    public function deleteUser( $id )
 {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }

        // Load database library
        $this->load->database();

        // Check if the record exists
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'user' );

        if ( $query->num_rows() > 0 ) {
            // Record exists, proceed to delete
            $this->db->where( 'id', $id );
            $this->db->delete( 'user' );

            if ( $this->db->affected_rows() > 0 ) {
                $this->session->set_flashdata( 'flash_message', 'Berhasil hapus data pengguna.' );
            } else {
                $this->session->set_flashdata( 'error_message', 'Gagal hapus data pengguna.' );
            }
        } else {
            // Record does not exist
            $this->session->set_flashdata( 'error_message', 'Data pengguna tidak ditemukan.' );
        }

        // Redirect to the appropriate page
        redirect( site_url( 'controllerLogin/user' ) );
    }

    public function logout()
 {
        $this->session->sess_destroy();
        redirect( 'controllerLogin' );
    }
}
