<div class="row justify-content-center animated slideInRight">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>License</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
								<tr>
									<th>No</th>
									<th>MAC Address</th>
									<th>Exp Date</th>
									<th>Date Created</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($license as $key => $item): ?>
								<tr>
									<td><?= $key+1; ?></td>
									<td><?= $item['license_mac_address'] ?></td>
									<td><?= date_indo($item['license_date_expired']) ?></td>
									<td><?= date_indo($item['license_date_created']) ?></td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>



