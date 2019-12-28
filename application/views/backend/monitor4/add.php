<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
                <h4 class="float-left">Tambah Pertanyaan Monitor 4</h4>
			</div>
			<div class="card-body">
				<form action="<?= base_url() ?>set/monitor4/add" method="POST">
				<div class="row  justify-content-md-center">
					<div class="col-md-6">
						<div class="form-group">
							<label>Pertanyaan</label>
							<input type="text" name="ptn" placeholder="type here" required class="form-control">
						</div>
						
					</div>
				</div>
				

				<h5 class="text-center">List Jawaban : </h5> <br>
				<div class="row  justify-content-md-center">
					<div class="col-md-1 form-group">
						<label>Option</label>
						<input type="text" name="option[]" placeholder="A~Z" required class="form-control">
					</div>
					<div class="col-md-4 form-group">
						<label>Jawaban</label>
						<input type="text" name="jwb[]" placeholder="Ketik Jawaban Disini" required class="form-control">
					</div>
					<div class="col-md-1">
						<button id="add_button">tambah</button>
					</div>
				</div>
				<div class="wrap">
				</div>
				<button type="submit" name="add" class="btn btn-success float-right">Simpan</button>

	            </form> 
			</div>
		</div>
	</div>
</div>
 <script src="<?= base_url() ?>assets/js/jquery-3.4.1.slim.js"></script>

<script>
			var x = 1; //initlal text box count
            var max_fields      = 20; //maximum input boxes allowed
            var wrapper = $(".wrap"); //Fields wrapper
			var add_button = $('#add_button');

			$(add_button).click(function(e){ //on add input button click
            	 e.preventDefault();

                
                $(wrapper).append('<div class="row mt-2 mb-3  justify-content-md-center"><div class="col-md-1 form-group">'+
                	'<label>Option</label>'+
                	'<input type="text" name="option[]" required placeholder="A~Z" class="form-control"></div>'+
                	'<div class="col-md-4 form-group">'+
                	'<label>Jawaban</label>'+
                	'<input type="text" name="jwb[]" required placeholder="Ketik Jawaban Disini" class="form-control"></div>'+
                	'<div class="col-md-1">'+
                	'<a href="#" class="remove_field">Remove</a></div></div>'+
                	'</div></div>'); //add input box
               
            });

             $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
                
            });
</script>