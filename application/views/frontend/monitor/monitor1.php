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
        background: url('<?= base_url() ?>/assets/upload/bg/Digtive.png');
        background-repeat: no-repeat;
        background-size: cover;
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

</style>
<body>
        <!-- CONTENT -->
        <div class="row justify-content-md-center mb-2">
            <div class="col-md-1 header-monitor pt-3 pb-3 text-left">
                <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="90" height="90">
            </div>
            <div class="col-md-7 header-monitor pt-3 pb-3 text-center">
                <h1><?= $instansi['instansi_nama'] ?></h1> 
                <h5><?= $instansi['instansi_alamat'] ?></h5>
            </div>
            <div class="col-md-2 header-monitor pt-3 pb-3 text-center">
                <h3><div id="clock"></div></h3>
                <h5><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h5>
            </div>
        </div>

        <div class="row body-monitor justify-content-md-center">
            <div class="col-md-5 rounded body-video pt-3 pb-3">
                <h5>Video :</h5>
                <video width="100%" autoplay="true">
                <source src="<?= base_url() ?>assets/upload/video/<?= $getData['umum_video'] ?>">
                  Your browser does not support HTML5 video.
            </video>
            </div>
            <div class="col-md-5 rounded  body-chart pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Grafik Kepuasan </h5>
                        <div id="grafik-kpsn" style="min-width: 400px; height: 350px; max-width: 600px; margin: 0 auto"></div>
                    </div>
                </div>
                <div class="row">
                        <?php if ($this->session->userdata('sess_hr_versi')=='empat' ||  $this->session->userdata('sess_hr_versi')=='lima'): ?>
                        <div class="col">
                            <h3 id="persen-sangat">Sangat Puas :</h3>
                        </div>
                        <?php endif ?>
                        <div class="col">
                            <h3 id="persen-puas">Puas :</h3>
                        </div>
                        <div class="col">
                            <h3 id="persen-cukup">Cukup Puas :</h3>
                        </div>
                        <div class="col">
                            <h3 id="persen-tidak">Tidak Puas :</h3>
                        </div>
                        <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
                        <div class="col">
                            <h3 id="persen-stidak">Sangat Puas :</h3>
                        </div>
                        <?php endif ?>
                </div>
            </div>
        </div>
    
        <div class="row footer-monitor justify-content-md-center mt-2">

            <div class="col-md-10 footer-marquee pt-1">
                <marquee><h4> <?= $getData['umum_text_bot'] ?> </h4></marquee>
            </div>
        </div>
        <script src="<?= base_url() ?>assets/js/app.min.js"></script>


        <script src="<?= base_url() ?>/assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts-3d.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/exporting.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/export-data.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/accessibility.js"></script>


</body>

<script src="<?= base_url() ?>assets/js/app-polling/jam.js"></script>


<!-- CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART  -->  
<?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/tiga/monitor1.js"></script>
<?php endif ?>


<?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/empat/monitor1.js"></script>

<?php endif ?>


<?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/lima/monitor1.js"></script>

<?php endif ?>