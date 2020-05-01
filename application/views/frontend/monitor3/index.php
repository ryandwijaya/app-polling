
<div class="container pt-5 ">

	<div class="row header-monitor">
		<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
	</div>
	<p id='theTarget' style="display: none"><?= $setting['set_timer'] ?></p>
	<hr>


	<div class="row mt-3" id="box">
		<div class="col-md-12">


			<?php
			for ($i = 0; $i < count($ptn); $i++) { ?>

				<div class="row " id="<?= "ptn" . $i ?>" <?php if ($i != 0): ?> style="display: none;" <?php endif ?> >
					<div class="col-md-12 text-center">
						<h1 class="mt-5 pesan"><?= $i + 1 ?>. <?= $ptn[$i] ?></h1>
					</div>
				</div>

				<div class="row mt-5 intro"
					 id="<?= "jwb" . $i ?>" <?php if ($i != 0): ?> style="display: none;" <?php endif ?> >

					<div class="col-md-12 justify-content-md-center text-center">

						<div class="row justify-content-md-center">
							<button class="btn text-light btn-lg lanjut col-md-4 button" value="A"
									style="width: auto;height: auto;"><h5>A. <?= $jwb[$i + 1][0] ?></h5>
							</button>
							<button class="btn text-light btn-lg lanjut col-md-4 button" value="B"
									style="width: auto;height: auto;"><h5>B. <?= $jwb[$i + 1][1] ?></h5>
							</button>
							<button class="btn text-light btn-lg lanjut col-md-4 button" value="C"
									style="width: auto;height: auto;"><h5>C. <?= $jwb[$i + 1][2] ?></h5>
							</button>
							<button class="btn text-light btn-lg lanjut col-md-4 button" value="D"
									style="width: auto;height: auto;"><h5>D. <?= $jwb[$i + 1][3] ?></h5>
							</button>
						</div>


					</div>
				</div>

			<?php } ?>

			<div class="row mt-5" id="<?= "ptn15" ?>" style="display: none;">
				<div class="col-md-12 text-center">
					<h1 class="mt-5 pesan">Survey Telah Selesai !!</h1>
					<h1 class="mt-5 pesan">Terimakasih Telah Mengisi Survei Ini !!</h1>
				</div>
			</div>


		</div>
	</div>


</div>

<script>
	function myFunction() {
		var root = window.origin + '/app-polling/';
		location.replace(root + 'mntr3/step1');
	}


	$(document).ready(function () {
		var a = 0;
		var max = 15
		$('.lanjut').click(function () {

			if (a < 15) {
				setTimeout(function () {
					$('#ptn' + (a)).hide();
					$('#ptn' + (a + 1)).show();

					$('#jwb' + (a)).removeClass("intro");
					$('#jwb' + (a)).hide();
					$('#jwb' + (a + 1)).show();
					$('#jwb' + (a + 1)).addClass("intro");
					if (a == 14) {
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
		var jwb = $(this).val();
		var field = $('.intro').attr('id');
		var url = window.location.pathname;
		var id = url.substring(url.lastIndexOf('/') + 1);
		var getUrl = root + 'ajaxUpdate/' + id + '/' + field + '/' + jwb;

		$.ajax({
			url: getUrl,
			type: "POST",
			cache: false,
			data: {
				jwb: jwb,
				field: field,
				id: id,
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
					window.location.href = root + 'ajaxReset/' + id ;
				}
			} else {
				clearInterval(timer);
			}
		}, 1000);
	});
</script>




