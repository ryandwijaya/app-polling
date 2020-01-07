<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>App-Polling</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts-3d.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/exporting.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/export-data.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/accessibility.js"></script>
</head>
<style>
    *{
        padding: 0;
        margin:0;
    }
    body{
        position: fixed;
        margin:0;
        padding: 0;
        /*background: url('<?= base_url() ?>/assets/upload/bg/Digtive.png');*/
        background-repeat: no-repeat;
        background-size: cover;
        background-position: fixed;
    }
    .header-monitor{
        background : <?= $getData['umum_bg_header'] ?> ; 
    }
    .body-video{
        background : <?= $getData['umum_bg_video'] ?> ; 
    }
    .body-chart{
        background : <?= $getData['umum_bg_chart'] ?> ; 
    }
    .footer-marquee{
        background : <?= $getData['umum_bg_marquee'] ?> ; 
    }
    @media all and (display-mode: fullscreen) {
      body {
        zoom:107%;
      }
    }

</style>
<body>
      <div id="content-header">
         <div class="row justify-content-center">
                
                <div class="col-1">
                  <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="100" height="100">
                </div>
                <div class="col-6 text-center">
                  <h1><?= $instansi['instansi_nama'] ?></h1> 
                  <h5><?= $instansi['instansi_alamat'] ?></h5>
                  <h5><?= $instansi['instansi_telepon'] ?></h5>
                </div>

                <div class="col-3">
                  <h3><div id="clock"></div></h3>
                  <h5><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h5>
                </div>

         </div>
      </div>


</body>
<script src="<?= base_url() ?>assets/js/app-polling/jam.js"></script>
