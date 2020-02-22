<style>
	body{
		background: url('<?= base_url() ?>/assets/upload/bg/<?= $setting['set_background_body'] ?>');
		background-size: cover;

	}
	.container{
		color: <?= $setting['set_font_color'] ?>;
	}
	input:type[text]{
		color: <?= $setting['set_font_color'] ?>;
	}
</style>

<!-- <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/demo.css"> -->

  <script src="<?= base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
  <script src="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.js?v=1.0.0&&load=<?= time()?>"></script>
  <script src="<?= base_url() ?>assets/virtual-keyboard/demo.js"></script>


<div class="container p-5" style="background: <?= $setting['set_background'] ?>;">
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
    

    <form action="<?= base_url() ?>mntr4/step1" name='myForm' method="POST">
    
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nomor Responden</h4>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control example-1 nomor pl-3" placeholder="Abaikan jika tidak ada" onKeyUp="numericOnly(this)"  name="no_responden" autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-4">
                    <h4>Silahkan isi data diri anda :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nama</h4>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control example-2" name="nama"  required autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Umur</h4>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control example-3 input-numeric" id="umur" name="umur" onKeyUp="numericOnly(this)" required  autocomplete="off">
                </div>
                <div class="col-md-2 pt-4">
                    <h4>Tahun</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Jenis Kelamin</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="jk" class="form-control" required>
                        <option disabled selected>- Pilih Jenis Kelamin -</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Pendidikan Terakhir</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="pendidikan" class="form-control" required>
                        <option disabled selected>- Pilih Pendidikan -</option>
                        <option>SD</option>
                        <option>SLTP</option>
                        <option>SLTA</option>
                        <option>D1-D2-D3</option>
                        <option>S1</option>
                        <option>S2 Keatas</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Pekerjaan Utama</h4>
                </div>
                <div class="col-md-5 pt-3">
                    <select name="pekerjaan" class="form-control" required>
                        <option disabled selected>- Pilih Pekerjaan -</option>
                        <option>PNS/TNI/POLRI</option>
                        <option>WIRASWASTA</option>
                        <option>PEGAWAI SWASTA</option>
                        <option>PELAJAR/MAHASISWA</option>
                        <option>LAINNYA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-4">
                    <h5>Note : Data identitas anda akan kami rahasiakan !</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <button type="submit" name="lanjut" id="button-submit" class="btn btn-success btn-lg" style="width: 40%; height: 40pt; font-size: 20pt;">LANJUT</button>
        </div>
    </div>
    </form>
</div>

<script>
    
    // $('#umur').change(function() {
    //     var isi = $(this).val;
    //     if ($.isNumeric(isi) ) {
    //         alert('ini adalah nomor');
    //         return false;
    //     }
    // });
	$(document).ready(function () {
		var root = window.location.origin+'/app-polling/';
		$(document).keypress(function (key) {
			let btnSetting = key.originalEvent.charCode;

			if (btnSetting === 13){
				$('#button-submit').click();
			}
		});
	});


    $("#umum").change(function() {
        numericOnly($(this));
    });

    function numericOnly(e)
    {
        var val = e.value.replace(/[^\d]/g, "");
        if(val != e.value){
            e.value = val;
        }
    }

</script>

