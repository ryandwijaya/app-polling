<style>
	#konten{
		color: <?= $setting['set_font_color'] ?>;
		background: <?= $setting['set_background'] ?>;
	}
	input[type=text],input[type=number],select{
		font-weight: 900;
	}
</style>

<div class="row p-4 full-height" id="konten">
	<div class="col-md-12">
		<!--		HEADER-->
		<div class="row p-2">
			<div class="col-md-12 header-monitor">
				<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
			</div>
		</div>

		<!--		CONTENT-->
		<div class="row mt-4 justify-content-center">
			<div class="col-md-10 text-center">
				<h1 class="mt-5">SELAMAT DATANG</h1>
				<h1 class="mt-5">DI</h1>
				<h1 class="mt-5 mb-5"><?= $instansi['instansi_nama'] ?></h1>
				<a href="<?= base_url() ?>step-2"  class="btn btn-success mt-5 btn-lg lanjut" style="width: 40%; height: 50pt; font-size: 20pt;">LANJUT</a>
			</div>
		</div>

	</div>
</div>





<script>
    $(document).ready(function () {
                var root = window.location.origin+'/app-polling/';
                $(document).keypress(function (key) {
                    let btnSetting = key.originalEvent.charCode;
                    
                    if (btnSetting === 13){
                        window.location.href = root+'step-2';
                    }
                });
            })
</script>
<!-- <script type="text/javascript">

    function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

        if (requestMethod) { // Native full screen.
            requestMethod.call(element);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
</script> -->
