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
    <form action="<?= base_url() ?>step-5" method="POST">
    <div class="row mt-3">
        <div class="col-md-12 ">
            <input type="hidden" value="<?= $_GET['rspndn'] ?>" name="no_responden">
            <h5 class="mt-5">Silahkan Isi Saran Anda :</h5>
            <textarea name="saran" class="form-control" cols="30" rows="10" placeholder="Isi saran anda disini ... "></textarea>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <button class="btn btn-success btn-lg" type="submit" name="kirim" style="width: 40%; height: 50pt; font-size: 20pt;">Kirim Saran</button>
        </div>
    </div>
    </form>
</div>