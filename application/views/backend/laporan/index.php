<?php error_reporting(0) ?>
<div class="row d-print-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url() ?>laporan" method="POST">
                <div class="row p-2">
                    <div class="col-md-6 input-field">
                        <select name="ptn" id="nm-ptn">
                            <option disabled selected>- Pilih Pertanyaan -</option>
                            <?php foreach ($ptn as $var): ?>
                                <option value="<?= $var['ptn_id'] ?>"><?= $var['ptn_txt'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mt-3 p-2">
                    <div class="col-md-3">
                        <input type="date" id="tgl-start" name="tgl_start" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="date" id="tgl-end" name="tgl_end" class="form-control">
                    </div>
                    <div class="col-md-3 input-field">
                        <select name="lyn" id="nm-lyn">
                            <option disabled selected>- Pilih Layanan -</option>
                            <?php foreach ($lyn as $var): ?>
                                <option value="<?= $var['lynn_id'] ?>"><?= $var['lynn_nm'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-3">
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

<div class="row d-print-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">Laporan Persentasi Kepuasan</h4>
                <button class="d-print-none btn btn-danger float-right" onclick="printContent()"><i class="fa fa-print"></i> PDF</button>
                <form action="<?= base_url() ?>laporan/export/layanan" method="POST">
                <input type="hidden" name="lptn" value="<?= $this->input->post('ptn') ?>">
                <input type="hidden" name="llyn" value="<?= $this->input->post('lyn') ?>">
                <input type="hidden" name="ltgl_start" value="<?= $this->input->post('tgl_start') ?>">
                <input type="hidden" name="ltgl_end" value="<?= $this->input->post('tgl_end') ?>">
                <!-- <a href="<?= base_url() ?>laporan/export/semua/<?= $this->input->post('tgl_start') ?>/<?= $this->input->post('tgl_end') ?>/<?= $this->input->post('ptn') ?>" class="d-print-none btn btn-success float-right mr-3" onclick="printContent()"><i class="fa fa-file-excel"></i> Excel</a> -->
                <button class="d-print-none btn btn-success float-right mr-3" type="submit"><i class="fa fa-file-excel"></i> Excel</button>
                </form>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <table border="0">
                            
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td id="tanggalan"><?= date_indo($this->input->post('tgl_start')) ?></td>
                        </tr>
                        <tr>
                            <td>Subjek</td>
                            <td>:</td>
                            <td id="pertanyaan"><?= date_indo($this->input->post('tgl_end')) ?></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td>:</td>
                            <td id="layanan"><?= $votes['lynn_nm'] ?></td>
                        </tr>
                        <tr>
                            <td>Responden</td>
                            <td>:</td>
                            <td id="responden"><?= count($allvotes) ?></td>
                        </tr>

                        </table>
                    </div>
                </div>
                
                
                <div class="row mt-5">
                    <div class="col-md-4">
                        <canvas id="chartDonut" width="400" height="400"></canvas>
                                
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-4">
                        <canvas id="chartBar" width="400" height="400"></canvas>
                               
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 p-4">
                        <div class="table-responsive">
                            <table class="table-bordered table-striped table">
                                <thead>
                                    <tr>
                                        <th>Layanan</th>
                                        <th>Jawaban</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                            <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>

                                <tbody>
                                    <?php 
                                    $puastotal = 0;
                                    $cukuptotal = 0;
                                    $tidakpuastotal = 0;
                                    foreach ($allvotes as $var): ?>
                                        <?php if ($var['kpsn_jwb']==1){ 
                                            $puastotal+=1;
                                        }elseif ($var['kpsn_jwb']==2) {
                                            $cukuptotal+=1;
                                        }elseif ($var['kpsn_jwb']==3) {
                                            $tidakpuastotal+=1;
                                        } ?>
                                        <tr>
                                            <td><?= $var['lynn_nm'] ?></td>
                                            <td><?= $var['jwb_ket'] ?></td>
                                            <td><?= $var['kpsn_klhn'] ?></td>
                                            <td><?= $var['kpsn_dcreated'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>Puas : <?= $puastotal ?></th>
                                        <th>Cukup Puas : <?= $cukuptotal ?></th>
                                        <th>Tidak Puas : <?= $tidakpuastotal ?></th>
                                    </tr>
                                </tfoot>

                            <?php endif ?>
                            <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>

                                <tbody>
                                    <?php 
                                    $sangatpuastotal = 0;
                                    $puastotal = 0;
                                    $cukuptotal = 0;
                                    $tidakpuastotal = 0;
                                    foreach ($allvotes as $var): ?>
                                        <?php if ($var['kpsn_jwb']==6){ 
                                            $puastotal+=1;
                                        }elseif ($var['kpsn_jwb']==7) {
                                            $cukuptotal+=1;
                                        }elseif ($var['kpsn_jwb']==8) {
                                            $tidakpuastotal+=1;
                                        }elseif ($var['kpsn_jwb']==5) {
                                            $sangatpuastotal+=1;
                                        } ?>
                                        <tr>
                                            <td><?= $var['lynn_nm'] ?></td>
                                            <td><?= $var['jwb_ket'] ?></td>
                                            <td><?= $var['kpsn_klhn'] ?></td>
                                            <td><?= $var['kpsn_dcreated'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th colspan="3" class="text-center"><span class="mr-5">Sangat Puas : <?= $sangatpuastotal ?></span>  <span class="mr-5">Puas : <?= $puastotal ?> </span>  <span class="mr-5">Cukup Puas : <?= $cukuptotal ?></span>  <span class="mr-5">Tidak Puas : <?= $tidakpuastotal ?> </span></th>
                                    </tr>
                                </tfoot>
                                
                            <?php endif ?>
                            <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>

                                <tbody>
                                    <?php 
                                    $sangatpuastotal = 0;
                                    $puastotal = 0;
                                    $cukuptotal = 0;
                                    $tidakpuastotal = 0;
                                    $stidakpuastotal = 0;
                                    foreach ($allvotes as $var): ?>
                                        <?php if ($var['kpsn_jwb']==10){ 
                                            $puastotal+=1;
                                        }elseif ($var['kpsn_jwb']==11) {
                                            $cukuptotal+=1;
                                        }elseif ($var['kpsn_jwb']==12) {
                                            $tidakpuastotal+=1;
                                        }elseif ($var['kpsn_jwb']==13) {
                                            $stidakpuastotal+=1;
                                        }elseif ($var['kpsn_jwb']==9) {
                                            $sangatpuastotal+=1;
                                        } ?>
                                        <tr>
                                            <td><?= $var['lynn_nm'] ?></td>
                                            <td><?= $var['jwb_ket'] ?></td>
                                            <td><?= $var['kpsn_klhn'] ?></td>
                                            <td><?= $var['kpsn_dcreated'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th colspan="3" class="text-center"><span class="mr-4">Sangat Puas : <?= $sangatpuastotal ?></span>  <span class="mr-4">Puas : <?= $puastotal ?> </span>  <span class="mr-4">Cukup Puas : <?= $cukuptotal ?></span>  <span class="mr-4">Tidak Puas : <?= $tidakpuastotal ?> </span> <span class="mr-4">Sangat Tidak Puas : <?= $stidakpuatotal ?> </span></th>
                                    </tr>
                                </tfoot>
                                
                            <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div>
                                
                            
            </div>
        </div>
    </div>
</div>


<div class="row" >

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div id="kop" style="display: none;">
                <div class="row" style="display: flex;padding-right: 20px;padding-left: 20px;margin-top: -30px;">
                    <div style="float: left;width: 20%; text-align: left;">
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="Gambar Tidak Ditemukan" width="80" height="80" class="border">
                    </div>
                    <div  style="text-align: center; width: 60%; padding-top:10px;">
                        <h3><?= $instansi['instansi_dinas'] ?></h3>
                        <h4><?= $instansi['instansi_nama'] ?></h4>
                        <h6><?= $instansi['instansi_alamat'] ?> , Telp : <?= $instansi['instansi_telepon'] ?> , <?= $instansi['instansi_email'] ?> </h6>                    </div>
                    <div  style="float: right; width: 20%;text-align: right;">
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $instansi['instansi_logo'] ?>" alt="Gambar Tidak Ditemukan" width="80" height="80" class="border">
                    </div>
                </div>
                </div>
                <hr style="border: 1px black solid">


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
                        <div><?= count($allvotes) ?></div>
                    </div>
                    

                    <div style="display: flex;">
                        <div style="width: 200px;">Layanan</div>
                        <div style="margin-right: 30px;">:</div>
                        <div><?= $lyn[0]['lynn_nm'] ?></div>
                    </div>

                    
                    
                
                <div class="table-responsive">
                    <table class="mt-5 table-bordered table">
                        <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="6" class="text-center">LAPORAN</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Puas</th>
                                <th>Cukup Puas</th>
                                <th>Tidak Puas</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= $pertanyaan['ptn_txt'] ?></td>
                                <td><?= $baikvotes; ?></td>
                                <td><?= $cukupvotes; ?></td>
                                <td><?= $burukvotes; ?></td>
                                <td><?= $burukvotes; ?></td>
                            </tr>
                        </tbody>
                        <?php endif ?>
                        <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="7" class="text-center">LAPORAN</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Sangat Puas</th>
                                <th>Puas</th>
                                <th>Cukup Puas</th>
                                <th>Tidak Puas</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= $pertanyaan['ptn_txt'] ?></td>
                                <td><?= $sangat; ?></td>
                                <td><?= $puas; ?></td>
                                <td><?= $cukup; ?></td>
                                <td><?= $tidak; ?></td>
                                <td> - </td>
                            </tr>
                        </tbody>
                        <?php endif ?>
                        
                    </table>
                </div>
            
                    <div class="row mt-5">
                        <div class="col-md-12">
                            
                            
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h5>Grafik Tingkat Kepuasan Pelayanan</h5>
                                </div>
                            </div>
                            <div class="row">
                                
                                
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                <canvas id="chart1" width="100" height="100"></canvas>
                                </div>
                                <div class="col-md-4"></div>
                                
                                    
                            </div>
                            <hr>


                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h5>Persentasi Tingkat Kepuasan Pelayanan</h5>
                                </div>
                            </div>
                            <style>
                                .m-kanan{
                                    width:40%;
                                }
                                .m-kiri{
                                    width: 30%;
                                }
                                .m-kanan{
                                    padding-left: 40px ;
                                    margin-right: 100px;
                                    padding-top: 40px;
                                }
                            </style>
                            <div class="row" style="display: flex; padding:20px;">
                                
                                <div class="m-kanan">
                                    <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
                                        
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Indikator</th>
                                            <th>Persentase</th>
                                        </tr>
                                        <tr>
                                            <td>Puas</td>
                                            <td><?= $baikpersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Cukup Puas</td>
                                            <td><?= $cukuppersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak Puas</td>
                                            <td><?= $burukpersen ?> %</td>
                                        </tr>
                                    </table>

                                    <?php endif ?>

                                    <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
                                        
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Indikator</th>
                                            <th>Persentase</th>
                                        </tr>
                                        <tr>
                                            <td>Sangat Puas</td>
                                            <td><?= $sangatpersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Puas</td>
                                            <td><?= $puaspersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Cukup Puas</td>
                                            <td><?= $cukuppersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak Puas</td>
                                            <td><?= $tidakpersen ?> %</td>
                                        </tr>
                                    </table>
                                    
                                    <?php endif ?>
                                    <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
                                        
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Indikator</th>
                                            <th>Persentase</th>
                                        </tr>
                                        <tr>
                                            <td>Sangat Puas</td>
                                            <td><?= $sangatpersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Puas</td>
                                            <td><?= $puaspersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Cukup Puas</td>
                                            <td><?= $cukuppersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak Puas</td>
                                            <td><?= $tidakpersen ?> %</td>
                                        </tr>
                                        <tr>
                                            <td>Sangat Tidak Puas</td>
                                            <td><?= $stidakpersen ?> %</td>
                                        </tr>
                                    </table>
                                    
                                    <?php endif ?>
                                    <span><b>Berdasarkan Jumlah Responden : <?= count($allvotes) ?></b></span>
                                </div>
                                <div class="m-kiri">
                                <canvas id="chart2" width="100" height="100"></canvas>
                                </div>
                                    

                            </div>

                        </div>
                    </div>
            </div>
        </div>
        
    </div>


</div>
    <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
        
    <script>
                            // SETTING CHART
                            var data1 = {
                                          labels: ['Puas', 'Cukup Puas', 'Tidak Puas'],
                                          datasets: [{
                                            data: [<?= $baikvotes ?>, <?= $cukupvotes ?>, <?= $burukvotes ?>],
                                            backgroundColor: [
                                                        '#5fff81b0',
                                                        '#fffa5fa3',
                                                        '#ff571587',
                                                    ],
                                                    borderColor: [
                                                        'green',
                                                        'yellow',
                                                        'red',
                                                        'black',
                                                    ],
                                          }]
                                        }

                            var optionsBar = {
                                    hover: {
                                      animationDuration: 0
                                    },
                                    animation: {
                                      duration: 1,
                                      onComplete: function() {
                                        var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'bottom';

                                        this.data.datasets.forEach(function(dataset, i) {
                                          var meta = chartInstance.controller.getDatasetMeta(i);
                                          meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                          });
                                        });
                                      }
                                    },
                                    legend: {
                                      display: false
                                    },
                                    tooltips: {
                                      enabled: false
                                    },
                                    scales: {
                                        yAxes: [{
                                           ticks: {
                                                beginAtZero: true,
                                                stepSize: 1
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                              display: false
                                            },
                                            ticks: {
                                              beginAtZero: true
                                            }
                                          }]
                                    }

                                }

                            // CHART LAPORAN
                            var lprn1 = document.getElementById('chart1').getContext('2d');
                            var lpChart = new Chart(lprn1, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });

                            //CHART ATAS
                            var barchart = document.getElementById('chartBar').getContext('2d');
                            var lpChart = new Chart(barchart, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });



                            //SETTING CHARRT
                            var data2 = {
                            datasets: [{
                                data: [<?= $baikpersen ?>, <?= $cukuppersen ?>, <?= $burukpersen ?>],
                                backgroundColor: [
                                        '#5fff81b0',
                                        '#fffa5fa3',
                                        '#ff571587',
                                    ],
                                    borderColor: [
                                        'green',
                                        'yellow',
                                        'red',
                                        'black',
                                    ],
                                label: 'My dataset' // for legend
                            }],
                            labels: ['Puas', 'Cukup Puas', 'Tidak Puas']
                            };
                            var pieOptions = {
                              events: false,
                              animation: {
                                duration: 500,
                                easing: "easeOutQuart",
                                onComplete: function () {
                                  var ctx = this.chart.ctx;
                                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                                  ctx.textAlign = 'center';
                                  ctx.textBaseline = 'bottom';

                                  this.data.datasets.forEach(function (dataset) {

                                    for (var i = 0; i < dataset.data.length; i++) {
                                      var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                          total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                          mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                                          start_angle = model.startAngle,
                                          end_angle = model.endAngle,
                                          mid_angle = start_angle + (end_angle - start_angle)/2;

                                      var x = mid_radius * Math.cos(mid_angle);
                                      var y = mid_radius * Math.sin(mid_angle);

                                      ctx.fillStyle = '#000';
                                      if (i == 3){ // Darker text color for lighter background
                                        ctx.fillStyle = '#444';
                                      }

                                      var val = dataset.data[i];
                                      var percent = String(Math.round(val/total*100)) + "%";

                                      if(val != 0) {
                                        // ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        // Display percent in another line, line break doesn't work for fillText
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                      }
                                    }
                                  });               
                                }
                              }
                            };
                            //CHART LAPORAN
                            var pieChartCanvas = document.getElementById('chart2').getContext('2d');
                            var pieChart = new Chart(pieChartCanvas, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });

                            //CHART ATAS
                            var pieChart1 = document.getElementById('chartDonut').getContext('2d');
                            var pieChart = new Chart(pieChart1, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });
    </script>
    
    <?php endif ?>
    




    <!-- VERSI 4 -->
    <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
        
    <script>
                            // SETTING CHART
                            var data1 = {
                                          labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas'],
                                          datasets: [{
                                            data: [<?= $sangat ?>, <?= $puas ?>, <?= $cukup ?>, <?= $tidak ?>],
                                            backgroundColor: [
                                                        '#5fff81b0',
                                                        '#fffa5fa3',
                                                        '#ff571587',
                                                    ],
                                                    borderColor: [
                                                        'green',
                                                        'yellow',
                                                        'red',
                                                        'black',
                                                    ],
                                          }]
                                        }

                            var optionsBar = {
                                    hover: {
                                      animationDuration: 0
                                    },
                                    animation: {
                                      duration: 1,
                                      onComplete: function() {
                                        var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'bottom';

                                        this.data.datasets.forEach(function(dataset, i) {
                                          var meta = chartInstance.controller.getDatasetMeta(i);
                                          meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                          });
                                        });
                                      }
                                    },
                                    legend: {
                                      display: false
                                    },
                                    tooltips: {
                                      enabled: false
                                    },
                                    scales: {
                                        yAxes: [{
                                           ticks: {
                                                beginAtZero: true,
                                                stepSize: 1
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                              display: false
                                            },
                                            ticks: {
                                              beginAtZero: true
                                            }
                                          }]
                                    }

                                }

                            // CHART LAPORAN
                            var lprn1 = document.getElementById('chart1').getContext('2d');
                            var lpChart = new Chart(lprn1, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });

                            //CHART ATAS
                            var barchart = document.getElementById('chartBar').getContext('2d');
                            var lpChart = new Chart(barchart, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });



                            //SETTING CHARRT
                            var data2 = {
                            datasets: [{
                                data: [<?= $sangatpersen ?>, <?= $puaspersen ?>, <?= $cukuppersen ?>, <?= $tidakpersen ?>],
                                backgroundColor: [
                                        '#5fff81b0',
                                        '#fffa5fa3',
                                        '#ff571587',
                                    ],
                                    borderColor: [
                                        'green',
                                        'yellow',
                                        'red',
                                        'black',
                                    ],
                                label: 'My dataset' // for legend
                            }],
                            labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas']
                            };
                            var pieOptions = {
                              events: false,
                              animation: {
                                duration: 500,
                                easing: "easeOutQuart",
                                onComplete: function () {
                                  var ctx = this.chart.ctx;
                                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                                  ctx.textAlign = 'center';
                                  ctx.textBaseline = 'bottom';

                                  this.data.datasets.forEach(function (dataset) {

                                    for (var i = 0; i < dataset.data.length; i++) {
                                      var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                          total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                          mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                                          start_angle = model.startAngle,
                                          end_angle = model.endAngle,
                                          mid_angle = start_angle + (end_angle - start_angle)/2;

                                      var x = mid_radius * Math.cos(mid_angle);
                                      var y = mid_radius * Math.sin(mid_angle);

                                      ctx.fillStyle = '#000';
                                      if (i == 3){ // Darker text color for lighter background
                                        ctx.fillStyle = '#444';
                                      }

                                      var val = dataset.data[i];
                                      var percent = String(Math.round(val/total*100)) + "%";

                                      if(val != 0) {
                                        // ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        // Display percent in another line, line break doesn't work for fillText
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                      }
                                    }
                                  });               
                                }
                              }
                            };
                            //CHART LAPORAN
                            var pieChartCanvas = document.getElementById('chart2').getContext('2d');
                            var pieChart = new Chart(pieChartCanvas, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });

                            //CHART ATAS
                            var pieChart1 = document.getElementById('chartDonut').getContext('2d');
                            var pieChart = new Chart(pieChart1, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });
    </script>
    
    <?php endif ?>


    <!-- VERSI 4 -->
    <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
        
    <script>
                            // SETTING CHART
                            var data1 = {
                                          labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                                          datasets: [{
                                            data: [<?= $sangat ?>, <?= $puas ?>, <?= $cukup ?>, <?= $tidak ?>, <?= $stidak ?>],
                                            backgroundColor: [
                                                        'deeppink','aqua','yellow','#ddf171','red'
                                                    ],
                                                    borderColor: [
                                                        'green',
                                                        'yellow',
                                                        'red',
                                                        'black',
                                                        'black',
                                                    ],
                                          }]
                                        }

                            var optionsBar = {
                                    hover: {
                                      animationDuration: 0
                                    },
                                    animation: {
                                      duration: 1,
                                      onComplete: function() {
                                        var chartInstance = this.chart,
                                          ctx = chartInstance.ctx;

                                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                                        ctx.textAlign = 'center';
                                        ctx.textBaseline = 'bottom';

                                        this.data.datasets.forEach(function(dataset, i) {
                                          var meta = chartInstance.controller.getDatasetMeta(i);
                                          meta.data.forEach(function(bar, index) {
                                            var data = dataset.data[index];
                                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                          });
                                        });
                                      }
                                    },
                                    legend: {
                                      display: false
                                    },
                                    tooltips: {
                                      enabled: false
                                    },
                                    scales: {
                                        yAxes: [{
                                           ticks: {
                                                beginAtZero: true,
                                                stepSize: 1
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                              display: false
                                            },
                                            ticks: {
                                              beginAtZero: true
                                            }
                                          }]
                                    }

                                }

                            // CHART LAPORAN
                            var lprn1 = document.getElementById('chart1').getContext('2d');
                            var lpChart = new Chart(lprn1, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });

                            //CHART ATAS
                            var barchart = document.getElementById('chartBar').getContext('2d');
                            var lpChart = new Chart(barchart, {
                                type: 'bar',
                                data: data1,
                                options: optionsBar
                            });



                            //SETTING CHARRT
                            var data2 = {
                            datasets: [{
                                data: [<?= $sangatpersen ?>, <?= $puaspersen ?>, <?= $cukuppersen ?>, <?= $tidakpersen ?>, <?= $stidakpersen ?>],
                                backgroundColor: [
                                        'deeppink','aqua','yellow','#ddf171','red'
                                    ],
                                    borderColor: [
                                        'green',
                                        'yellow',
                                        'red',
                                        'black',
                                    ],
                                label: 'My dataset' // for legend
                            }],
                            labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas']
                            };
                            var pieOptions = {
                              events: false,
                              animation: {
                                duration: 500,
                                easing: "easeOutQuart",
                                onComplete: function () {
                                  var ctx = this.chart.ctx;
                                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                                  ctx.textAlign = 'center';
                                  ctx.textBaseline = 'bottom';

                                  this.data.datasets.forEach(function (dataset) {

                                    for (var i = 0; i < dataset.data.length; i++) {
                                      var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                          total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                          mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                                          start_angle = model.startAngle,
                                          end_angle = model.endAngle,
                                          mid_angle = start_angle + (end_angle - start_angle)/2;

                                      var x = mid_radius * Math.cos(mid_angle);
                                      var y = mid_radius * Math.sin(mid_angle);

                                      ctx.fillStyle = '#000';
                                      if (i == 3){ // Darker text color for lighter background
                                        ctx.fillStyle = '#444';
                                      }

                                      var val = dataset.data[i];
                                      var percent = String(Math.round(val/total*100)) + "%";

                                      if(val != 0) {
                                        // ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                                        // Display percent in another line, line break doesn't work for fillText
                                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                                      }
                                    }
                                  });               
                                }
                              }
                            };
                            //CHART LAPORAN
                            var pieChartCanvas = document.getElementById('chart2').getContext('2d');
                            var pieChart = new Chart(pieChartCanvas, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });

                            //CHART ATAS
                            var pieChart1 = document.getElementById('chartDonut').getContext('2d');
                            var pieChart = new Chart(pieChart1, {
                              type: 'doughnut', // or doughnut
                              data: data2,
                              options: pieOptions
                            });
    </script>
    
    <?php endif ?>








