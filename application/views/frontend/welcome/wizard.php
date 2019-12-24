<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FormWizard_v6</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/wizard/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/wizard/css/style.css">

	</head>
	<body>
		<div class="wrapper">
            <form action="<?= base_url() ?>step-1">
            	<div id="wizard">
            		<!-- SECTION 1 -->

            		<?php foreach ($ptn as $var): ?>
            			

	                <h4></h4>
	                <section>
	                	<div class="form-header">
	                		<div class="row text-center">
	                			<div class="col-md-12 text-center">
									<h2><?= $var['ptn_txt'] ?></h2>
	                			</div>
	                		</div>
	                	</div>
	                	<div class="form-header mt-5">
	                		<div class="row text-center">
	                			<div class="col-md-12 text-center" style="display: flex;text-align: center;"> 
	                					
									<?php foreach ($jwb as $value): ?>
										<div class="mr-3 text-center">
										<input type="radio" value="<?= $value['jwb_id'] ?>"><span style="font-size: 10pt;"><?= $value['jwb_ket'] ?></span>
										</div>
									<?php endforeach ?>
	                			</div>
	                		</div>
	                	</div>
	                	
	                </section>
	                
            		<?php endforeach ?>
					
            	</div>
            </form>
		</div>
		
		
		<script src="<?= base_url() ?>assets/wizard/js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="<?= base_url() ?>assets/wizard/js/jquery.steps.js"></script>

		<script src="<?= base_url() ?>assets/wizard/js/main.js"></script>
<!-- Template created and distributed by Colorlib -->
</body>
</html>