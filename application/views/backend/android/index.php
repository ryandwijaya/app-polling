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
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Isi Tulisan</label>
                                <textarea name="andro_text"  rows="5" placeholder="tulis disini" class="form-control"><?= $setting[0]['andro_text'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label > Preview :</label> <div id="contoh-font">Nama Saya</div>
                                <select name="font" id="font" name="andro_font">
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
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Warna Tulisan </label>
                                    <div class="input-group colorpicker">
                                        <div class="form-line">
                                            <input type="text" name="andro_font_color" class="form-control" value="<?= $setting[0]['andro_font_color'] ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                    </div>



                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ukuran Font</label>
                                <input type="number" min="1" value="<?= $setting[0]['andro_font_size'] ?>" name="andro_font_size" max="999" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-center">
                    <div class="col-md-6 text-right">
                        <button class="float-right btn btn-success btn-sm" type="submit" name="set">Simpan</button>
                    </div>
                    </div>
                    
                    </form>


                    </div>	
	            </div>
        </div>
    </div>
</div>