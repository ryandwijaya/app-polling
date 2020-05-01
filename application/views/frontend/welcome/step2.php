<style>
	#konten{
		color: <?= $setting['set_font_color'] ?>;
		background: <?= $setting['set_background'] ?>;
	}
	input[type=text],input[type=number],select{
		font-weight: 900;
	}
</style>

<div class="row p-4 full-height" id="konten">
	<div class="col-md-12">
		<!--		HEADER-->
		<div class="row p-2">
			<div class="col-md-12 header-monitor">
				<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
			</div>
		</div>

		<!--		CONTENT-->
		<div class="row mt-4 justify-content-center">
			<div class="col-md-10 text-center">
				<h2 class="mt-2">SILAHKAN MENGISI POLLING SURVEY INI</h2>
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
