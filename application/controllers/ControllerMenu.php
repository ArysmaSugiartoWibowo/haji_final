<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerMenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MenuModel');
    }

    public function index() {
        // $data['menu'] = $this->MenuModel->get_all_menu();
        $id_semester = $this->input->post('data');
        echo "id_semester";
    
        // die;
        // if ($id_semester) {
        //     $data['menu'] = $this->MenuModel->get_menu_by_semester($id_semester);
        // } else {
        //     $data['menu'] = $this->MenuModel->get_all_menu();
        // }
        // $this->load->view('header', $data);
    }

    public function listMenu() {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        } 

        // Menu Semester 1 Kelas VII
        $id_semester = 1;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menu'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menu'] = $this->MenuModel->get_all_menu();
        }
        // 
        // Menu Semester 2 Kelas VII
        $id_semester = 2;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menu2'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menu2'] = $this->MenuModel->get_all_menu();
        }
        // END VII
    
        // Menu Semester 1 Kelas VIII
        $id_semester = 3;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menuVIII1'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menuVIII1'] = $this->MenuModel->get_all_menu();
        }
        // 
        // Menu Semester 2 Kelas VII
        $id_semester = 4;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menuVIII2'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menuVIII2'] = $this->MenuModel->get_all_menu();
        }
        // END VIII
        // Menu Semester 1 Kelas IX
        $id_semester = 5;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menuIX1'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menuIX1'] = $this->MenuModel->get_all_menu();
        }
        // 
        // Menu Semester 2 Kelas IX
        $id_semester = 6;
    
        if ($id_semester) {
            // Memastikan bahwa id_semester memiliki nilai yang valid
            $data['menuIX2'] = $this->MenuModel->get_menu_by_semester($id_semester);
        } else {
            // Jika tidak ada id_semester, ambil semua menu
            $data['menuIX2'] = $this->MenuModel->get_all_menu();
        }
        // END IX




        $dato['menu'] = $this->MenuModel->get_all_menu();
        $this->load->view('header', $data);
        $this->load->view('menu/listMenu', $dato);
        $this->load->view('footer');
    }


    // public function listMenuBySemester()
    // {
    //     // Memastikan model dimuat jika belum
    //     if (!isset($this->MenuModel)) {
    //         $this->load->model('MenuModel');
    //     }
    
    //     // Ambil data id_semester dari input POST
    //     $id_semester = $this->input->post('id_semester', true); // true untuk xss_clean
    
    //     if ($id_semester) {
    //         // Memastikan bahwa id_semester memiliki nilai yang valid
    //         $data['menu'] = $this->MenuModel->get_menu_by_semester($id_semester);
    //     } else {
    //         // Jika tidak ada id_semester, ambil semua menu
    //         $data['menu'] = $this->MenuModel->get_all_menu();
    //     }
    
    //     // Memastikan file view header ada dan dimuat dengan data yang tepat
    //     $this->load->view('header', $data);
    // }
    

    public function insert()
    {
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        }
        $nama_menu = strip_tags($this->input->post('nama_menu'));
        $semester = strip_tags($this->input->post('semester'));
        // Data untuk diinsert
        $insert_data = array(
            'nama_menu'=>$nama_menu,
            'id_semester'=>$semester,
         
        );
    
        // Insert data ke database
        $update_success = $this->MenuModel->insertData($insert_data);
               // Cek apakah update berhasil
               if ($update_success) {
                // Jika berhasil, tampilkan alert dan redirect setelah klik "OK"
                echo "<script>
                    alert('Data berhasil di tambahkan!');
                    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
                </script>";
            } else {
                // Jika gagal, tampilkan alert gagal
                echo "<script>
                    alert('Data gagal ditambahkan. Silakan coba lagi.');
                    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
                </script>";
            }
    }
    public function edit()
    {     if ( empty( $this->session->session_login[ 'username' ] ) ) {
        $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
        redirect( site_url( 'controllerLogin' ) );
    } 
        // Ambil data dari POST
        $id = strip_tags($this->input->post('id'));
        $nama_menu = strip_tags($this->input->post('nama_menu'));
        $semester = strip_tags($this->input->post('semester'));
        
        // Data untuk diupdate
        $update_data = array(
            'nama_menu'=>$nama_menu,
            'id_semester'=>$semester
        );
    
        // Update data di database berdasarkan id
        $update_success = $this->MenuModel->updateData($id, $update_data);
    
        // Cek apakah update berhasil
        if ($update_success) {
            // Jika berhasil, tampilkan alert dan redirect setelah klik "OK"
            echo "<script>
                alert('Data berhasil diupdate!');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
        } else {
            // Jika gagal, tampilkan alert gagal
            echo "<script>
                alert('Data gagal diupdate. Silakan coba lagi.');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
        }
    }
    
    
    
        
    public function delete(){
        if ( empty( $this->session->session_login[ 'username' ] ) ) {
            $this->session->set_flashdata( 'pesan', 'Anda harus login terlebih dahulu.' );
            redirect( site_url( 'controllerLogin' ) );
        } 
        $id = $this->uri->segment(3);
    
        // Hapus dari tabel 'menu' berdasarkan 'id'
        $this->db->delete("menu", array("id" => $id));
    
        // Hapus dari tabel 'materi' berdasarkan 'id_menu'
        $this->db->where("id_menu", $id);
        $this->db->delete("materi");
    
        // Hapus dari tabel 'file_custom' berdasarkan 'id_materi'
        // Kita perlu mendapatkan semua id_materi yang terkait dengan id_menu yang akan dihapus
        $this->db->where("id_menu", $id);
        $materi_ids = $this->db->select("id_materi")->get("materi")->result_array();
    
        if (!empty($materi_ids)) {
            // Extract all id_materi from the result array
            $ids = array_column($materi_ids, "id_materi");
            $this->db->where_in("id_materi", $ids);
            $this->db->delete("file_custom");
        }
    
        // Redirect kembali ke halaman sebelumnya
        redirect($_SERVER['HTTP_REFERER']);
    }
    
}
