<div class="row animated bounceIn">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Pengaturan Monitor</h3>
				<!-- <a href="#" class="text-primary float-right pr-2" id="btn-edit"><h5><i class="fa fa-edit"></i> Edit</h5></a> -->
			</div>
			<div class="card-body pb-4">
				<h5 class="text-center mb-3">PREVIEW TAMPILAN</h5>
				<div class="row justify-content-center">

					<div class="col-md-8 border" style="height: 350px;background: url('<?= base_url('assets/upload/bg/')  ?><?= $set_monitor['set_background_body'] ?>');background-size: cover;">
						<div class="row mt-5 justify-content-center" >
							<div class="col-md-10 border text-center" id="preview-kop" style="height: 50px;">
									<h5 class="mt-3">Background KOP</h5>
							</div>
						</div>

						<div class="row mt-5 justify-content-center">
							<div class="col-md-10 border " id="preview-pertanyaan" style="height: 180px;">
								<div class="row ">
									<div class="col-md-12 text-center">
										<h5 class="mt-3">Pertanyaan</h5>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-12 text-center">
										<button class="preview-btn btn text-light" style="width: 120px;">A</button>
										<button class="preview-btn btn text-light" style="width: 120px;">B</button>
										<br><br>
										<button class="preview-btn btn text-light" style="width: 120px;">C</button>
										<button class="preview-btn btn text-light" style="width: 120px;">D</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>


				<form action="<?= base_url() ?>set/monitor2" enctype="multipart/form-data" method="POST">
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

					<div class="row mt-3" style="display: none;">
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

					<div class="row mt-3">
						<div class="col-md-2"></div>
						<div class="col-md-4 col s12">

							<label> Background KOP Header </label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="background_kop" id="back-kop" class="form-control"
										   value="<?= $set_monitor['set_background_kop'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-4 col s12">

							<label> Background Pertanyaan </label>
							<div class="input-group colorpicker">
								<div class="form-line">
									<input type="text" name="background" id="back-ptn" class="form-control"
										   value="<?= $set_monitor['set_background'] ?>">
								</div>
								<span class="input-group-addon">
                                <i class="border"></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>

					<div class="row mt-3">
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
								<option value="Theme 6">Theme 6</option>
								<option value="Theme 7">Theme 7</option>
								<option value="Theme 8">Theme 8</option>
								<option value="Theme 9">Theme 9</option>
								<option value="Theme 10">Theme 10</option>
							</select>
						</div>
						<div class="col-md-4 col s12 text-center">
							<div class="btn mt-4 text-light pt-2 preview-btn"
								 style="width: 200px;background: <?= $set_monitor['set_background_button'] ?> ;"
								 >A. Option 1
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>


					<div class="row mt-3">
						<div class="col-md-2"></div>
						<div class="col-md-2 col">
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
						<div class="col-md-2 ">
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
						<div class="col-md-2">
							<label> Waktu Reset</label>
							<div class="input-group">
								<div class="form-line">
									<input type="number" name="timer" class="form-control"
										   value="<?= $set_monitor['set_timer'] ?>">
								</div>
								<span class="input-group-addon"> Detk
								</span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>


					<div class="row mt-3">
						<div class="col-md-2"></div>
						<div class="col-md-8 col s12">
							<label> Background Body</label>
							<div class="input-group">
								<div class="form-line">
									<input type="file" class="dropify" name="background_body" data-default-file="<?= base_url('assets/upload/bg/')  ?><?= $set_monitor['set_background_body'] ?>" data-max-file-size="2M" data-min-width="1280" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
								</div>
								<span class="input-group-addon">
                                <i ></i>
                            </span>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>


					<div class="row mt-3">
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


