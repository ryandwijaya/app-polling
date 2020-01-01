<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="float-left">Pengaturan Umum</h3>
                <!-- <a href="#" class="text-primary float-right pr-2" id="btn-edit"><h5><i class="fa fa-edit"></i> Edit</h5></a> -->
			</div>
			<div class="card-body pb-4">
				
					<?= form_open('umum',array('enctype'=>'multipart/form-data')) ?>

				
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 input-field">
                        <div class="input-field">
                        <select name="font" id="font">
                            <option value="<?= $umum[0]['umum_font'] ?>" disabled selected>- Pilih Font -</option>
                            <option>Courier New, monospace</option>
                            <option>Comic Sans, Comic Sans MS, cursive</option>
                            <option>Impact, fantasy</option>
                            <option>Verdana</option>
                            <option>Garamond</option>
                            <option>Bookman</option>
                            <option>Candara</option>
                        </select>
                        <label style="color: black;">Gaya tulisan --- Pratinjau : <span id="contoh-font" style="color: black;;margin-left: 20px;font-size: 12pt;"> Contoh Tulisan !!</span></label>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label>Text Running Atas</label>
                        <textarea name="text_top" rows="4" class="form-control" required><?= $umum[0]['umum_text_top'] ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label>Text Running Bawah</label>
                        <textarea name="text_bot" rows="4" class="form-control" required><?= $umum[0]['umum_text_bot'] ?></textarea>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                
                <!-- <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label> Background Monitor </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="background" class="form-control" value="<?= $umum[0]['umum_background'] ?>">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div> -->

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label> Background Header </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="bg_header" class="form-control" value="<?= $umum[0]['umum_bg_header'] ?>">
                            </div>
                            <span class="input-group-addon border bg-light">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label> Background Video </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="bg_video" class="form-control" value="<?= $umum[0]['umum_bg_video'] ?>">
                            </div>
                            <span class="input-group-addon border bg-light">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label> Background Text Running </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="bg_marquee" class="form-control" value="<?= $umum[0]['umum_bg_marquee'] ?>">
                            </div>
                            <span class="input-group-addon border bg-light">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label> Background Grafik </label>
                        <div class="input-group colorpicker">
                            <div class="form-line">
                                <input type="text" name="bg_chart" class="form-control" value="<?= $umum[0]['umum_bg_video'] ?>">
                            </div>
                            <span class="input-group-addon border bg-light">
                                <i></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <!-- <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <label>Background</label>
                        <select name="background" class="form-control" required>
                            <option value="<?= $umum[0]['umum_background'] ?>">- Pilih Warna -</option>
                            <option value="aliceblue" style=" background: aliceblue;">aliceblue</option>
                            <option value="antiquewhite" style=" background: antiquewhite;">antiquewhite</option>
                            <option value="aqua" style=" background: aqua;">aqua</option>
                            <option value="aquamarine" style=" background: aquamarine;">aquamarine</option>
                            <option value="beige" style=" background: beige;">beige</option>
                            <option value="darkgrey" style=" background: darkgrey;">darkgrey</option>
                            <option value="darksalmon" style=" background: darksalmon;">darksalmon</option>
                            <option value="deeppink" style=" background: deeppink;">deeppink</option>
                            <option value="hotpink" style=" background: hotpink;">hotpink</option>
                            <option value="springgreen" style=" background: springgreen;">springgreen</option>
                            <option value="ivory" style=" background: ivory;">ivory</option>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                </div> -->

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <video width="220" height="140" controls>
                                  <source src="<?= base_url() ?>assets/upload/video/<?= $umum[0]['umum_video'] ?>#t=6.0" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-7 ml-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tambah Playlist ?</label><br>
                                        <input type="file" name="video" value="<?= $umum[0]['umum_video'] ?>" >
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                            <ul>
                                        <?php foreach ($playlist as $value): ?>
                                                <li style="font-size: 12pt;"> - <?= $value['video_judul'] ?> <a href="<?= base_url() ?>playlist/hapus/<?= $value['video_id'] ?>" class="float-right text-danger" data-toggle="tooltip" data-placement="right" title="Hapus ?" onclick="return confirm('Yakin ingin menghapus video ini?')"><i class="far fa-times-circle"></i></a></li>
                                        <?php endforeach ?>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button class="float-right btn btn-success btn-sm" type="submit" name="edit">Simpan</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>


  
                   </form>         
			</div>
		</div>
	</div>
</div>


		