<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->load->model('HomeModel');
        $this->load->model('MenuModel');
        $this->load->library('form_validation');
        $this->load->library('upload');
        // if (empty($this->session->session_login['username'])) {
        //     $this->session->set_flashdata("pesan", "Anda harus login terlebih dahulu.");
        //     redirect(site_url("controllerLogin"));
        // }
    }

    public function index()
    {
        if (!isset($this->MenuModel)) {
            $this->load->model('MenuModel');
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
    
        // Untuk tampilan biasa, muat view
        $this->load->view("header", $data);
        $this->load->view("dashboard", $data);
        $this->load->view("footer");
    }
    
    

}
