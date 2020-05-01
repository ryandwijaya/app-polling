<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<title>App-Polling</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="<?= base_url() ?>assets/js/app.min.js"></script>
</head>
<style>
	* {
		padding: 0 !important;
		margin: 0 !important;
		box-sizing: border-box !important;

	}
	html{
		background: grey;
	}

	.tesin {
		/*background-image: url("*/
	<?//= base_url() ?> /*assets/images/jwb/3versi/c_3ver_tul.png");*/
		background-size: cover;
		background-repeat: no-repeat;
		border: 0;
		background: #0000008a;
		width: 100%;
		height: 70px;
		color: white;
		border-radius: 20px;
	}
	body {
		/*background: #c7c7c7 !important;*/
		overflow: hidden;
		background: url('<?= base_url() ?>/assets/upload/bg/<?= $setting['set_background_body'] ?>');
		background-size: cover;
	}
	.footer-marquee {
		background: <?= $umum['umum_bg_marquee'] ?>;
	}
	textarea{
		padding: 20px;
	}
	@media all and (display-mode: fullscreen) {
		body {
			zoom:110%;
			-moz-transform: scale(1.03);
		}
	}
</style>
<body>
<div class="row">
	<div class="col-md-12">
		<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140"
			 width="100%">
	</div>
</div>
