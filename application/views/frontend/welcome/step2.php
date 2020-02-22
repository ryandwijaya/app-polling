<div class="container p-5 animated fadeIn mt-5" style="background: <?= $setting['set_background'] ?>;">
	<div class="row">
		<div class="col-md-2">
			<img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80"
				 height="80" class="border">
		</div>
		<div class="col-md-8 text-center pt-3">
			<h1><?= $instansi['instansi_nama'] ?></h1>
			<h4><?= $instansi['instansi_alamat'] ?>, <?= $instansi['instansi_telepon'] ?></h4>
		</div>
		<div class="col-md-2 text-right">
			<img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80"
				 height="80" class="border">
		</div>
	</div>
	<hr>
	<div class="row mt-3">
		<div class="col-md-12 text-center">
			<h2 class="mt-5">SILAHKAN MENGISI POLLING SURVEY INI</h2>
			<h2 class="mt-5">SESUAI DENGAN PILIHAN ANDA SENDIRI</h2>
			<h2 class="mt-5">POLLING SURVEY INI BERGUNA DEMI KEMAJUAN</h2>
			<h2 class="mt-5">PELAYANAN YANG LEBIH BAIK</h2>
			<h2 class="mt-5">PADA MASA YANG AKAN DATANG</h2>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-md-12 text-center">
			<?php if ($instansi['instansi_app_responden'] == 'yes'): ?>
				<a href="<?= base_url() ?>step-3" class="btn btn-success btn-lg"
				   style="width: 40%; height: 50pt; font-size: 20pt;">LANJUT</a>
			<?php else: ?>
				<a href="<?= base_url() ?>step-4" class="btn btn-success btn-lg"
				   style="width: 40%; height: 50pt; font-size: 20pt;">LANJUT</a>

			<?php endif; ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		var root = window.location.origin + '/app-polling/';
		$(document).keypress(function (key) {
			let btnSetting = key.originalEvent.charCode;

			if (btnSetting === 13) {
				window.location.href = root + 'step-3';
			}
		});
	})
</script>
<!-- <script type="text/javascript">

    function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

        if (requestMethod) { // Native full screen.
            requestMethod.call(element);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
</script> -->
