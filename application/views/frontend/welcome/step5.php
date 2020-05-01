<!-- <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.css">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/demo.css"> -->

<script src="<?= base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.js?v=1.0.0&&load=<?= time()?>"></script>
<script src="<?= base_url() ?>assets/virtual-keyboard/demo.js"></script>
<style>
	#konten{
		color: <?= $setting['set_font_color'] ?>;
		background: <?= $setting['set_background'] ?>;
	}
	input[type=text],input[type=number],select,textarea{
		font-weight: 900;
	}
</style>
<button class="btn rounded-circle btn-info" id="fixedButton" title="Tutup Keyboard"><i class="fa fa-keyboard"></i></button>
<div class="row p-4 full-height" id="konten">
	<div class="col-md-12">
		<!--		HEADER-->
		<div class="row p-2">
			<div class="col-md-12 header-monitor">
				<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
			</div>
		</div>
		<form action="<?= base_url() ?>step-5" method="POST">
		<!--		CONTENT-->
		<div class="row mt-4 justify-content-center">
			<div class="col-md-10 text-center">
				<input type="hidden" value="<?= $_GET['rspndn'] ?>" name="id_kpsn">
				<h5 class="mt-5">Silahkan Isi Saran Anda :</h5>
				<textarea name="saran" class="form-control example-1" cols="30" rows="10" placeholder="Isi saran anda disini ... "></textarea>
			</div>
		</div>
		<div class="row mt-5 justify-content-center">
			<!--        <div class="col-md-4 text-center">-->
			<!--            <a href="javascript:history.back()" class="btn btn-info btn-lg" style="width: 100%; height: 50pt; font-size: 20pt;">Back</a>-->
			<!--        </div>-->
			<!--		<div class="col-md-2"></div>-->
			<div class="col-md-4">
				<button class="btn btn-success btn-lg" type="submit" name="kirim" style="width: 100%; height: 50pt; font-size: 20pt;">Kirim Saran</button>
			</div>
		</div>
	</form>

	</div>
</div>

