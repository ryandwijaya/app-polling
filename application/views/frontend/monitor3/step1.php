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
    

    <form action="<?= base_url() ?>mntr3/step1" method="POST">
    
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Nomor Responden</h4>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" name="no_responden" autocomplete="off">
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
                    <input type="text" class="form-control" name="nama"  required autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pt-4">
                    <h4>Umur</h4>
                </div>
                <div class="col-md-5">
                    <input type="number" min="1" max="99" class="form-control" name="umur" required  autocomplete="off">
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
            <button type="submit" name="lanjut" class="btn btn-success btn-lg" style="width: 40%; height: 40pt; font-size: 20pt;">LANJUT</button>
        </div>
    </div>
    </form>
</div>