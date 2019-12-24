<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">

			</div>
			<div class="card-body">
				
	            <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Jawaban</th>
                                <th class="text-center" width="160"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$no = 1;
                        	foreach ($jawaban as $var): ?>
                        		
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $var['jwb_ket'] ?></td>
                                <td class="text-center">

                                <button type="button" value="<?= $var['jwb_id'] ?>" class="edit-jwb btn bg-lime btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#mdl_edit_jwb"><i class="material-icons">mode_edit</i></button>
                                

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
		<!-- #START# Modal Form Example -->
         
                
                

                <div class="modal fade" id="mdl_edit_jwb" tabindex="-1" role="dialog"
                    aria-labelledby="formModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Edit Jawaban</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form method="POST" action="<?= base_url() ?>jwb/edit">
                            <div class="modal-body">
                            		<input type="hidden" id="jwb-id" name="jwb_id">
                                    <label for="email_address1">Jawaban</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="jwb" name="jwb" class="form-control"
                                                placeholder="Type Here">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info waves-effect" name="simpan">Save</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
   
        <!-- #END# Modal Form Example -->