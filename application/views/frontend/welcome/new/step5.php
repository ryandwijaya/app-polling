
<div class="row mt-4 justify-content-center">
	<div class="col-8 bg-white p-4 rounded">
		<div class="row ">
			<div class="col-12 text-center">
				<h4>SILAHKAN ISI SARAN ANDA</h4>
			</div>
		</div>
		<form action="<?= base_url() ?>step-5" method="POST">
		<div class="row mt-4 justify-content-center">
			<div class="col-md-10 text-center">
				<input type="hidden" value="<?= $_GET['rspndn'] ?>" name="id_kpsn">
				<textarea name="saran" class="form-control example-1" cols="30" rows="7" placeholder="Isi saran anda disini ... "></textarea>
			</div>
		</div>
		<div class="row mt-5 justify-content-center">
			<!--        <div class="col-md-4 text-center">-->
			<!--            <a href="javascript:history.back()" class="btn btn-info btn-lg" style="width: 100%; height: 50pt; font-size: 20pt;">Back</a>-->
			<!--        </div>-->
			<!--		<div class="col-md-2"></div>-->
			<div class="col-md-4 m-2">
				<button class="btn btn-warning btn-lg" type="submit" name="kirim" style="width: 100%; height: 50pt; font-size: 20pt;">Lewati</button>
			</div>
			<div class="col-md-4 m-2">
				<button class="btn btn-success btn-lg" type="submit" name="kirim" style="width: 100%; height: 50pt; font-size: 20pt;">Kirim Saran</button>
			</div>
		</div>
		</form>
	</div>
</div>
