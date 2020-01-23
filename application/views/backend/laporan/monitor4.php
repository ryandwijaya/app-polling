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
			font-size: 10pt
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
				<form action="<?= base_url() ?>laporan/monitor4" method="POST">

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
							<div> <?= count($responden) ?></div>
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
								$no = 1;
								$array_persen = array();
								$array_pertanyaan = array();
								foreach ($ptn as $key => $var):
									$a = 0;
									$b = 0;
									$c = 0;
									$d = 0;
									?>

									<?php foreach ($kpsn as $value): ?>
									<?php if ($value['kpsn4_ptn'] == $var['ptn4_id']):


										if ($value['kpsn4_A'] == '1') {
											$a += 1;
										} elseif ($value['kpsn4_B'] == '1') {
											$b += 1;
										} elseif ($value['kpsn4_C'] == '1') {
											$c += 1;
										} elseif ($value['kpsn4_D'] == '1') {
											$c += 1;
										}

										?>
									<?php endif ?>
								<?php endforeach ?>
									<tr>
										<td class="text-center"><?= $no ?></td>
										<td><?= $var['ptn4_txt'] ?></td>

										<td class="text-center"><?= $a ?></td>
										<td class="text-center"><?= $b ?></td>
										<td class="text-center"><?= $c ?></td>
										<td class="text-center"><?= $d ?></td>
										<?php $persentase = (($b * 33.3) + ($c * 66.6) + ($d * 100)) / (100*($a+$b+$c+$d))*100; ?>

										<td class="text-center"><?= round($persentase, 2) ?>%</td>

									</tr>


									<?php
									if ($key == count($ptn) - 1) {
										$a_last = $a;
										$b_last = $b;
										$c_last = $c;
										$d_last = $d;
									}
									array_push($array_persen, round($persentase, 2));
									array_push($array_pertanyaan, $no);
									$no++;
								endforeach ?>


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
			<div class="row justify-content-md-center">
				<div class="col-md-10">
					<div id="chartPie" style="margin-left: 0;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>/assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/highcharts-3d.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/exporting.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/export-data.js"></script>
<script src="<?= base_url() ?>/assets/js/highchart/accessibility.js"></script>
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
			categories: [
				<?php
				for ($i = 0; $i < count($array_pertanyaan); $i++) {

					echo $array_pertanyaan[$i] . ',';
				}
				?>
			],
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


	// PIE CHART

	Highcharts.chart('chartPie', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Chart'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
		},
		accessibility: {
			point: {
				valueSuffix: ' jumlah'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} '
				}
			}
		},
		series: [{
			name: 'Jumlah',
			colorByPoint: true,
			data: [{
				name: 'A',
				y: <?= $a_last ?>,
				sliced: true,
				selected: true
			}, {
				name: 'B',
				y: <?= $b_last ?>
			}, {
				name: 'C',
				y: <?= $c_last ?>
			}, {
				name: 'D',
				y: <?= $d_last ?>
			}]
		}]
	});
</script>
