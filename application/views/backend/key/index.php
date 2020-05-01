<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h3>Pengaturan Key Kepuasan</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url() ?>set/key" method="POST">
				<div class="row justify-content-center">

					<div class="col-md-12">
<!--						BATAS-->
						<div class="row justify-content-center mt-3">
							<div class="col-md-2">
								<h3>Loket 5</h3>
							</div>
							<div class="col-md-2">
								<input type="text" name="5_key_1" value="<?= $loket5['key_1'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="5_key_2" value="<?= $loket5['key_2'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="5_key_3" value="<?= $loket5['key_3'] ?>" class="form-control text-center input-key">
							</div>
						</div>

						<!--						BATAS-->
						<div class="row justify-content-center mt-3">
							<div class="col-md-2">
								<h3>Loket 4</h3>
							</div>
							<div class="col-md-2">
								<input type="text" name="4_key_1" value="<?= $loket4['key_1'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="4_key_2" value="<?= $loket4['key_2'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="4_key_3" value="<?= $loket4['key_3'] ?>" class="form-control text-center input-key">
							</div>
						</div>

						<!--						BATAS-->
						<div class="row justify-content-center mt-3">
							<div class="col-md-2">
								<h3>Loket 3</h3>
							</div>
							<div class="col-md-2">
								<input type="text"  name="3_key_1" value="<?= $loket3['key_1'] ?>"  class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="3_key_2" value="<?= $loket3['key_2'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="3_key_3" value="<?= $loket3['key_3'] ?>" class="form-control text-center input-key">
							</div>
						</div>

						<!--						BATAS-->
						<div class="row justify-content-center mt-3">
							<div class="col-md-2">
								<h3>Loket 2</h3>
							</div>
							<div class="col-md-2">
								<input type="text" name="2_key_1" value="<?= $loket2['key_1'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="2_key_2" value="<?= $loket2['key_2'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="2_key_3" value="<?= $loket2['key_3'] ?>" class="form-control text-center input-key">
							</div>
						</div>

						<!--						BATAS-->
						<div class="row justify-content-center mt-3">
							<div class="col-md-2">
								<h3>Loket 1</h3>
							</div>
							<div class="col-md-2">
								<input type="text" name="1_key_1" value="<?= $loket1['key_1'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="1_key_2" value="<?= $loket1['key_2'] ?>" class="form-control text-center input-key">
							</div>
							<div class="col-md-2">
								<input type="text" name="1_key_3" value="<?= $loket1['key_3'] ?>" class="form-control text-center input-key">
							</div>
						</div>

						<div class="row justify-content-center mt-5">
							<div class="col-md-8">
								<button class="btn btn-success btn-sm float-right" type="submit" name="simpan">Simpan</button>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>



