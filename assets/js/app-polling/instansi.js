$('#label-versi').change(function () {
	var label = $(this).val();
	var android = '<option class="android"  value="tiga"> 3 - Puas,Cukup PUas,Tidak Puas</option>' +
		'<option class="android"  value="empat"> 4 - Sangat Puas,Puas,Cukup Puas,Tidak Puas</option>' +
		'<option class="android"  value="lima"> 5 - Sangat Puas,Puas,Cukup Puas,Tidak Puas,Sangat Tidak Puas</option>';
	var statis = '<option class="statis"  value="monitor3"> Monitor 3</option>';
	var dinamis = '<option class="dinamis"  value="monitor4"> Monitor 4</option>';
	if (label == 'android'){
		$( "#app-responden" ).hide();
		$('.opt-val').html(android);
		$('.statis').remove();
		$('.dinamis').remove();
		$('.opt-val').formSelect();
		$('#version').val('android');
	}else if(label == 'monitor') {
		$( "#app-responden" ).show();
		$('.opt-val').html(android);
		$('.statis').remove();
		$('.dinamis').remove();
		$('.opt-val').formSelect();
		$('#version').val('monitor');
	}else if(label == 'statis'){
		$("#app-responden" ).hide();
		$('.opt-val').html(statis);
		$('.android').remove();
		$('.dinamis').remove();
		$('.opt-val').formSelect();
		$('#version').val('monitor');
	}else if(label == 'dinamis'){
		$("#app-responden" ).show();
		$('.opt-val').html(dinamis);
		$('.statis').remove();
		$('.android').remove();
		$('.opt-val').formSelect();
		$('#version').val('monitor');
	}
});
