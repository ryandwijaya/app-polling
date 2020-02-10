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
	<link href="<?= base_url() ?>assets/css/styles/all-themes.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet">
	<!-- Custom Css -->
	<?php if ($this->uri->segment(1) != 'monitor3'): ?>
		<?php if ($this->uri->segment(1) != 'monitor4'): ?>
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
		<?php endif; ?>
	<?php endif; ?>
<!--	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
	<link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet" />
	<!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <script src="<?= base_url() ?>assets/js/Chart.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
</head>
<style>
	input{
		background: white !important;
		/*border-radius: 10px;*/
	}
	@media all and (display-mode: fullscreen) {
		body {
			zoom:110%;
		}
	}
</style>
<body>

