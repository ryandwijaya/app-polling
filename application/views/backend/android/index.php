<link rel="stylesheet" href="">
<style>
    @font-face {
        font-family: tulisan_keren;
        src: <?= base_url('assets/fonts/tes/Samantha.ttf') ?>;
    }
    h2{
        font-family: 'tulisan_keren';
        font-size: 70pt;
        font-variant: inherit;
    }
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card">
    			<div class="card-header">
                    <h4 class="float-left">Pengaturan Android</h4>
    			</div>
                

                <div class="card-body">
                    <form action="<?= base_url() ?>set/android" method="POST">
                    


                    <!-- PENGATURAN TANGGAL DAN JAM -->
                    
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h5>Pengaturan Tanggal & Jam</h5>
                        <hr>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 form-group"> 
                            <label> Gaya Tulisan </label>                           
                                <select name="font" id="font-jam" name="andro_font">
                                    <option value="<?= $setting[0]['andro_font'] ?>" >- Pilih Gaya Tulisan -</option>
                                    <option>Courier New, monospace</option>
                                    <option>Comic Sans, Comic Sans MS, cursive</option>
                                    <option>Impact, fantasy</option>
                                    <option>Verdana</option>
                                    <option>Garamond</option>
                                    <option>Bookman</option>
                                    <option>Candara</option>
                                </select>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" name="andro_font_color" id="color-jam" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <label>Preview</label>
                            <h4 class="mt-3" id="preview-jam"><?= date("h:i:s") ?></h4>
                        </div>
                    </div>
                    




                    <!-- PENGATURAN JUDUL -->

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10">
                            <h5>Pengaturan Judul</h5>
                        <hr>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <label>Preview</label>
                            <h5 id="preview-judul">Judul header aplikasi</h5>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Isi Tulisan</label>
                                <textarea name="andro_text" id="isi-judul"  rows="2" placeholder="tulis disini" class="form-control"><?= $setting[0]['andro_text'] ?></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Gaya Tulisan</label>
                                <select name="font" id="font-judul" name="andro_font">
                                    <option value="<?= $setting[0]['andro_font'] ?>" >- Pilih Gaya Tulisan -</option>
                                    <option>Courier New, monospace</option>
                                    <option>Comic Sans, Comic Sans MS, cursive</option>
                                    <option>Impact, fantasy</option>
                                    <option>Verdana</option>
                                    <option>Garamond</option>
                                    <option>Bookman</option>
                                    <option>Candara</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" id="color-judul" name="andro_font_color" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Size</label>
                                <input type="number" min="1" id="size-judul" value="<?= $setting[0]['andro_font_size'] ?>" name="andro_font_size" max="999" class="form-control">
                            </div>
                        </div>

                    </div>
    

                    <!-- PENGATURAN ALAMAT -->

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10">
                            <h5>Pengaturan Alamat</h5>
                        <hr>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <label>Preview</label>
                            <h5 id="preview-alamat">Alamat aplikasi</h5>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Isi Tulisan</label>
                                <textarea name="andro_text"  rows="2" placeholder="tulis disini" class="form-control"><?= $setting[0]['andro_text'] ?></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Gaya Tulisan</label>
                                <select name="font" id="font-alamat" name="andro_font">
                                    <option value="<?= $setting[0]['andro_font'] ?>" >- Pilih Gaya Tulisan -</option>
                                    <option>Courier New, monospace</option>
                                    <option>Comic Sans, Comic Sans MS, cursive</option>
                                    <option>Impact, fantasy</option>
                                    <option>Verdana</option>
                                    <option>Garamond</option>
                                    <option>Bookman</option>
                                    <option>Candara</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" id="color-alamat" name="andro_font_color" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Size</label>
                                <input type="number" min="1" id="size-alamat" value="<?= $setting[0]['andro_font_size'] ?>" name="andro_font_size" max="999" class="form-control">
                            </div>
                        </div>

                    </div>



                    <!-- PENGATURAN PERTANYAAN -->

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10">
                            <h5>Pengaturan Pertanyaan Atas dan Bawah</h5>
                        <hr>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <label>Preview</label>
                            <h5 id="preview-ptn">Bagaimana pendapat anda ?</h5>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Isi Tulisan</label>
                                <textarea name="andro_text"  rows="2" placeholder="tulis disini" class="form-control"><?= $setting[0]['andro_text'] ?></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Gaya Tulisan</label>
                                <select name="font" id="font-ptn" name="andro_font">
                                    <option value="<?= $setting[0]['andro_font'] ?>" >- Pilih Gaya Tulisan -</option>
                                    <option>Courier New, monospace</option>
                                    <option>Comic Sans, Comic Sans MS, cursive</option>
                                    <option>Impact, fantasy</option>
                                    <option>Verdana</option>
                                    <option>Garamond</option>
                                    <option>Bookman</option>
                                    <option>Candara</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" id="color-ptn" name="andro_font_color" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Size</label>
                                <input type="number" min="1" id="size-ptn" value="<?= $setting[0]['andro_font_size'] ?>" name="andro_font_size" max="999" class="form-control">
                            </div>
                        </div>

                    </div>




                    <!-- PENGATURAN PERTANYAAN BAWAH -->

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10">
                            <h5>Pengaturan Text Berjalan</h5>
                        <hr>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <label>Preview</label>
                            <h5 id="preview-text">Selamat Datang di Aplikasi IKM</h5>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Isi Tulisan</label>
                                <textarea name="andro_text"  rows="2" placeholder="tulis disini" class="form-control"><?= $setting[0]['andro_text'] ?></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >Gaya Tulisan</label>
                                <select name="font" id="font-text" name="andro_font">
                                    <option value="<?= $setting[0]['andro_font'] ?>" >- Pilih Gaya Tulisan -</option>
                                    <option>Courier New, monospace</option>
                                    <option>Comic Sans, Comic Sans MS, cursive</option>
                                    <option>Impact, fantasy</option>
                                    <option>Verdana</option>
                                    <option>Garamond</option>
                                    <option>Bookman</option>
                                    <option>Candara</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" name="andro_font_color" id="color-text" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Size</label>
                                <input type="number" min="1" id="size-text" value="<?= $setting[0]['andro_font_size'] ?>" name="andro_font_size" max="999" class="form-control">
                            </div>
                        </div>

                    </div>



                    <div class="row mt-4 justify-content-center">
                    <div class="col-md-10 text-right">
                        <button class="float-right btn btn-success btn-sm" type="submit" name="set">Simpan</button>
                    </div>
                    </div>
                    
                    </form>


                    </div>	
	            </div>
        </div>
    </div>
</div>