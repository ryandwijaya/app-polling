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
	marquee h4,	.footer-marquee h6,	.footer-marquee h4	{
		font-size: <?= $getData['umum_font_size'] ?>px;
	}
	@media all and (display-mode: fullscreen) {
		/*body {*/
		/*	zoom:120%;*/
		/*}*/
		.header-monitor{
			margin-top: 2%;
		}
		.footer-marquee,.header-monitor{
			zoom:120%;
		}
	}
	.row{
		width: 98% !important;
		margin: 0 auto;
	}
</style>
<body class="justify-content-center">

<div class="row mt-2">
	<div class="col-md-12 header-monitor">
		<img src="<?= base_url() ?>assets/upload/kop/<?= $getData['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
	</div>
</div>

<div class="row mt-2 body-monitor">
	<div class="col-md-6 body-video">
		<?php if ($getData['umum_media']=='video'): ?>
		<video id="videoarea" width="100%" class="mt-3 ml-2" autoplay="true" controls>
			<source src="<?= base_url() ?>assets/upload/video/<?= $getData['umum_video'] ?>">
			Your browser does not support HTML5 video.
		</video>
		<button  type="button" class="btn btn-sm btn-primary ml-2 mb-2" data-toggle="modal" data-target="#exampleModal">
			Playlist
		</button>
		<?php elseif ($getData['umum_media']=='gambar'): ?>
			<div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel" data-interval="2000">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?= base_url('assets/upload/bg/batik.jpg') ?>" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?= base_url('assets/upload/bg/bg-1.jpg') ?>" alt="Second slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		<?php endif; ?>


		<audio src="<?= base_url() ?>assets/sounds/terima_kasih.wav" style="display: none" id="thanks"></audio>
	</div>
	<div class="col-md-6 body-chart">
		<div class="row">
			<div class="col-md-12 ">
				<div id="grafik-kpsn" class="text-left mt-3" style="width: 610px;height: 380px;"></div>
			</div>
		</div>
	</div>

</div>
<div class="row mt-2">
	<div class="col-md-10 footer-marquee p-3">
		<marquee><h4> <?= $getData['umum_text_bot'] ?> </h4></marquee>
	</div>
	<div class="col-md-2 footer-marquee text-center border-left">
		<h4 class="mt-2"><div id="clock"></div></h4>
		<h6><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h6>
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
