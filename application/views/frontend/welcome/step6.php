<div class="container p-4 mt-5" style="background: <?= $setting['set_background'] ?>;">
    <div class="row">
		<div class="col-md-12 header-monitor">
			<img src="<?= base_url() ?>assets/upload/kop/<?= $umum['umum_kop'] ?>" alt="kop kosong" height="140" width="100%">
		</div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="mt-5">TERIMA KASIH</h1>
            <h1 class="mt-5">ATAS PARTISIPASINYA ANDA</h1>
            <h1 class="mt-5">TELAH MENGISI</h1>
            <h1 class="mt-5">POLLING SURVEY INI</h1>
        </div>
    </div>
    <div class="row mt-5">

        <script>
        function myFunction() {
            var root = window.origin + '/app-polling/';
            location.replace(root+'step-1');
        }
            
        setInterval(myFunction, 2000);
    
        </script>
    </div>
</div>

<!-- Haris    -->
<!-- Ryan    -->
