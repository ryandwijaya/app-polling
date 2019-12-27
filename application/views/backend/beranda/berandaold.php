<?php error_reporting(0) ?>
            <div class="row">
                <div class="col-md-8">
                    <h4>Laporan hari ini : <?= date_indo(date('Y-m-d')) ?></h4>
                </div>
                
            </div>
            <hr>
            <div class="row state-overview">
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/smile.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text">Sangat Baik</span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-green shadow-style width-per-<?= round($sangatbaik,0) ?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $sangatbaik ?> %</h5>
                            </span>
                        </div>
                       
                    </div>
                </div>
 -->            
        <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
                    
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/tiga/1.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[0]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-green shadow-style width-per-<?= round($baikpersen,0) ?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $baikpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/tiga/2.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[1]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-<?= round($cukuppersen,0) ?>" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $cukuppersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/tiga/3.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[2]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($burukpersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $burukpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/vote.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text">Jumlah Vote</span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-purple shadow-style width-per-100" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $total_vote ?> vote</h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>

        <!-- BATAS -->
        <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/empat/5.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[0]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-green shadow-style width-per-<?= round($sangatpersen,0) ?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $sangatpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/empat/6.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[1]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-<?= round($puaspersen,0) ?>" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $puaspersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/empat/7.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[2]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($cukuppersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $cukuppersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/empat/8.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[3]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($tidakpersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $tidakpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>

        <?php endif ?>

        <!-- BATAS -->
        <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
            <div class="col col ">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/lima/9.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[0]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-green shadow-style width-per-<?= round($sangatpersen,0) ?>" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $sangatpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col col ">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/lima/10.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text"><?= $jawaban[1]['jwb_ket'] ?></span>
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-<?= round($puaspersen,0) ?>" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <h5><?= $puaspersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col col ">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/lima/11.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[2]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($cukuppersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $cukuppersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col col ">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/lima/12.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[3]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($tidakpersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $tidakpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col col ">
                    <div width="100%" class="info-box5 animate-bar bg-b-purple">
                        <div class="knob-icon">
                            <img src="<?= base_url() ?>assets/images/jwb/lima/13.png" width="80" height="80" alt="User">
                        </div>
                        <div class="info-box-content" width="100%">
                            <span class="info-box-text p-b-10"><?= $jawaban[3]['jwb_ket'] ?></span>
                            <div class="progress m-t-20" width="100%">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-<?= round($stidakpersen,0) ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description"  width="100%">
                                <h5><?= $stidakpersen ?> %</h5>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>

        <?php endif ?>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Polling Kepuasan</h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <canvas id="chartDonut" width="400" height="400"></canvas>

                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-5">
                                <canvas id="chartBar" width="400" height="400"></canvas>
                                
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

                    <?php if ($this->session->userdata('sess_hr_versi')=='tiga'): ?>
                                
                                <script>
                                var ctx = document.getElementById('chartDonut').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Puas', 'Cukup Puas', 'Tidak Puas'],
                                        datasets: [{
                                            label: ' % ',
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
                                            borderWidth: 1 ,

                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        legend: {
                                        display: true, 
                                        position:'top',
                                        labels: {
                                          fontFamily: "myriadpro-regular",
                                          boxWidth: 15,
                                          boxHeight: 2,
                                            }
                                        },
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem, data) {
                                                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                                                    var tooltipLabel = data.labels[tooltipItem.index];
                                                    var tooltipData = allData[tooltipItem.index];
                                                    var total = 0;
                                                    for (var i in allData) {
                                                        total += allData[i];
                                                    }
                                                    var tooltipPercentage = Math.round((tooltipData / total) * 100);
                                                    return tooltipLabel + ': ' + tooltipData + '%';
                                                }
                                            }
                                        }  


                                    }
                                });
                                </script>

                                <script>
                                var ctx = document.getElementById('chartBar').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Puas', 'Cukup Puas', 'Tidak Puas'],
                                        datasets: [{
                                            label: '# Total Vote',
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
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize: 1
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
                <?php endif ?>

                <?php if ($this->session->userdata('sess_hr_versi')=='empat'): ?>
                                
                                <script>
                                var ctx = document.getElementById('chartDonut').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas'],
                                        datasets: [{
                                            label: ' % ',
                                            data: [<?= $sangatpersen ?>, <?= $puaspersen ?>, <?= $cukuppersen ?>, <?= $tidakpersen ?>],
                                            backgroundColor: [
                                                '#5fff81b0',
                                                '#1effeab5',
                                                '#fffa5fa3',
                                                '#ff571587',
                                            ],
                                            borderColor: [
                                                'green',
                                                'yellow',
                                                'red',
                                                'black',
                                            ],
                                            borderWidth: 1 ,

                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        legend: {
                                        display: true, 
                                        position:'top',
                                        labels: {
                                          fontFamily: "myriadpro-regular",
                                          boxWidth: 15,
                                          boxHeight: 2,
                                            }
                                        },
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem, data) {
                                                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                                                    var tooltipLabel = data.labels[tooltipItem.index];
                                                    var tooltipData = allData[tooltipItem.index];
                                                    var total = 0;
                                                    for (var i in allData) {
                                                        total += allData[i];
                                                    }
                                                    var tooltipPercentage = Math.round((tooltipData / total) * 100);
                                                    return tooltipLabel + ': ' + tooltipData + '%';
                                                }
                                            }
                                        }  


                                    }
                                });
                                </script>

                                <script>
                                var ctx = document.getElementById('chartBar').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas'],
                                        datasets: [{
                                            label: '# Total Vote',
                                            data: [<?= $sangat ?>, <?= $puas ?>, <?= $cukup ?>, <?= $tidak ?>],
                                            backgroundColor: [
                                                '#5fff81b0',
                                                '#1effeab5',
                                                '#fffa5fa3',
                                                '#ff571587',
                                            ],
                                            borderColor: [
                                                'green',
                                                'yellow',
                                                'red',
                                                'black',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize:1
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
                <?php endif ?>
                <?php if ($this->session->userdata('sess_hr_versi')=='lima'): ?>
                                
                                <script>
                                var ctx = document.getElementById('chartDonut').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                                        datasets: [{
                                            label: ' % ',
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
                                            borderWidth: 1 ,

                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        legend: {
                                        display: true, 
                                        position:'top',
                                        labels: {
                                          fontFamily: "myriadpro-regular",
                                          boxWidth: 15,
                                          boxHeight: 2,
                                            }
                                        },
                                        tooltips: {
                                            callbacks: {
                                                label: function(tooltipItem, data) {
                                                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                                                    var tooltipLabel = data.labels[tooltipItem.index];
                                                    var tooltipData = allData[tooltipItem.index];
                                                    var total = 0;
                                                    for (var i in allData) {
                                                        total += allData[i];
                                                    }
                                                    var tooltipPercentage = Math.round((tooltipData / total) * 100);
                                                    return tooltipLabel + ': ' + tooltipData + '%';
                                                }
                                            }
                                        }  


                                    }
                                });
                                </script>

                                <script>
                                var ctx = document.getElementById('chartBar').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Sangat Puas','Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
                                        datasets: [{
                                            label: '# Total Vote',
                                            data: [<?= $sangat ?>, <?= $puas ?>, <?= $cukup ?>, <?= $tidak ?>, <?= $stidak ?>],
                                            backgroundColor: [
                                                'deeppink','aqua','yellow','#ddf171','red'
                                            ],
                                            borderColor: [
                                                'green',
                                                'yellow',
                                                'red',
                                                'black',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    stepSize:1
                                                }
                                            }]
                                        }
                                    }
                                });
                                </script>
                <?php endif ?>
