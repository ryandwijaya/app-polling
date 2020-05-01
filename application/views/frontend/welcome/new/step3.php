<link href="<?= base_url() ?>assets/vk/docs/css/jquery-ui.min.css" rel="stylesheet">

<!--<script src="--><?//= base_url() ?><!--assets/vk/docs/js/jquery-latest-slim.min.js"></script>-->
<!--<script src="--><?//= base_url() ?><!--assets/vk/docs/js/jquery-migrate-3.1.0.min.js"></script>-->
<script src="<?= base_url() ?>assets/vk/docs/js/jquery-ui-custom.min.js"></script>

<!-- keyboard widget css & script (required) -->
<link href="<?= base_url() ?>assets/vk/css/keyboard.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/vk/js/jquery.keyboard.js"></script>

<!-- keyboard extensions (optional) -->
<script src="<?= base_url() ?>assets/vk/js/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/vk/js/jquery.keyboard.extension-typing.js"></script>
<script src="<?= base_url() ?>assets/vk/js/jquery.keyboard.extension-autocomplete.js"></script>
<script src="<?= base_url() ?>assets/vk/js/jquery.keyboard.extension-caret.js"></script>

<!-- demo only -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vk/docs/css/font-awesome.min.css">
<script src="<?= base_url() ?>assets/vk/docs/js/demo.js"></script>

<div class="row mt-4 justify-content-center">
	<div class="col-10 bg-white p-4 rounded">
		<div class="row mb-3">
			<div class="col-12 text-center">
				<h4>SILAHKAN ISI SARAN ANDA</h4>
			</div>
		</div>
		<form action="<?= base_url() ?>step-5" method="POST">
			<div class="row">
				<div class="col-2"><label>No. Responden</label></div>
				<div class="col-10"><input id="text" type="text" placeholder="kosongkan jika tidak ada" name="no_responden" class="form-control p-1 text"></div>
			</div>

			<div class="row mt-3">
				<div class="col-2"><label>Nama</label></div>
				<div class="col-10"><input id="text" type="text" placeholder="Masukkan Nama Anda" name="nama" required class="form-control p-1 text"></div>
			</div>
			<div class="row mt-3">
				<div class="col-2"><label>Umur</label></div>
				<div class="col-10"><input id="num" type="text"  placeholder="Masukkan Umur" name="umur" required class="form-control p-1"></div>
			</div>

		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
			$("input").removeClass("ui-widget-content");
	});
</script>
