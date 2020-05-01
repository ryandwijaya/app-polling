<script src="<?= base_url() ?>/assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts-3d.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/exporting.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/export-data.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/accessibility.js"></script>
<style>
	@media screen {
		p.bodyText {
			font-family: verdana, arial, sans-serif;
		}
	}

	@media print {
		.table-responsive {
			zoom: 70%;
		}

		.card {
			margin-top: -40px;
		}
	}

	@media screen, print {
		p.bodyText {
			font-size: 100pt
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

				<form action="<?= base_url() ?>laporan/monitor3" method="POST">

					<hr>
					<div class="row mt-3 p-2">
						<div class="col-md-4">
							<input type="date" id="tgl-start" name="start" class="form-control">
						</div>
						<div class="col-md-4">
							<input type="date" id="tgl-end" name="end" class="form-control">
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
				<h4 class="float-left d-print-none">Laporan Polling Kepuasan Layanan</h4>
				<button class="d-print-none btn btn-info float-right" onclick="printContent()"><i
						class="fa fa-print"></i> PDF
				</button>
			</div>
			<div class="card-body" style="font-size: 12pt;">

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

				<div class="row justify-content-md-center">
					<div class="col-md-10">
						<h5 class="text-center">Laporan Polling Kepuasan Layanan</h5>
						<div style="display: flex;margin-top: 20px;">
							<div style="width: 200px;">Tanggal</div>
							<div style="margin-right: 30px;">:</div>
							<div><?= date_indo(date('Y-m-d')) ?></div>
						</div>
						<div style="display: flex;">
							<div style="width: 200px;">Periode Report</div>
							<div style="margin-right: 30px;">:</div>
							<?php if ($this->input->post('start') == '') { ?>
								<div><?= date_indo(date('Y-m-d')) ?></div>
							<?php } else { ?>
								<div><?= date_indo($this->input->post('start')) ?>
									- <?= date_indo($this->input->post('end')) ?></div>

							<?php } ?>
						</div>
						<div style="display: flex;">
							<div style="width: 200px;">Jumlah Responden</div>
							<div style="margin-right: 30px;">:</div>
							<div> <?= $responden ?></div>
						</div>
					</div>
				</div>


				<div class="row mt-5 justify-content-md-center">
					<div class="col-md-10">

						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
								<tr class="text-center">
									<th rowspan="2" width="30px">No</th>
									<th rowspan="2" style="width: 600px;">Pertanyaan</th>
									<th colspan="4" style="width: 100px;">Pemilih</th>
									<th rowspan="2" style="width: 100px;">Persentase</th>
								<tr class="text-center">
									<th>A</th>
									<th>B</th>
									<th>C</th>
									<th>D</th>
								</tr>
								</tr>

								</thead>
								<tbody>
								<?php
								$array_persen = array();
								$no = 1;
								$date_now = date('Y-m-d');
								for ($i = 0; $i < 15; $i++) { ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $ptn[$i] ?></td>
										<?php if ($this->input->post('start') == '') { ?>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $date_now, $date_now); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $date_now, $date_now); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $date_now, $date_now); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $date_now, $date_now); ?> </td>
											<?php $totalA = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $date_now, $date_now); ?>
											<?php $totalB = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $date_now, $date_now); ?>
											<?php $totalC = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $date_now, $date_now); ?>
											<?php $totalD = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $date_now, $date_now); ?>

											<?php $persenB = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $date_now, $date_now) * 33.3); ?>
											<?php $persenC = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $date_now, $date_now) * 66.6); ?>
											<?php $persenD = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $date_now, $date_now) * 100); ?>
										<?php } else { ?>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $this->input->post('start'), $this->input->post('end')); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $this->input->post('start'), $this->input->post('end')); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $this->input->post('start'), $this->input->post('end')); ?> </td>
											<td class="text-center"> <?= $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $this->input->post('start'), $this->input->post('end')); ?> </td>

											<?php $totalA = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'A', $this->input->post('start'), $this->input->post('end')); ?>
											<?php $totalB = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $this->input->post('start'), $this->input->post('end')); ?>
											<?php $totalC = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $this->input->post('start'), $this->input->post('end')); ?>
											<?php $totalD = $this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $this->input->post('start'), $this->input->post('end')); ?>

											<?php $persenB = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'B', $this->input->post('start'), $this->input->post('end')) * 33.3); ?>
											<?php $persenC = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'C', $this->input->post('start'), $this->input->post('end')) * 66.6); ?>
											<?php $persenD = ($this->Monitor3Model->getJwbKet('mnt3_jwb' . $i, 'D', $this->input->post('start'), $this->input->post('end')) * 100); ?>
										<?php } ?>
										<td class="text-center">
											<?php
											$total=(($persenB+$persenC+$persenD)/(100*($totalA+$totalC+$totalB+$totalD)))*100;
											if ($totalA == 0 && $totalB == 0 && $totalC == 0 && $totalD == 0   ){ ?>
												<span class="badge badge-warning text-light">Belum ada</span>
											<?php }else{ ?>
											<?= round((($persenB+$persenC+$persenD)/(100*($totalA+$totalC+$totalB+$totalD)))*100 , 1 ).'%' ?>
											<?php } ?>
										</td>
									</tr>
									<?php
									array_push($array_persen, round((($persenB+$persenC+$persenD)/(100*($totalA+$totalC+$totalB+$totalD)))*100, 1));
									$no++;
									} ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-10">
						<div id="chartBar" style="margin-left: 0;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var chart = new Highcharts.Chart({

		chart: {
			animation: false,
			renderTo: 'chartBar',
			type: 'column',
			options3d: {
				enabled: true,
				alpha: 0,
				beta: 0,
				depth: 40,
				viewDistance: 25
			}
		},
		title: {
			text: 'Grafik Jumlah Vote'
		},
		xAxis: {
			categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '100', '11', '12', '13', '14', '15'],
			labels: {
				skew3d: true,
				style: {
					fontSize: '16px'
				}
			}
		},
		// subtitle: {
		//   text: 'Test options by dragging the sliders below'
		// },
		plotOptions: {
			column: {
				depth: 25
			}
		},
		series: [{
			name: 'Jumlah',
			data: [<?php
				for ($i = 0; $i < count($array_persen); $i++) {

					echo $array_persen[$i] . ',';
				}
				?>
			]
		}]
	});


</script>
