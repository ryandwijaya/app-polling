<style>
	@media print {
		.card-body {
			margin-top: -108px;
			padding: 0;
		}
	}
</style>
<div class="row d-print-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>laporan/semua" method="POST">
                <div class="row p-2">
                    <div class="col-md-6 input-field">
                        <select name="ptn" id="nm-ptn" >
                            <option disabled selected>- Pilih Pertanyaan -</option>
                            <?php foreach ($ptn as $var): ?>
                                <option value="<?= $var['ptn_id'] ?>"><?= $var['ptn_txt'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mt-3 p-2">
                    <div class="col-md-4">
                        <input type="date" id="tgl-start" name="tgl_start" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="date" id="tgl-end" name="tgl_end" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-info" name="lihat" type="submit" id="show-report">
                            Tampilkan
                        </button>
                    </div>
                </div>
                </form>                
                            
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-print-none">
                <h4 class="float-left d-print-none">Laporan Semua Layanan</h4>
                <button class="d-print-none btn btn-info float-right ml-3" onclick="printContent()"><i class="fa fa-print"></i> PDF (Potrait)</button>
                <button class="d-print-none btn btn-info float-right" onclick="printLandscape()"><i class="fa fa-print"></i> PDF (Landscape)</button>
                <form action="<?= base_url() ?>laporan/export/semua" method="POST">
                <input type="hidden" name="lptn" value="<?= $this->input->post('ptn') ?>">
                <input type="hidden" name="ltgl_start" value="<?= $this->input->post('tgl_start') ?>">
                <input type="hidden" name="ltgl_end" value="<?= $this->input->post('tgl_end') ?>">
                <!-- <a href="<?= base_url() ?>laporan/export/semua/<?= $this->input->post('tgl_start') ?>/<?= $this->input->post('tgl_end') ?>/<?= $this->input->post('ptn') ?>" class="d-print-none btn btn-success float-right mr-3" onclick="printContent()"><i class="fa fa-file-excel"></i> Excel</a> -->
                <button class="d-print-none btn btn-success float-right mr-3" type="submit"><i class="fa fa-file-excel"></i> Excel</button>
                </form>
            </div>
            <div class="card-body" style="font-size: 12pt;">
                
                <div id="kop" style="display: none;" class="pt-5">
                <div class="row" style="display: flex;padding-right: 20px;padding-left: 20px;margin-top: -30px;">
                    <div style="float: left;width: 20%; text-align: left;">
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="Gambar Tidak Ditemukan" width="80" height="80" class="border">
                    </div>
                    <div  style="text-align: center; width: 60%; padding-top:10px;">
                        <h3><?= $instansi['instansi_dinas'] ?></h3>
                        <h4><?= $instansi['instansi_nama'] ?></h4>
                        <h6><?= $instansi['instansi_alamat'] ?> , Telp : <?= $instansi['instansi_telepon'] ?> , <?= $instansi['instansi_email'] ?> </h6>
                    </div>
                    <div  style="float: right; width: 20%;text-align: right;">
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="Gambar Tidak Ditemukan" width="80" height="80" class="border">
                    </div>
                </div>
                </div>
                <hr style="border: 1px black solid">
                

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center">Laporan Polling Tingkat Kepuasan Pelayanan</h5>
                        <div style="display: flex;margin-top: 20px;">
                            <div style="width: 200px;">Tanggal</div>
                            <div style="margin-right: 30px;">:</div>
                            <div><?= date_indo(date('Y-m-d')) ?></div>
                        </div>
                        <div style="display: flex;">
                            <div style="width: 200px;">Periode Report</div>
                            <div style="margin-right: 30px;">:</div>
                            <div><?= date_indo($this->input->post('tgl_start')) ?> - <?= date_indo($this->input->post('tgl_end')) ?></div>
                        </div>
                        <div style="display: flex;">
                            <div style="width: 200px;">Jumlah Responden</div>
                            <div style="margin-right: 30px;">:</div>
                            <div><?= count($kpsn) ?></div>
                        </div>
                        

                        <div style="display: flex;">
                            <div style="width: 200px;">Layanan</div>
                            <div style="margin-right: 30px;">:</div>
                            <div>Semua</div>
                        </div>

                        <div style="display: flex;">
                            <div style="width: 200px;">Pertanyaan</div>
                            <div style="margin-right: 30px;">:</div>
                            <div><?= $pertanyaan['ptn_txt'] ?></div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-12">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Layanan</th>
                                    <th>Petugas</th>
                                    <th>Jawaban</th>
                                    <th>Saran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kpsn as $var): 
                                $layanan = $this->LynModel->lihat_satu($var['kpsn_lynn']);
                                ?>

                                    <tr>
                                        <td style="width: 80px;" class="text-center"><?= $no ?></td>
                                        <td style="width: 220px;" class="text-center"><?= $var['kpsn_dcreated'] ?></td>
                                        <td class="text-center"><?= $var['lynn_nm'] ?></td>
                                        <td class="text-center"><?= $var['usr_nm'] ?></td>
                                        <td class="text-center"><?= $var['jwb_ket'] ?></td>
                                        <td class="text-center"><?= $var['kpsn_klhn'] ?></td>
                                    </tr>
                                <?php 
                                $no++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
