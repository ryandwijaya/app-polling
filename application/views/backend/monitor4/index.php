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
                        		
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $var['ptn4_txt'] ?></td>
                                <td class="text-center">

                                <button type="button" value="<?= $var['ptn4_id'] ?>" class="edit-lyn btn bg-lime btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#mdl_edit_ptn"><i class="material-icons">mode_edit</i></button>
                                <a href="<?= base_url() ?>mntr4/hapus/<?= $var['ptn4_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
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