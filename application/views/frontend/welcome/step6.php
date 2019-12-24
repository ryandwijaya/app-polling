<div class="container p-5" style="background: <?= $setting['set_background'] ?>;">
    <div class="row">
        <div class="col-md-2">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
        <div class="col-md-8 text-center pt-4">
            <h1><?= $instansi['instansi_nama'] ?></h1>    
        </div>
        <div class="col-md-2 text-right">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
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
            var root = window.origin + '/App-Polling/';
            location.replace(root+'step-1');
        }
            
        setInterval(myFunction, 2000);
    
        </script>
    </div>
</div>