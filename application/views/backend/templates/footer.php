</div>
</section>
<!-- Plugins Js -->
<script src="<?= base_url() ?>assets/js/app.min.js"></script>
<script src="<?= base_url() ?>assets/js/table.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>assets/js/admin.js"></script>
<script src="<?= base_url() ?>assets/js/app-polling.js"></script>
<script src="<?= base_url() ?>assets/js/pages/index.js"></script>
<script src="<?= base_url() ?>assets/js/pages/charts/jquery-knob.js"></script>
<script src="<?= base_url() ?>assets/js/pages/sparkline/sparkline-data.js"></script>
<script src="<?= base_url() ?>assets/js/pages/medias/carousel.js"></script>

<script src="<?= base_url() ?>assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
<script src="<?= base_url() ?>assets/js/form.min.js"></script>
<script src="<?= base_url() ?>assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script src="<?= base_url() ?>assets/js/pages/forms/advanced-form-elements.js"></script>

<script src="<?= base_url() ?>assets/js/sweetalert2.js"></script>
<script src="<?= base_url() ?>assets/js/app-polling/android.js"></script>
<script src="<?= base_url() ?>assets/js/app-polling/instansi.js"></script>

<script src="<?= base_url() ?>assets/js/dropify.js"></script>
<script>
	$('.dropify').dropify();
</script>

<!--<script>-->
<!--	function fullScreen(theURL) {-->
<!--		window.open(theURL, '', 'fullscreen=yes, scrollbars=auto');-->
<!--	}-->
<!--</script>-->

<?php if ($this->session->flashdata('alert') == 'success_post') { ?>
<style>
	.swal2-select,
	.select-dropdown,
	.dropdown-trigger,
	.select-wrapper {
		display: none;
		visibility: hidden;
	}

</style>
<script>
	Swal.fire(
		'Berhasil !',
		'Data sukses di simpan.',
		'success'
	)

</script>
<?php } ?>

<?php if ($this->session->flashdata('alert') == 'success_delete') { ?>
<style>
	.swal2-select,
	.select-dropdown,
	.dropdown-trigger,
	.select-wrapper {
		display: none;
		visibility: hidden;
	}

</style>
<script>
	Swal.fire(
		'Berhasil !',
		'Data sukses di hapus.',
		'success'
	)

</script>
<?php } ?>


<?php if ($this->session->flashdata('alert') == 'success_versi') { ?>
	<style>
		.swal2-select,
		.select-dropdown,
		.dropdown-trigger,
		.select-wrapper {
			display: none;
			visibility: hidden;
		}


	</style>
	<script>
		Swal.fire({
			title: 'Berhasil di ubah, silahkan login kembali untuk melanjutkan.',
			icon: 'success',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Re-login !'
		}).then((result) => {
			if (result.value) {
				var root = window.origin + '/app-polling/';
				location.replace(root + 'logout');
			}
		});

	</script>
<?php } ?>

<?php if ($this->session->flashdata('alert') == 'success_edit') { ?>
<style>
	.swal2-select,
	.select-dropdown,
	.dropdown-trigger,
	.select-wrapper {
		display: none;
		visibility: hidden;
	}

</style>
<script>
	Swal.fire(
		'Berhasil !',
		'Data sukses di Edit.',
		'success'
	)

</script>
<?php } ?>
<?php if ($this->session->flashdata('alert') == 'cannot_delete') { ?>
<style>
	.swal2-select,
	.select-dropdown,
	.dropdown-trigger,
	.select-wrapper {
		display: none;
		visibility: hidden;
	}

</style>
<script>
	Swal.fire({
		icon: 'warning',
		title: 'Oops...',
		text: 'Data ini tidak dibisa dihapus!'
	})

</script>
<?php } ?>





<!--     <script src="<?= base_url() ?>assets/js/jquery-1.12.4.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-ui.js"></script> -->
<script>
	$(document).ready(function () {

		$('#btn-edit').click(function () {


			$(".inputan").prop("readonly", false);
			$(".inputan").prop("disabled", false);
			$("#logo").prop("disabled", false);
			$(".btn-simpan").prop("disabled", false);

		});
	});

</script>

<script>
	function confirmLogout() {
		Swal.fire({
			title: 'Apakah yakin ingin keluar?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin !'
		}).then((result) => {
			if (result.value) {
				var root = window.origin + '/app-polling/';
				location.replace(root + 'logout');
			}
		})
	}


	function printContent() {
		$('#kop').css('display', 'block');
		window.print();
	}

	function closeKop() {
		$('#kop').css('display', 'none');
	}
	setInterval(closeKop, 3000);

</script>
<script>
	$("#font").change(function () {
		var gayaTulisan = $(this).val();
		$('#contoh-font').css("font-family", gayaTulisan);
	});

</script>

<!-- Ryan DWijaya Efendi -->

</body>
