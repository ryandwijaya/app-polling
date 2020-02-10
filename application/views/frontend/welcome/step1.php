
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
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="mt-5">SELAMAT DATANG</h1>
            <h1 class="mt-5">DI</h1>
            <h1 class="mt-5"><?= $instansi['instansi_nama'] ?></h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <a href="<?= base_url() ?>step-2"  class="btn btn-success btn-lg lanjut" style="width: 40%; height: 50pt; font-size: 20pt;">LANJUT</a>
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
