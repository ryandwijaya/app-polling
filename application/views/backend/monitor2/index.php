<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Pengaturan Monitor 2</h3>
                <!-- <a href="#" class="text-primary float-right pr-2" id="btn-edit"><h5><i class="fa fa-edit"></i> Edit</h5></a> -->
			</div>
			<div class="card-body pb-4">
				
				<form action="<?= base_url() ?>set/monitor2" method="POST">
                
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 input-field col s12">
                        <select name="id_lynn"  required>
                            <option value="<?= $set_monitor['set_lyn'] ?>" selected>- Monitor -</option>
                            <!-- <?php foreach ($lyn as $va): ?>
                                <option value="<?= $va['lynn_id'] ?>"><?= $va['lynn_nm'] ?></option>
                            <?php endforeach ?> -->
                        </select>
                        <label>Layanan</label>
                    </div>
                    <div class="col-md-2"></div>
                </div>

				<div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 input-field col s12">
                        <select name="ptn" required>
                            <option value="<?= $set_monitor['set_ptn'] ?>" selected>- Pilih Pertanyaan -</option>
                            <?php foreach ($ptn as $var): ?>
                                <option value="<?= $var['ptn_id'] ?>"><?= $var['ptn_txt'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <label>Pertanyaan</label>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col s12">
                        
                        <label> Background Monitor </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="background" class="form-control" value="<?= $set_monitor['set_background'] ?>">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button class="float-right btn btn-success btn-sm" type="submit" name="set">Simpan</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>


  
                   </form>         
			</div>
		</div>
	</div>
</div>


<!-- <div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <h5>Settings</h5>
            </div>
            <div class="card-body">
                
                
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="60">No</th>
                                            <th>Layanan</th>
                                            <th>Pertanyaan</th>
                                            <th>Background</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($set2 as $get): 

                                        $ptnn = $this->PtnModel->lihat_satu($get['set_ptn']);
                                        $lynn = $this->LynModel->lihat_satu($get['set_lyn']);
                                        ?>
                                            
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td class="text-center"><?= $lynn['lynn_nm'] ?></td>
                                            <td class="text-center"><?= $ptnn['ptn_txt'] ?></td>
                                            <td class="text-center"><button style="font-size: 10px;width: 80px;height: 25px;border: 0;outline: 0;background: <?= $get['set_background'] ?> ;"> <?= $get['set_background'] ?>  </button></td>
                                           
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

 -->

		