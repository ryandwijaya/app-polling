<style>
	#konten{
		color: <?= $setting['set_font_color'] ?>;
		background: <?= $setting['set_background'] ?>;
	}
	input[type=text],input[type=number],select{
		font-weight: 900;
	}

</style>
<!-- <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.css">
<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/demo.css"> -->

<script src="<?= base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.js?v=1.0.0&&load=<?= time()?>"></script>
<script src="<?= base_url() ?>assets/virtual-keyboard/demo.js"></script>

<button class="btn rounded-circle btn-info" id="fixedButton" title="Tutup Keyboard"><i class="fa fa-keyboard"></i></button>
<div id="keyboard" style="display: fixed;position: absolute;bottom: 0; left: 20%;right: 20%; width: 60%;background:black;display: none;z-index: 99999;"></div>
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
			<div class="col-md-10">
				<form action="<?= base_url() ?>mntr3/step1" method="POST">
					<div class="form-group row">
						<h5 class="col-md-2">No Responden</h5>
						<input type="text" class="form-control  example-3 pl-2 col-md-9" placeholder="kosongkan jika tidak ada" name="no_responden" autocomplete="off">
					</div>
					<h5 class="mt-3">Silahkan isi data diri anda :</h5>
					<div class="form-group row mt-3">
						<h5 class="col-md-2">Nama</h5>
						<input type="text" class="input form-control example-1 col-md-9 pl-2" placeholder="Masukkan Nama Anda" name="nama"  required autocomplete="off">
					</div>
					<div class="form-group row mt-3">
						<h5 class="col-md-2">Umur</h5>
						<input type="text" class="input form-control  example-2 input-numeric pl-2 col-md-9" placeholder="Masukkan Umur" name="umur" required  autocomplete="off">
					</div>
					<div class="form-group row mt-3">
						<h5 class="col-md-2">Jenis Kelamin</h5>
						<select name="jk" id="" class="form-control pl-2 col-md-9">
							<option>Pria</option>
							<option>Wanita</option>
						</select>
					</div>
					<div class="form-group row mt-3">
						<h5 class="col-md-2">Pendidikan Terakhir</h5>
						<select name="pendidikan" id="" class="form-control pl-2 col-md-9">
							<option disabled selected>- Pilih Pendidikan -</option>
							<option>SD</option>
							<option>SLTP</option>
							<option>SLTA</option>
							<option>D1-D2-D3</option>
							<option>S1</option>
							<option>S2 Keatas</option>
						</select>
					</div><div class="form-group row mt-3">
						<h5 class="col-md-2">Pekerjaan Utama</h5>
						<select name="pekerjaan" id="" class="form-control pl-2 col-md-9">
							<option disabled selected>- Pilih Pekerjaan -</option>
							<option>PNS/TNI/POLRI</option>
							<option>WIRASWASTA</option>
							<option>PEGAWAI SWASTA</option>
							<option>PELAJAR/MAHASISWA</option>
							<option>LAINNYA</option>
						</select>
					</div>
					<h5 class="mt-3">Note : Data identitas anda akan kami rahasiakan !</h5>
					<div class="row mt-3 justify-content-center">
						<div class="col-md-5">
							<button type="submit" name="lanjut" id="button-submit" style="height: 50px;font-size: 16pt;" class="btn btn-success btn-lg form-control ">LANJUT</button>
						</div>
					</div>

				</form>
			</div>
		</div>

	</div>
</div>


