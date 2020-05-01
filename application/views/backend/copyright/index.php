<div class="row animated bounceIn">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Detail Perusahaan / Instansi</h3>
			</div>
			<div class="card-body pb-4">
				<?= form_open('copyright',array('enctype'=>'multipart/form-data')) ?>
				<div class="row justify-content-center">
					<div class="col-md-8">
						<label>Header / KOP <span class="text-warning">( min: 700x120px max: 1280x300px )</span></label>
						<input type="file" class="dropify" name="kop" data-default-file="<?= base_url() ?>assets/upload/kop/<?= $cr['cr_kop'] ?>"
							   data-max-file-size="4M" data-min-width="700" data-min-height="120"
							   data-max-height="300" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-2"><input type="hidden"   name="int_id" ></div>
					<div class="col-md-8">
						<label>Nama Perusahaan / Instansi</label>
						<input type="text"  class="form-control inputan" name="instansi" value="<?= $cr['cr_instansi'] ?>" >
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row mt-4">
					<div class="col-md-2"><input type="hidden"   name="int_id" ></div>
					<div class="col-md-8">
						<label>Alamat</label>
						<textarea name="alamat"  class="form-control inputan"><?= $cr['cr_alamat'] ?></textarea>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<label>Telepon</label>
						<input type="text"  class="form-control inputan" name="telepon" value="<?= $cr['cr_telepon']  ?>">
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<label>Email</label>
						<input type="email"  class="form-control inputan" name="email" value="<?= $cr['cr_email']  ?>">
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<label>Website</label>
						<input type="text"  class="form-control inputan" name="website" value="<?= $cr['cr_website'] ?>">
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<label>Nomor Surat</label>
						<input type="text"  class="form-control inputan" name="nosurat" value="<?= $cr['cr_no_surat']  ?>">
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<label>Tgl Beli</label>
						<input type="date"  class=" inputan" name="tglbeli" value="<?= date_indo($cr['cr_tgl_beli'])  ?>">
					</div>
					<div class="col-md-4">
						<label>Tgl Garansi</label>
						<input type="date"  class=" inputan" name="tglgaransi" value="<?= date_indo($cr['cr_tgl_akhir_garansi'])  ?>">
					</div>
					<div class="col-md-2"></div>
				</div>
				<hr>
				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col"><h6>Detail Kelengkapan</h6></div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col">
						<?php for($i=0;$i<3;$i++): ?>
						<div class="row mt-2">
							<div class="col">
								<label>Kelengkapan <?= $i+1 ?></label>
								<input type="text" name="kelengkapan[]" value="<?= $kelengkapan[$i] ?>" class="form-control">
							</div>
						</div>
						<?php endfor ?>
					</div>
					<div class="col">
						<?php for($i=3;$i<6;$i++): ?>
							<div class="row mt-2">
								<div class="col">
									<label>Kelengkapan <?= $i+1 ?></label>
									<input type="text" name="kelengkapan[]" value="<?= $kelengkapan[$i] ?>" class="form-control">
								</div>
							</div>
						<?php endfor ?>
					</div>
					<div class="col-md-2"></div>
				</div>

				<hr>
				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col"><h6>Keterangan Perusahaan</h6></div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col">
						<?php for($i=0;$i<3;$i++): ?>
							<div class="row mt-2">
								<div class="col">
									<input type="text" name="keterangan[]" value="<?= $keterangan[$i] ?>" class="form-control">
								</div>
							</div>
						<?php endfor ?>
					</div>
					<div class="col">
						<?php for($i=3;$i<6;$i++): ?>
							<div class="row mt-2">
								<div class="col">
									<input type="text" name="keterangan[]" value="<?= $keterangan[$i] ?>" class="form-control">
								</div>
							</div>
						<?php endfor ?>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row mt-4">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<button class="float-right btn btn-success btn-sm" type="submit" name="edit">Simpan</button>
					</div>
					<div class="col-md-2"></div>
				</div>
				</form>








			</div>
		</div>
	</div>
</div>
