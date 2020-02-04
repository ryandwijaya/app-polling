<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Pengaturan Monitor</h3>
				<!-- <a href="#" class="text-primary float-right pr-2" id="btn-edit"><h5><i class="fa fa-edit"></i> Edit</h5></a> -->
			</div>
			<div class="card-body pb-4">

				<form action="<?= base_url() ?>set/monitor2" method="POST">

					<div class="row mt-4" style="display: none;">
						<div class="col-md-2"></div>
						<div class="col-md-8 input-field col s12">
							<select name="id_lynn" required>
								<option value="<?= $set_monitor['set_lyn'] ?>" selected>- Monitor -</option>
								<!-- <?php foreach ($lyn as $va): ?>
                                <option value="<?= $va['lynn_id'] ?>"><?= $va['lynn_nm'] ?></option>
                            <?php endforeach ?> -->
							</select>
							<label>Layanan</label>
						</div>
						<div class="col-md-2"></div>
					</div>

					<div class="row mt-4" style="display: none;">
						<div class="col-md-2"></div>
						<div class="col-md-8 input-field col s12">
							<select name="ptn" required>
								<option value="<?= $set_monitor['set_ptn'] ?>" selected>- Pilih Pertanyaan -</option>
								<?php foreach ($ptn as $var): ?>
									<option value="<?= $var['ptn_id'] ?>"><?= $var['ptn_txt'] ?></option>
								<?php endforeach ?>
							</select>
							<label>Pertanyaan</label>
						</div>
						<div class="col-md-2"></div>
					</div>

					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-8 col s12">

							<label> Background KOP Header </label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="background_kop" class="form-control"
										   value="<?= $set_monitor['set_background_kop'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>

					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-8 col s12">

							<label> Background Monitor </label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="background" class="form-control"
										   value="<?= $set_monitor['set_background'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>



					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-4 col s12">
							<label> Bentuk Button </label>
							<select name="shape_button" id="select-button">
								<option value="<?= $set_monitor['set_shape_button'] ?>" selected>Pilih Style</option>
								<option value="Theme 1">Theme 1</option>
								<option value="Theme 2">Theme 2</option>
								<option value="Theme 3">Theme 3</option>
								<option value="Theme 4">Theme 4</option>
								<option value="Theme 5">Theme 5</option>
							</select>
						</div>
						<div class="col-md-4 col s12 text-center">
							<div class="btn mt-4 text-light pt-2"
								 style="width: 200px;background: <?= $set_monitor['set_background_button'] ?> ;"
								 id="preview-btn">A. Option 1
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>


					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-8 col s12">

							<label> Color Button </label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="background_button" id="color-button" class="form-control"
										   value="<?= $set_monitor['set_background_button'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>

					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-8 col s12">

							<label> Font Color</label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="font_color" class="form-control"
										   value="<?= $set_monitor['set_font_color'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>


					<div class="row mt-4">
						<div class="col-md-2"></div>
						<div class="col-md-4"></div>
						<div class="col-md-4 text-center">
							<button class="btn btn-success btn-sm" style="width: 200px;" type="submit" name="set">Simpan</button>
						</div>
						<div class="col-md-2"></div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>


