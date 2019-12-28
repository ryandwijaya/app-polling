<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
                <h4 class="float-left">List Pertanyaan Monitor 4</h4>
				<a href="<?= base_url() ?>set/monitor4/add"><button class="btn btn-border-radius btn-primary float-right" data-toggle="modal" data-target="#mdl_add_ptn">Add New</button></a>
			</div>
			<div class="card-body">
				
	            <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Pertanyaan</th>
                                <th class="text-center" width="160"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$no = 1;
                        	foreach ($ptn as $var): ?>
                        		<?php $jwb = $this->Monitor4Model->getJwb($var['ptn4_id']); ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $var['ptn4_txt'] ?> <br>
                                    <?php foreach ($jwb as $value): ?>
                                            <?= $value['jwb4_option'].'. '.$value['jwb4_ket'].'<br>'; ?>
                                    <?php endforeach ?>

                                </td>
                                <td class="text-center">
                                <a href="<?= base_url() ?>set/monitor4/hapus/<?= $var['ptn4_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                        		<i class="material-icons">delete</i></a>

                            	</td>
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