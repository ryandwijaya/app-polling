<!-- <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/virtual-keyboard/demo.css"> -->

  <script src="<?= base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
  <script src="<?= base_url() ?>assets/virtual-keyboard/jquery.ml-keyboard.js?v=1.0.0&&load=<?= time()?>"></script>
  <script src="<?= base_url() ?>assets/virtual-keyboard/demo.js"></script>
<div class="container p-5 animated fadeIn mt-5" style="background: <?= $setting['set_background'] ?>;">

    <div class="row mt-3">
        <div class="col-md-2">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
        <div class="col-md-8 text-center pt-3">
            <h1><?= $instansi['instansi_nama'] ?></h1>    
            <h4><?= $instansi['instansi_alamat'] ?></h4>
        </div>
        <div class="col-md-2 text-right">
            <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="rusak" width="80" height="80" class="border">
        </div>
    </div>
    <hr>
    <form action="<?= base_url() ?>step-5" method="POST">
    <div class="row mt-3">
        <div class="col-md-12 ">
            <input type="hidden" value="<?= $_GET['rspndn'] ?>" name="id_kpsn">
            <h5 class="mt-5">Silahkan Isi Saran Anda :</h5>
            <textarea name="saran" class="form-control example-1" cols="30" rows="10" placeholder="Isi saran anda disini ... "></textarea>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
<!--        <div class="col-md-4 text-center">-->
<!--            <a href="javascript:history.back()" class="btn btn-info btn-lg" style="width: 100%; height: 50pt; font-size: 20pt;">Back</a>-->
<!--        </div>-->
<!--		<div class="col-md-2"></div>-->
		<div class="col-md-4">
			<button class="btn btn-success btn-lg" type="submit" name="kirim" style="width: 100%; height: 50pt; font-size: 20pt;">Kirim Saran</button>
		</div>
    </div>
    </form>
</div>
