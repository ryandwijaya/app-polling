<style>
	<?php if ($setting['set_shape_button'] == 'Theme 1'): ?>
	.lanjut {
		clip-path: polygon(93% 0, 100% 50%, 94% 100%, 0% 100%, 3% 53%, 0% 0%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 2'): ?>
	.lanjut {
		clip-path: polygon(50% 0%, 95% 0, 100% 35%, 100% 70%, 95% 100%, 50% 100%, 6% 100%, 0% 70%, 0% 35%, 6% 0);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 3'): ?>
	.lanjut {
		clip-path: polygon(15% 3%, 100% 0%, 86% 100%, 0% 100%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 4'): ?>
	.lanjut {
		-webkit-clip-path: polygon(92% 1%, 100% 48%, 93% 100%, 8% 100%, 0 48%, 8% 0);
		clip-path: polygon(92% 1%, 100% 48%, 93% 100%, 8% 100%, 0 48%, 8% 0);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 5'): ?>
	.lanjut {
		clip-path: polygon(50% 0%, 100% 0, 96% 50%, 100% 100%, 68% 100%, 32% 100%, 0 100%, 5% 51%, 0 0);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 6'): ?>
	.lanjut {
		clip-path: polygon(0 0, 91% 0, 96% 42%, 96% 68%, 100% 100%, 11% 100%, 6% 65%, 6% 41%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 7'): ?>
	.lanjut {
		clip-path: polygon(50% 0%, 100% 38%, 93% 100%, 5% 100%, 0% 38%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 8'): ?>
	.lanjut {
		clip-path: polygon(0% 15%, 6% 14%, 6% 1%, 91% 0, 91% 12%, 100% 15%, 100% 85%, 92% 88%, 92% 100%, 5% 100%, 5% 85%, 0% 85%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 9'): ?>
	.lanjut {
		clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 75% 75%, 44% 100%, 50% 75%, 0% 75%);
	}

	<?php endif ?>

	<?php if ($setting['set_shape_button'] == 'Theme 10'): ?>
	.lanjut {
		clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 100%);
	}

	<?php endif ?>

	body {
		background: url('<?= base_url() ?>/assets/upload/bg/<?= $setting['set_background_body'] ?>');
		background-size: cover;
		color: <?= $setting['set_font_color'] ?>;
	}

	#box {
		background: <?= $setting['set_background'] ?>;
	}

	.lanjut {
		background: <?= $setting['set_background_button'] ?>;
	}

	/*body{*/
	/*	background: url('*/
	<?//= base_url() ?> /*/assets/upload/bg/bg-2.jpg');*/
	/*	background-repeat: no-repeat;*/
	/*	background-size: cover;*/
	/*	background-position: fixed;*/
	/*}*/
</style>
