
</body>
<!-- Footer -->
<footer class="fixed-bottom row">
	<div class="col-10 footer-marquee pb-4 pt-4">
		<marquee><h4> <?= $umum['umum_text_bot'] ?> </h4></marquee>
	</div>
	<div class="col-2 footer-marquee text-center border-left">
		<h4 class="mt-2">
			<div id="clock"></div>
		</h4>
		<h6><i class="fa fa-calendar"></i> <?= date_indo(date("Y-m-d")) ?> </h6>
	</div>
</footer>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/app-polling/jam.js"></script>

</html>
