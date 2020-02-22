
<div class="row animated bounceIn">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Profil Instansi</h3>
<!--                --><?php //if ($this->session->userdata('apkrole')=='hr'): ?>
<!--                <a href="#" class="text-primary float-right pr-2" id="btn-edit"><h5><i class="fa fa-edit"></i> Edit</h5></a>-->
<!--                --><?php //endif ?>
			</div>
			<div class="card-body pb-4">
				<!-- <form action="<?= base_url() ?>instansi" method="POST"> -->
                <?= form_open('instansi',array('enctype'=>'multipart/form-data')) ?>
				<!-- <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <img src="<?= base_url() ?>assets/images/kop.jpg" width="100%">
                    </div>            
                    <div class="col-md-2"></div>
                </div> -->
                <div class="row mt-4">
                    <div class="col-md-2"><input type="hidden"   name="int_id" value="<?= $instansi[0]['instansi_id'] ?>"></div>
                    <div class="col-md-8">
                        <label>Nama Dinas / Lembaga</label>
                        <input type="text"  class="form-control inputan" name="int_dns" value="<?= $instansi[0]['instansi_dinas'] ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-2"><input type="hidden"   name="int_id" value="<?= $instansi[0]['instansi_id'] ?>"></div>
                    <div class="col-md-8">
                        <label>Nama Instansi</label>
                        <input type="text"  class="form-control inputan" name="int_nm" value="<?= $instansi[0]['instansi_nama'] ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label>Alamat</label>
                        <input type="text"  class="form-control inputan" name="int_almt" value="<?= $instansi[0]['instansi_alamat'] ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label>TELEPON</label>
                        <input type="text"  class="form-control inputan" name="int_tlp" value="<?= $instansi[0]['instansi_telepon'] ?>">
                    </div>
                    <div class="col-md-2"></div>
                </div>

				<div class="row mt-4">
                    <div class="col-md-2"></div>
					<div class="col-md-8">
						<label>Email</label>
						<input type="text"  class="form-control inputan" name="int_email" value="<?= $instansi[0]['instansi_email'] ?>">
					</div>
                    <div class="col-md-2"></div>
                </div>
                


                <?php if ($this->session->userdata('apkrole')=='hr'): ?>           
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-2 mt-4 input-field col s-12">
                        <select name="label" class="inputan" id="label-versi">
                            <option>- Silahkan Pilih Versi -</option>
							<option value="android">Android</option>
							<option value="monitor">1 Pertanyaan</option>
							<option value="statis">15 Pertanyaan</option>
							<option value="dinamis">Dinamis Pertanyaan</option>
                        </select>
                        <label>Pilih Versi</label>
						<input type="hidden" name="version" id="version">
                    </div>
					<div class="col-md-2 mt-4 input-field col s-12">

						<select name="int_versi" class="inputan opt-val">
							<option value="<?= $instansi[0]['instansi_versi_jwb'] ?>">- Pilih Versi -</option>
						</select>
						<label>Versi  [ <?= $instansi[0]['instansi_versi_jwb'] ?> ] , Ganti ? <i class="fas fa-question-circle" title="Abaikan jika tidak ingin ganti"></i></label>

					</div>
					<div class="col-md-3" id="app-responden" style="display: none;">
						<div class="row ml-3">
							<div class="col">
								<label>Responden :</label>
							</div>
						</div>
						<div class="row mt-3 ml-3">
							<div class="col">
								<div class="form-check form-check-radio">
									<label>
										<input name="app_responden"  type="radio" value="yes" checked>
										<span>Yes</span>
									</label>
								</div>
							</div>
							<div class="col">
								<div class="form-check form-check-radio">
									<label>
										<input name="app_responden" type="radio" value="no">
										<span>No</span>
									</label>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-md-2"></div>
                </div>
                <?php endif ?>



                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <label>Logo : </label> <br>
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi[0]['instansi_logo'] ?>" alt="sepertinya gambar rusak" width="100" height="100" class="border">
                    </div>
                    <?php if ($this->session->userdata('apkrole')=='hr'): ?>
                    <div class="col-md-4">
                        <label>Ganti Logo ?</label>
                        <input type="hidden" name="logo_lama" value="<?= $instansi[0]['instansi_logo'] ?>">
                        <input type="file" class="form-control inputan" id="logo" name="int_logo">
                    </div>
                    <div class="col-md-2"></div>
                    <?php endif ?>
                </div>
                


                <?php if ($this->session->userdata('apkrole')=='hr'): ?>
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button class="btn btn-success float-right btn-simpan" type="submit" name="edit">Simpan</button>
                    </div>
                    <div class="col-md-2"></div>
                </div> 
                <?php endif ?>   



                   </form>         
			</div>
		</div>
	</div>
</div>

