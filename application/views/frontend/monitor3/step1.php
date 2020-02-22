<style>
	body{
		background: url('<?= base_url() ?>/assets/upload/bg/<?= $setting['set_background_body'] ?>');
		background-size: cover;

	}
	.container{
		color: <?= $setting['set_font_color'] ?>;
		background: <?= $setting['set_background'] ?>;
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


<div id="keyboard" style="display: fixed;position: absolute;bottom: 0; left: 20%;right: 20%; width: 60%;background:black;display: none;z-index: 99999;"></div>
<div class="container p-5 animated fadeIn">
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
    

    <form action="<?= base_url() ?>mntr3/step1" method="POST">
     
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nomor Responden</h4>
                </div>
                <div class="col-md-5">
                    <input type="number" placeholder="Abaikan jika tidak ada" class="input form-control pl-3  example-3" name="no_responden" autocomplete="off">
                    <!-- <div class="simple-keyboard" style="display: none;height: 70%;margin-bottom: 0;"></div> -->
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
                    <input type="text" class="input form-control example-1" name="nama"  required autocomplete="off">
                    <!-- <div class="simple-keyboard" style="display: none;margin-bottom: 0;"></div> -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Umur</h4>
                </div>
                <div class="col-md-5">
                    <input type="text" class="input form-control  example-2 input-numeric" name="umur" required  autocomplete="off">
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
	$(document).ready(function () {
		var root = window.location.origin+'/app-polling/';
		$(document).keypress(function (key) {
			let btnSetting = key.originalEvent.charCode;

			if (btnSetting === 13){
				$('#button-submit').click();
			}
		});
	})
</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.min.js"></script>
<script src="<?= base_url() ?>assets/js/app-polling/virtual-keyboard.js"></script> -->


    <!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?= base_url() ?>assets/virtual-keyboard/lib/js/jkeyboard.js"></script>
    
<script>
document.querySelectorAll(".input").forEach(input => {
      
    $( ".input" ).focus(function() {
        $('#keyboard').css('display', 'block');
        $('#keyboard').jkeyboard({
            layout: "english_capital",
            input: $(this),
            customLayouts: {
                selectable: ["english_capital"],
                english_capital: [        
                    ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p',],
                    ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l',],
                    ['shift', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'backspace'],
                    ['numeric_switch', 'layout_switch', 'space', 'return']
                ],
            }
        });
    });

    $("#keyboard").mouseleave(function() {
        $('#keyboard').css('display', 'none');
    });

});
    
    // $( ".input" ).blur(function() {
    //     $('.simple-keyboard').css('display', 'none');
    // });

    
</script> -->

