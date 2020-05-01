
<div class="row mt-4">
	<div class="col bg-white p-4 rounded mr-2">
		lorem
	</div>
	<div class="col p-5 bg-white rounded ml-2">
		<div class="row ">
			<div class="col-12 text-center">
				<h4>INDEKS</h4>
				<h4>KEPUASAN MASYARAKAT</h4>
			</div>
		</div>
		<form action="<?= base_url() ?>step-4" method="POST">
			<div class="row mt-5 bg-primary mb-4  rounded">
				<div class="col-12">
					<div class="row text-center p-4">
						<div class="col-12">
							<?php $getPtn = $this->PtnModel->lihat_satu($pertanyaan['set_ptn']); ?>
							<h5><?= $getPtn['ptn_txt'] ?></h5>
						</div>
					</div>

					<!--				PARAMETER-->
					<input type="hidden" value="<?= $pertanyaan['set_ptn'] ?>" name="ptn">
					<input type="hidden" value="<?= $_GET['nama'] ?>" name="nama">
					<input type="hidden" value="<?= $_GET['umur'] ?>" name="umur">
					<input type="hidden" value="<?= $_GET['jk'] ?>" name="jk">
					<input type="hidden" value="<?= $_GET['pnd'] ?>" name="pnd">

					<!--					//TEMPAT BUTTON-->
					<div class="row p-3">
						<?php if ($this->session->userdata('sess_hr_versi') == 'tiga') { ?>
							<?php
							$back = ['green', 'yellow', 'red'];
						foreach ($jawaban as $key => $jwb): ?>
							<div class="col m-1 text-center">
								<button class="tesin" type="submit" id="jwb_<?= $jwb['jwb_id'] ?>"
										name="jwb_<?= $jwb['jwb_id'] ?>"
										style="background-size: cover;">
									<div class="row">
										<div class="col-12">
											<img
												src="<?= base_url() ?>assets/images/jwb/tiga/<?= $jwb['jwb_id'] ?>.png"
												alt="" width="30" height="30">
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h6><?= $jwb['jwb_ket'] ?></h6>
										</div>
									</div>
								</button>
							</div>
						<?php endforeach ?>
							<script src="<?= base_url() ?>assets/js/app-polling/tiga/keypress.js"></script>
						<?php } elseif ($this->session->userdata('sess_hr_versi') == 'empat') { ?>

						<?php
						$back = ['deeppink', 'aqua', 'yellow', 'red'];
						foreach ($jawaban

						as $key => $jwb): ?>
							<div class="col text-center m-1">
								<button class="tesin mt-1 border" type="submit" id="jwb_<?= $jwb['jwb_id'] ?>"
										name="jwb_<?= $jwb['jwb_id'] ?>"
										style="background-size: cover;">
									<div class="row">
										<div class="col-12">
											<img
												src="<?= base_url() ?>assets/images/jwb/empat/<?= $jwb['jwb_id'] ?>.png"
												alt="" width="30" height="30">
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h6><?= $jwb['jwb_ket'] ?></h6>
										</div>
									</div>
								</button>
							</div>
						<?php endforeach ?>
							<script src="<?= base_url() ?>assets/js/app-polling/empat/keypress.js"></script>
						<?php } ?>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>
