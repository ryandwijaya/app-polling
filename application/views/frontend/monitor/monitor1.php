<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
  <link rel="icon" href="<?= base_url() ?>assets/images/interview.png" type="image/x-icon">

    <title>App-Polling</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
	<script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/highchart/jquery-3.1.1.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/highchart/highcharts.js"></script>
	<script src="<?= base_url() ?>/assets/js/highchart/highcharts-3d.js"></script>
	<script src="<?= base_url() ?>/assets/js/highchart/exporting.js"></script>
	<script src="<?= base_url() ?>/assets/js/highchart/export-data.js"></script>
	<script src="<?= base_url() ?>/assets/js/highchart/accessibility.js"></script>

</head>

<style>

    body{
		color:<?= $getData['umum_font_color'] ?>;
        overflow: hidden;
		clear: both;
        margin:0;
        padding: 0;
        background: url('<?= base_url() ?>/assets/upload/bg/<?= $getData['umum_background'] ?>');
		font-family: <?= $getData['umum_font'] ?> ;
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
			zoom:110%;
		}
	}
</style>
<body>
        <!-- CONTENT -->
        <div class="row justify-content-center mb-2 mt-3">
            <div class="col-1 header-monitor pt-3 pb-3 text-left">
                <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="90" height="90">
            </div>
            <div class="col-7 header-monitor pt-3 pb-3 text-center">
                <h1><?= $instansi['instansi_nama'] ?></h1> 
                <h5><?= $instansi['instansi_alamat'] ?></h5>
            </div>
            <div class="col-2 header-monitor pt-3 pb-3 text-center">
                <h3><div id="clock"></div></h3>
                <h5><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h5>
            </div>
        </div>

        <div class="row body-monitor justify-content-center">
            <div class="col-5 rounded body-video pt-3 pb-3">
                <h5>Video :</h5>
                <video id="videoarea" width="100%" autoplay="true" controls>
                <source src="<?= base_url() ?>assets/upload/video/<?= $getData['umum_video'] ?>">
                  Your browser does not support HTML5 video.
                </video>
                <button  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Playlist
                </button>
<!--				<p class="btn btn-info" id="fulls" onclick="gofull()"><i class="fa fa-home"></i></p>-->
            </div>
            <div class="col-5 rounded  body-chart pt-3 pb-3">
                <div class="row">
                    <div class="col-12">
                        <h5 class="ml-5">Grafik Kepuasan </h5>
                        <div id="grafik-kpsn" class="text-left" style="width: 510px;height: 310px;"></div>
                    </div>
                </div>
                <div class="row">
                        <?php if ($instansi['instansi_versi_jwb']=='empat' ||  $instansi['instansi_versi_jwb']=='lima'): ?>
                        <div class="col text-center">
                            <span id="persen-sangat">Sangat Puas :</span>
                        </div>
                        <?php endif ?>

						<?php if ($instansi['instansi_versi_jwb']=='empat' ||  $instansi['instansi_versi_jwb']=='lima' ||  $instansi['instansi_versi_jwb']=='tiga'): ?>
                        <div class="col text-center">
                            <span id="persen-puas">Puas :</span>
                        </div>
                        <div class="col text-center">
                            <span id="persen-cukup">Cukup Puas :</span>
                        </div>
                        <div class="col text-center">
                            <span id="persen-tidak">Tidak Puas :</span>
                        </div>
						<?php endif ?>

                        <?php if ($instansi['instansi_versi_jwb']=='lima'): ?>
                        <div class="col text-center">
                            <span id="persen-stidak">Sangat Puas :</span>
                        </div>
                        <?php endif ?>

                </div>
            </div>
        </div>
        
        <div class="row footer-monitor justify-content-center mt-2">

            <div class="col-10 footer-marquee pt-1">
                <marquee><h4> <?= $getData['umum_text_bot'] ?> </h4></marquee>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <style>
                  #playlist {
                        display:table;
                    }
                    #playlist li{
                        cursor:pointer;
                        padding:8px;
                    }

                    #playlist li:hover{
                        color:blue;                        
                    }
              </style>
              <div class="modal-body" id="<?= count($getVideo) ?>">
                <ul id="playlist" style="list-style-type: none;">
                    <?php foreach ($getVideo as $num => $video): ?>
                        <li class="<?= 'a'.$num ?>" movieurl="<?= base_url() ?>assets/upload/video/<?= $video['video_judul'] ?>" style="font-size: 13px;">Video <?= $num+1 ?></li>
                    <?php endforeach ?>
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        
</body>
<!--<script>-->
<!--	$(document).ready(function () {-->
<!--		$('p').click();-->
<!--	})-->
<!--</script>-->
<script src="<?= base_url() ?>assets/js/app-polling/playlist-video.js"></script>

<script src="<?= base_url() ?>assets/js/app-polling/jam.js"></script>

<!--<script src="--><?//= base_url() ?><!--assets/js/app-polling/fullscreen.js?v=1.0.0&&load=--><?//= time()?><!--"></script>-->




<!-- CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART  -->
<?php if ($instansi['instansi_versi_jwb']=='monitor4'): ?>

	<script src="<?= base_url() ?>assets/js/app-polling/votes/monitor4.js"></script>
<?php endif ?>
<!-- CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART  -->
<?php if ($instansi['instansi_versi_jwb']=='monitor3'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/votes/monitor3.js"></script>
<?php endif ?>

<!-- CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART CHART  -->
<?php if ($instansi['instansi_versi_jwb']=='tiga'): ?>

<script src="<?= base_url() ?>assets/js/app-polling/tiga/monitor1.js"></script>
<?php endif ?>


<?php if ($instansi['instansi_versi_jwb']=='empat'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/empat/monitor1.js"></script>

<?php endif ?>


<?php if ($instansi['instansi_versi_jwb']=='lima'): ?>
    
<script src="<?= base_url() ?>assets/js/app-polling/lima/monitor1.js"></script>

<?php endif ?>
