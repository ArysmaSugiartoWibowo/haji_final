<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi E-Learning Pembelajaran Fiqih Berbasis Web Studi Kasus MTsN 7 Tanah Datar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/toast-master/css/jquery.toast.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/dist/summernote.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
       <!-- Font Awesome CSS -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

       <!-- ttd -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .signature-pad { border: 1px solid #ccc; }
    </style>
       <!--  -->

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-success">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">MTsN 7 Tanah Datar</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <!--  -->
                        <!-- <li class="nav-header">Beranda</li> -->
                        <li class="nav-item has-treeview">
                                <a href="<?= site_url('controllerHome') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <!-- <li class="nav-header">Menu Materi</li> -->
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    List Kelas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-header">Kelas</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas VII
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-header">Semester</li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-gasal-link"  id="submitLink">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Gasal
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Menu Semester Gasal</li>
                                                    <?php foreach ($menu as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                    <?php if ($this->session->userdata('session_login')) : ?>
                                                    <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-genap-link">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Genap
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                <li class="nav-header">List Menu Semester Genap</li>
                                                    <?php foreach ($menu2 as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                   <?php if ($this->session->userdata('session_login')) : ?>
                                                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                                
                                            </li>
                                            <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                        </ul>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas VIII
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-header">Semester</li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-gasal-link"  id="submitLink">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Gasal
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Menu Semester Gasal</li>
                                                    <?php foreach ($menuVIII1 as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                    <?php if ($this->session->userdata('session_login')) : ?>
                                                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-genap-link">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Genap
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                <li class="nav-header">List Menu Semester Genap</li>
                                                    <?php foreach ($menuVIII2 as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    
                                                    <?php endforeach; ?>
                                                   <?php if ($this->session->userdata('session_login')) : ?>
                                                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                                
                                            </li>
                                            <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                        </ul>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas IX
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-header">Semester</li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-gasal-link"  id="submitLink">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Gasal
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Menu Semester Gasal</li>
                                                    <?php foreach ($menuIX1 as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                  <?php if ($this->session->userdata('session_login')) : ?>
                                                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link semester-genap-link">
                                                <i class="fab fa-pagelines nav-icon"></i>
                                                    <p>
                                                    Semester Genap
                                                    <i class="fas fa-angle-left right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                <li class="nav-header">List Menu Semester Genap</li>
                                                    <?php foreach ($menuIX2 as $item): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= site_url('controllerMateri/index/') . $item['id']; ?>" class="nav-link">
                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                        <p><?php echo $item['nama_menu']; ?></p>
                                                        </a>
                                                    </li>
                                                    
                                                    <?php endforeach; ?>
                                                    <?php if ($this->session->userdata('session_login')) : ?>
                                                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                                                        <li class="nav-item">
                                                            <a href="<?= site_url('controllerMenu/listMenu') ?>" class="nav-link">
                                                            <i class="nav-icon fas fa-tools"></i>
                                                                <p>
                                                                Kelola Data Menu
                                                                </p>
                                                            </a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php endif;?>
                                                    <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                </ul>
                                                
                                            </li>
                                            <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                        </ul>
                                    </li> 
                                    
                            </li> 
                                   
                                </ul>
                        </li>







                        <!-- <li class="nav-header">Logout</li> -->


                        <?php if ($this->session->userdata('session_login')) : ?>
                            <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    RoolBox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-header">Kelas</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas VII
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Pertemuan</li>
                                                    <?php for ($i = 1; $i <= 13; $i++): ?>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="fas fa-grip-lines nav-icon"></i>
                                                                <p>Pertemuan <?= $i; ?></p>
                                                                <i class="fas fa-angle-left right"></i>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-header">List</li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=tugas&kelas=1') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Tugas</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=soal&kelas=1') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Soal</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                    <?php endfor; ?>

                                                </ul>
                                         
                                    </li> 
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas VIII
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Pertemuan</li>
                                                    <?php for ($i = 1; $i <= 13; $i++): ?>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="fas fa-grip-lines nav-icon"></i>
                                                                <p>Pertemuan <?= $i; ?></p>
                                                                <i class="fas fa-angle-left right"></i>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-header">List</li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=tugas&kelas=2') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Tugas</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=soal&kelas=2') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Soal</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                    <?php endfor; ?>

                                                </ul>
                                         
                                    </li> 
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kelas IX
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                        </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Pertemuan</li>
                                                    <?php for ($i = 1; $i <= 13; $i++): ?>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="fas fa-grip-lines nav-icon"></i>
                                                                <p>Pertemuan <?= $i; ?></p>
                                                                <i class="fas fa-angle-left right"></i>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-header">List</li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=tugas&kelas=3') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Tugas</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=soal&kelas=3') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Soal</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                    <?php endfor; ?>

                                                </ul>
                                         
                                    </li> 
                                   
                                    
                                </li> 
                                   
                                </ul>
                        </li>
                        <?php elseif ($this->session->userdata('session_login')['level'] == 'siswa') : ?>
                            <?php $kelas= $this->session->userdata('session_login')['kelas'];?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    RoolBox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                
                                <ul class="nav nav-treeview">
                                                    <li class="nav-header">List Pertemuan</li>
                                                    <?php for ($i = 1; $i <= 13; $i++): ?>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="fas fa-grip-lines nav-icon"></i>
                                                                <p>Pertemuan <?= $i; ?></p>
                                                                <i class="fas fa-angle-left right"></i>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-header">List</li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=tugas&kelas='.$kelas.'') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Tugas</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="<?= site_url('controllerRoolbox/?id_pertemuan=' . $i . '&type=soal&kelas='.$kelas.'') ?>" class="nav-link">
                                                                        <i class="fas fa-grip-lines nav-icon"></i>
                                                                        <p>Soal</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <hr style="border: 1px solid white; width: 100%; margin: 20px auto;">
                                                    <?php endfor; ?>

                                                </ul>
                        </li>

                            <?php endif ?>

                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= site_url('controllerLogin/user') ?>" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                  RoolBox
                                </p>
                            </a>
                        </li>
                        <?php endif?>
                        <?php if ($this->session->userdata('session_login')) : ?>
                        <?php if ($this->session->userdata('session_login')['level'] == 'admin') : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('controllerLogin/user') ?>" class="nav-link">
                            <i class="nav-icon fa-solid fa-users-viewfinder"></i>
                                <p>
                                   User
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('session_login')) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('controllerLogin/Logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-door-open"></i>
                                <p>
                                   Logout
                                </p>
                            </a>
                        </li>
                        <?php else : ?>
                            <li class="nav-item">
                            <a href="<?= site_url('controllerLogin') ?>" class="nav-link">
                            <i class="nav-icon fas fa-door-closed"></i>
                                <p>
                                   Login
                                </p>
                            </a>
                        </li>
                            <?php endif?>

    
                        <!--  -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

<!-- 1 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- 1 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        // Tambahkan class 'active' ke link jika href sesuai dengan URL saat ini
        var currentUrl = window.location.href;

        $('.nav-sidebar a').each(function() {
            if (this.href === currentUrl) {
                $(this).addClass('active');
                // Tambahkan class 'menu-open' pada parent item jika ada
                $(this).closest('.has-treeview').addClass('menu-open');
            }
        });

        // Tambahkan class 'active' ke tag a 'List Kelas' saat diklik
        $('.nav-sidebar a:contains("List Kelas")').on('click', function() {
            $('.nav-sidebar a').removeClass('active');  // Hilangkan class 'active' dari semua link
            $(this).addClass('active');  // Tambahkan class 'active' ke tag a 'List Kelas' yang diklik
        });
    });
</script> -->
