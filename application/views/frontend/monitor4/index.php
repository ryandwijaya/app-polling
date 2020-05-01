

<div class="container p-5 ">
	<div class="row header-monitor">
		<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
	</div>
	<p id='theTarget' style="display: none"><?= $setting['set_timer'] ?></p>
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
					setTimeout(function () {
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
					}, 1000);
					$(this).addClass("animated flash");
					$('.lanjut').addClass("animated flipOutY");
					$(this).removeClass("flipOutY");
					setTimeout(function () {
						$('.lanjut').removeClass("animated flipOutY");

					}, 1000);

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

	<script>
		$(document).ready(function() {
			var root = window.location.origin + '/app-polling/';
			var url = window.location.pathname;
			var id = url.substring(url.lastIndexOf('/') + 1);
			var timer = setInterval(function() {

				var count = parseInt($('#theTarget').html());
				if (count !== 0) {
					$('#theTarget').html(count - 1);
					if ($('#theTarget').html() == 0){
						window.location.href = root + 'ajaxResetKpsn4/' + id ;
					}
				} else {
					clearInterval(timer);
				}
			}, 1000);
		});
	</script>


