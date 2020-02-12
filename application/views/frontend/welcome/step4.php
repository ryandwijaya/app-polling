<script src="<?= base_url() ?>assets/js/app.min.js"></script>
<style>
	<?php if($this->session->userdata('sess_hr_versi') == 'lima'){ ?>
	.tesin{
		/*background-image: url("*/<?//= base_url() ?>/*assets/images/jwb/3versi/c_3ver_tul.png");*/
		background-size: cover;
		background-repeat: no-repeat;
		border: 0;
		width: 100%;
		height: 70px;
	}
	<?php }else{ ?>
	.tesin{
		/*background-image: url("*/<?//= base_url() ?>/*assets/images/jwb/3versi/c_3ver_tul.png");*/
		background-size: cover;
		background-repeat: no-repeat;
		border: 0;
		width: 100%;
		height: 110px;
	}
	<?php } ?>

</style>
<div class="container p-5 animated fadeIn mt-5" style="background: <?= $setting['set_background'] ?>;">
    <div class="row">
        <div class="col-md-2">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
		<div class="col-md-8 text-center pt-3">
			<h1><?= $instansi['instansi_nama'] ?></h1>
			<h4><?= $instansi['instansi_alamat'] ?>, <?= $instansi['instansi_telepon'] ?></h4>
		</div>
        <div class="col-md-2 text-right">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
    </div>
    <hr>
    <form action="<?= base_url() ?>step-4" method="POST">
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <?php $getPtn = $this->PtnModel->lihat_satu($pertanyaan['set_ptn']); ?>
            <h2 class="mt-5"><?= $getPtn['ptn_txt']  ?></h2>
        </div>
    </div>

    <input type="hidden" value="<?= $pertanyaan['set_ptn'] ?>" name="ptn">
    <input type="hidden" value="<?= $_GET['nama'] ?>" name="nama">
    <input type="hidden" value="<?= $_GET['umur'] ?>" name="umur">
    <input type="hidden" value="<?= $_GET['jk'] ?>" name="jk">
    <input type="hidden" value="<?= $_GET['pnd'] ?>" name="pnd">

		<div class="row mt-5">
			<div class="col-md-12 text-center">
				<h4>Silahkan pilih jawaban anda :</h4>
			</div>
		</div>
    <div class="row mt-1">

        <?php if ($this->session->userdata('sess_hr_versi') == 'tiga') { ?>

        <?php 
        $back=['green','yellow','red'];
        foreach ($jawaban as $key => $jwb): ?>
        
        <div class="col-md-4 mt-5 text-center">

            <button class="tesin" type="submit" id="jwb_<?= $jwb['jwb_id'] ?>" name="jwb_<?= $jwb['jwb_id'] ?>" style="background-image: url('<?= base_url() ?>assets/images/jwb/3versi/<?= $jwb['jwb_id'] ?>.png'); background-size: cover;">
                
<!--                <div class="row mt-4">-->
<!--                    <div class="col-md-12">-->
<!--                        <img src="--><?//= base_url() ?><!--assets/images/jwb/tiga/--><?//= $jwb['jwb_id'] ?><!--.png" alt="image not found" width="100" height="100">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row mt-4">-->
<!--                    <div class="col-md-12">-->
<!--                        <h4>--><?//= $jwb['jwb_ket'] ?><!--</h4>-->
<!--                    </div>-->
<!--                </div>-->

            </button>
        </div>
        
        <?php endforeach ?>

        

        <script src="<?= base_url() ?>assets/js/app-polling/tiga/keypress.js"></script>

        <?php } elseif ($this->session->userdata('sess_hr_versi') == 'empat') { ?>
        
            <?php 
            $back=['deeppink','aqua','yellow','red'];
            foreach ($jawaban as $key => $jwb): ?>
        
                <div class="col mt-5 text-center">

                    <button class="tesin mt-5" type="submit" id="jwb_<?= $jwb['jwb_id'] ?>" name="jwb_<?= $jwb['jwb_id'] ?>" style="background-image: url('<?= base_url() ?>assets/images/jwb/4versi/<?= $jwb['jwb_id'] ?>.png'); background-size: cover;">
                        
<!--                        <div class="row mt-3">-->
<!--                            <div class="col-md-12">-->
<!--                                <img src="--><?//= base_url() ?><!--assets/images/jwb/empat/--><?//= $jwb['jwb_id'] ?><!--.png" alt="image not found" width="100" height="100">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row mt-4">-->
<!--                            <div class="col-md-12">-->
<!--                                <h4>--><?//= $jwb['jwb_ket'] ?><!--</h4>-->
<!--                            </div>-->
<!--                        </div>-->
                        


                    </button>
                </div>
            <?php endforeach ?>
            
            <script src="<?= base_url() ?>assets/js/app-polling/empat/keypress.js"></script>


            
        <?php } elseif ($this->session->userdata('sess_hr_versi') == 'lima') {  ?>
            <?php 
            $back=['deeppink','aqua','yellow','#ddf171','red'];
            foreach ($jawaban as $key => $jwb): ?>
        
                <div class="col mt-4 text-center">

                    <button class="tesin mt-5" type="submit" id="jwb_<?= $jwb['jwb_id'] ?>" name="jwb_<?= $jwb['jwb_id'] ?>" style="background-image: url('<?= base_url() ?>assets/images/jwb/5versi/<?= $jwb['jwb_id'] ?>.png'); background-size: cover;">
                        
<!--                        <div class="row mt-3">-->
<!--                            <div class="col-md-12">-->
<!--                                <img src="--><?//= base_url() ?><!--assets/images/jwb/lima/--><?//= $jwb['jwb_id'] ?><!--.png" alt="image not found" width="100" height="100">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row mt-4">-->
<!--                            <div class="col-md-12">-->
<!--                                <h4>--><?//= $jwb['jwb_ket'] ?><!--</h4>-->
<!--                            </div>-->
<!--                        </div>-->
                        


                    </button>
                </div>
        
            <?php endforeach ?>
            <script src="<?= base_url() ?>assets/js/app-polling/lima/keypress.js"></script>

        <?php } ?>

    </div>
    </form>
</div>
