<?php if ( $this->session->userdata('sess_hr_version') == 'android' && $this->session->userdata('sess_hr_versi') == 'tiga' ):  ?>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).keydown(function (key) {
			let btnSetting = key.originalEvent.key;
			var root = window.location.origin+'/app-polling/';
			var thanks = $('#thanks')[0];
			console.log(btnSetting);
			if (btnSetting == '<?= $loket1['key_1'] ?>'){

				var getUrl = root+ 'ajaxPostKpsn/1/1';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log('berhasil');
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket1['key_2'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/2/1';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();
					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket1['key_3'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/3/1';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}
			else if(btnSetting == '<?= $loket2['key_1'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/1/2';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket2['key_2'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/2/2';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket2['key_3'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/3/2';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket3['key_1'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/1/3';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket3['key_2'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/2/3';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket3['key_3'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/3/3';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket4['key_1'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/1/4';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket4['key_2'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/2/4';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket4['key_3'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/3/4';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket5['key_1'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/1/6';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket5['key_2'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/2/6';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}else if(btnSetting == '<?= $loket5['key_3'] ?>'){
				var getUrl = root+ 'ajaxPostKpsn/3/6';
				$.ajax({
					url : getUrl,
					type : 'ajax',
					method : 'post',
					contentType: "application/json; charset=utf-8", // this
					success : function(response){
						console.log(response);
						thanks.play();

					},
					error: function(response){
						console.log(response.status);

					}
				});
			}
		});
	});
</script>
<?php endif;  ?>
