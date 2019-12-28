<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>App-Polling</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/images/interview.png" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url() ?>assets/css/styles/all-themes.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
    
</head>
<body class="light" >
 
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="<?= base_url() ?>assets/images/loading.png" width="20" height="20" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar d-print-none">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url() ?>assets/images/candidate.png" width="25" height="25" alt="" />
                    <span class="logo-name">App-Polling </span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
                    
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="<?= base_url() ?>assets/images/interview.png" width="32" height="32" alt="User">
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">help</i> <?= $this->session->userdata('sess_hr_lyn') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a onClick="confirmLogout()" href="#" >
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right">
                        <a href="#" class="js-right-sidebar" data-close="true">
                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar d-print-none">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image">
                                <img src="<?= base_url() ?>assets/images/interview.png" class="img-circle user-img-circle" alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> <?= $this->session->userdata('sess_hr_nm') ?> </div>
                            <div class="profile-usertitle-job "><?= $this->session->userdata('sess_hr_lvl') ?> </div>
                        </div>
                    </li>
                    
                    <li >
                        <a href="<?= base_url() ?>beranda">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Beranda </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-chart-bar"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                 <a href="<?= base_url() ?>laporan/semua"> Semua</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>laporan"> Per Layanan</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>responden"> Responden</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>laporan/monitor3"> Monitor3</a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?= base_url() ?>ptn" >
                            <i class="fas fa-question-circle"></i>
                            <span>Pertanyaan</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?= base_url() ?>layanan" >
                            <i class="fas fa-server"></i>
                            <span>Layanan</span>
                        </a>
                    </li>

                     <li >
                        <a href="<?= base_url() ?>user" >
                            <i class="fas fa-users"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                   <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-cogs"></i>
                            <span>Pengaturan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                 <a href="<?= base_url() ?>instansi"> Instansi</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>umum"> Umum</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>set/monitor2"> Monitor 2</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>set/monitor4"> Monitor 4</a>
                            </li>
                            <li>
                                 <a href="#"> Android (Cooming Soon)</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-laptop"></i>
                            <span>Monitor</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                 <a href="<?= base_url() ?>monitor" target="_blank"> Monitor 1</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>step-1" target="_blank"> Monitor 2</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>mntr3/step1" target="_blank"> Monitor 3</a>
                            </li>
                            <li>
                                 <a href="<?= base_url() ?>mntr4/step1" target="_blank"> Monitor 4</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header d-print-none">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"><?= $title ?></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        