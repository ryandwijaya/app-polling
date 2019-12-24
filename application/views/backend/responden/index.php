<div class="row d-print-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>responden" method="POST">
                <div class="row p-2">
                    <div class="col-md-3 input-field">
                        <select name="lyn" id="lyn">
                            <option disabled selected>- Pilih Layanan -</option>
                            <?php foreach ($lynn as $vas): ?>
                                <option value="<?= $vas['lynn_id'] ?>"><?= $vas['lynn_nm'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="date" name="tgl_start" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="tgl_end" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-info" name="lihat" type="submit" id="show-report">
                            Tampilkan
                        </button>
                    </div>
                </div>
                <hr>
                
                </form>                
                            
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-print-none">
                <h4 class="float-left d-print-none">Data Responden</h4>
                <button class="d-print-none btn btn-info float-right" onclick="printContent()"><i class="fa fa-print"></i> PDF</button>
                <form action="<?= base_url() ?>laporan/export/responden" method="POST">
                <input type="hidden" name="llyn" value="<?= $this->input->post('lyn') ?>">
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
                            <div>
                            <?php if ($this->input->post('tgl_start')==''){ ?>
                                <?= date_indo(date('Y-m-d')) ?>
                            <?php }else{ ?>
                                <?= date_indo($this->input->post('tgl_start')) ?> - <?= date_indo($this->input->post('tgl_end')) ?>
                            <?php } ?>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="width: 200px;">Jumlah Responden</div>
                            <div style="margin-right: 30px;">:</div>
                            <div><?= count($kpsn) ?></div>
                        </div>
                        

                        <div style="display: flex;">
                            <div style="width: 200px;">Layanan</div>
                            <div style="margin-right: 30px;">:</div>
                            <div>
                            
                                <?= $layananCurrent['lynn_nm'] ?>
                            
                                    
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-12">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Usia</th>
                                    <th>Pekerjaan</th>
                                    <th>Pendidikan</th>
                                    <th>Gender</th>
                                    <th>Jawaban</th>
                                    <th>Layanan</th>
                                    <th>Saran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($kpsn as $var): ?>

                                    <tr>
                                        <td style="width: 180px;" class="text-center"><?= $var['kpsn_dcreated'] ?></td>
                                        <td style="width: 80px;" class="text-center"><?= $var['responden_umur'] ?></td>
                                        <td style="width: 220px;" class="text-center"><?= $var['responden_pekerjaan'] ?></td>
                                        <td style="width: 220px;" class="text-center"><?= $var['responden_pendidikan'] ?></td>
                                        <td style="width: 220px;" class="text-center"><?= $var['responden_jk'] ?></td>
                                        <td class="text-center"><?= $var['jwb_ket'] ?></td>
                                        <td class="text-center"><?= $var['lynn_nm'] ?></td>
                                        <td class="text-center"><?= $var['kpsn_klhn'] ?></td>
                                    </tr>
                                <?php 
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