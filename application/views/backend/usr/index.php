    
    <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<button class="btn btn-border-radius btn-primary float-right" data-toggle="modal" data-target="#mdl_add_ptn">Add New</button>
			</div>
			<div class="card-body">
				
	            <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama User</th>
                                <th class="text-center" width="160"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$no = 1;
                        	foreach ($user as $var): ?>
                        		
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $var['usr_nm'] ?></td>
                                <td class="text-center">

                                <!-- <button type="button" value="<?= $var['usr_id'] ?>" class="edit-usr btn bg-lime btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#mdl_edit_ptn"><i class="material-icons">mode_edit</i></button> -->
                                <a href="<?= base_url() ?>ptn/hapus/<?= $var['usr_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
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
		<!-- #START# Modal Form Example -->
         
                
                <div class="modal fade" id="mdl_add_ptn" tabindex="-1" role="dialog"
                    aria-labelledby="formModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Tambah User Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form method="POST" action="<?= base_url() ?>user/tambah">
                            <div class="modal-body">
                                    <label for="email_address1">Nama Lengkap</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address1" name="nm" class="form-control"
                                                placeholder="Type Here">
                                        </div>
                                    </div>

                                    <label for="email_address1">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address1" name="usrnm" class="form-control"
                                                placeholder="Type Here">
                                        </div>
                                    </div>

                                    <label for="email_address1">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="email_address1" name="pw" class="form-control"
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

<!--                 <div class="modal fade" id="mdl_edit_ptn" tabindex="-1" role="dialog"
                    aria-labelledby="formModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form method="POST" action="<?= base_url() ?>user/edit">
                            <div class="modal-body">
                                    <label for="email_address1">Nama Lengkap</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nm" name="nm" class="form-control"
                                                placeholder="Type Here">
                                        </div>
                                    </div>

                                    <label for="email_address1">Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="usrnm" name="usrnm" class="form-control"
                                                placeholder="Type Here">
                                        </div>
                                    </div>

                                    <label for="email_address1">Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="pw" name="pw" class="form-control"
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
                </div> -->
   
        <!-- #END# Modal Form Example -->