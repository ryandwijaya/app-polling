


    
</body>

<!-- Plugins Js -->
<script src="<?= base_url() ?>assets/js/app-polling/jquery.numeric-min.js?v=<?= date('YmdHis') ?>"></script>
<script>
	$('.input-numeric').numeric({
		negative:false
	})
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).keydown(function (key) {
			let btnSetting = key.originalEvent.key;
			console.log(btnSetting);
			if (btnSetting == 'F10'){
				window.history.back();
			}
		});
	});
</script>

<!-- Custom Js -->
<!--	<script src="--><?//= base_url() ?><!--assets/js/app-polling/jquery.numeric.js"></script>-->

<!--<script src="--><?//= base_url() ?><!--assets/js/admin.js"></script>-->
<script src="<?= base_url() ?>assets/js/app-polling.js"></script>
<!--<script src="--><?//= base_url() ?><!--assets/js/pages/index.js"></script>-->
<!--<script src="--><?//= base_url() ?><!--assets/js/pages/charts/jquery-knob.js"></script>-->
<!--<script src="--><?//= base_url() ?><!--assets/js/pages/sparkline/sparkline-data.js"></script>-->
<!--<script src="--><?//= base_url() ?><!--assets/js/pages/medias/carousel.js"></script>-->
</html>


