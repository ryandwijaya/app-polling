<style>
	<?php if ($setting['set_shape_button'] == 'Theme 1'): ?>
	.lanjut{
		clip-path: polygon(93% 0, 100% 50%, 94% 100%, 0% 100%, 3% 53%, 0% 0%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 2'): ?>
	.lanjut{
		clip-path: polygon(50% 0%, 95% 0, 100% 35%, 100% 70%, 95% 100%, 50% 100%, 6% 100%, 0% 70%, 0% 35%, 6% 0);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 3'): ?>
	.lanjut{
		clip-path: polygon(15% 3%, 100% 0%, 86% 100%, 0% 100%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 4'): ?>
	.lanjut{
		-webkit-clip-path: polygon(92% 1%, 100% 48%, 93% 100%, 8% 100%, 0 48%, 8% 0);
		clip-path: polygon(92% 1%, 100% 48%, 93% 100%, 8% 100%, 0 48%, 8% 0);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 5'): ?>
	.lanjut{
		clip-path: polygon(50% 0%, 100% 0, 96% 50%, 100% 100%, 68% 100%, 32% 100%, 0 100%, 5% 51%, 0 0);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 6'): ?>
	.lanjut{
		clip-path: polygon(0 0, 91% 0, 96% 42%, 96% 68%, 100% 100%, 11% 100%, 6% 65%, 6% 41%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 7'): ?>
	.lanjut{
		clip-path: polygon(50% 0%, 100% 38%, 93% 100%, 5% 100%, 0% 38%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 8'): ?>
	.lanjut{
		clip-path: polygon(0% 15%, 6% 14%, 6% 1%, 91% 0, 91% 12%, 100% 15%, 100% 85%, 92% 88%, 92% 100%, 5% 100%, 5% 85%, 0% 85%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 9'): ?>
	.lanjut{
		clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 75% 75%, 44% 100%, 50% 75%, 0% 75%);
	}
	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 10'): ?>
	.lanjut{
		clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 100%);
	}
	<?php endif ?>

	body {
		background: url('<?= base_url() ?>/assets/upload/bg/<?= $setting['set_background_body'] ?>');
		background-size: cover;
		color: <?= $setting['set_font_color'] ?>;
	}

	#box {
		background: <?= $setting['set_background'] ?>;
	}

	.lanjut {
		background: <?= $setting['set_background_button'] ?>;
	}
</style>
<div class="container p-5">
	<div class="row pt-2" style="background: <?= $setting['set_background_kop'] ?>; ">
		<div class="col-md-2">
			<img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80"
				 height="80" class="border">
		</div>
		<div class="col-md-8 text-center pt-3">
			<h1><?= $instansi['instansi_nama'] ?></h1>
			<h5><?= $instansi['instansi_alamat'] ?></h5>
		</div>
		<div class="col-md-2 text-right">
			<img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80"
				 height="80" class="border">
		</div>
	</div>
	<hr>

	<div class="row mt-3" id="box">
		<div class="col-md-12">
			<?php
			foreach ($ptn as $i => $var) { ?>


				<div class="row mt-5" id="<?= "ptn" . $i ?>"
					<?php if ($i != 0): ?>

						style="display: none;"
					<?php endif ?>
				>
					<div class="col-md-12 text-center">
						<h1 class="mt-5 pesan"><?= $var['ptn4_txt'] ?></h1>

					</div>
				</div>

				<div class="row mt-5 intro" id="<?= "jwb" . $i ?>"
					<?php if ($i != 0): ?>

						style="display: none;"
					<?php endif ?>
				>

					<div class="col-md-12 justify-content-md-center text-center">
						<div class="row justify-content-md-center">
							<?php
							$get_jwb = $this->Monitor4Model->getJwb($var['ptn4_id']);
							?>
							<?php foreach ($get_jwb as $value): ?>
								<button class="btn btn-success btn-lg lanjut col-md-4" id="<?= $var['ptn4_id'] ?>"
										value="<?= $value['jwb4_option'] ?>"
										style="width: auto;height: auto;margin: 10px;"><h5><?= $value['jwb4_option'] ?>
										. <?= $value['jwb4_ket'] ?></h5></button>
							<?php endforeach ?>


						</div>


					</div>
				</div>

			<?php } ?>

			<div class="row mt-5" id="<?= "ptn" . count($ptn) ?>" style="display: none;">
				<div class="col-md-12 text-center">
					<h1 class="mt-5 pesan">Survey Telah Selesai !!</h1>
					<h1 class="mt-5 pesan">Terimakasih Telah Mengisi Survei Ini !!</h1>
				</div>
			</div>


		</div>


	</div>

	<script>
		function myFunction() {
			var root = window.origin + '/app-polling/';
			location.replace(root + 'mntr4/step1');
		}


		$(document).ready(function () {
			var a = 0;
			var max = <?= count($ptn) ?>;
			$('.lanjut').click(function () {
				if (a < max) {
					$('#ptn' + (a)).hide();
					$('#ptn' + (a + 1)).show();

					$('#jwb' + (a)).removeClass("intro");
					$('#jwb' + (a)).hide();
					$('#jwb' + (a + 1)).show();
					$('#jwb' + (a + 1)).addClass("intro");
					if (a == (max - 1)) {
						setInterval(myFunction, 2000);
					}
					a = a + 1;

				} else {
					return a;
				}

			});

		});

	</script>
	<script>
		var root = window.location.origin + '/app-polling/';

		$('.lanjut').click(function () {
			var ptn = $(this).attr('id');
			var jwb = $(this).val();
			var url = window.location.pathname;
			var id = url.substring(url.lastIndexOf('/') + 1);
			var getUrl = root + 'ajaxInsert/' + ptn + '/' + jwb + '/' + id;

			$.ajax({
				url: getUrl,
				type: "POST",
				cache: false,
				data: {
					ptn: ptn,
					id: id,
					jwb: jwb
				},
				success: function (dataResult) {

					console.log(dataResult);
				}
			});
		});
	</script>


