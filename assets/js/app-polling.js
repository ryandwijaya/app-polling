$(document).ready(function () {
	// ------------------------------------------------------------------------------------------
	// start
	// ------------------------------------------------------------------------------------------
	var root = window.origin + '/App-Polling/';

	// ------------------------------------------------------------------------------------------
	// Kategori
	// ------------------------------------------------------------------------------------------
	$('.edit-ptn').click(function () {
		var id = $(this).val();
		var getUrl = root + 'ptn/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#ptn').val(response.ptn_txt);
				$('#ptn-id').val(response.ptn_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});
	// ------------------------------------------------------------------------------------------
	$('.edit-lyn').click(function () {
		var id = $(this).val();
		var getUrl = root + 'layanan/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#lynn').val(response.lynn_nm);
				$('#lynn-id').val(response.lynn_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------
	$('.edit-jwb').click(function () {
		var id = $(this).val();
		var getUrl = root + 'jwb/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#jwb').val(response.jwb_ket);
				$('#jwb-id').val(response.jwb_id);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------
	$('.edit-usr').click(function () {
		var id = $(this).val();
		var getUrl = root + 'user/ajaxGet/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#nm').val(response.usr_nm);
				$('#usrnm').val(response.usr_usrnm);
				$('#pw').val(response.usr_pw);
				$('#lvl-usr').val(response.usr_lvl);
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		})
	});

	// ------------------------------------------------------------------------------------------

	// $('#show-report').click(function () {
		
	// 	var ptn = $('#nm-ptn').val();
	// 	var lyn = $('#nm-lynn').val();
	// 	var start = $('#tgl-start').val();
	// 	var end = $('#tgl-end').val();
	// 	var getUrl = root + 'laporan/ajaxGet/'+ptn+'/'+lyn+'/'+start+'/'+end;
	// 	var sgtbaik = 0;
	// 	var baik = 0;
	// 	var cukup = 0;
	// 	var buruk = 0;
	// 	var dChart;
	// 	var bChart;

	// 	$.ajax({
	// 		url : getUrl,
	// 		type : 'ajax',
	// 		dataType : 'json',
	// 		method : 'post',
	// 		success: function (response) {
	// 			for (var i = 0; i < response.length; i++) {
	// 				if (response[i].jwb_id == 1) {
	// 					sgtbaik +=1;
	// 				}if (response[i].jwb_id == 2) {
	// 					baik +=1;
	// 				}else if(response[i].jwb_id == 3){
	// 					cukup +=1;
	// 				}else if(response[i].jwb_id == 4){
	// 					buruk +=1;
	// 				}
	// 			}

	// 			var allvote = response.length;
								

	// 			console.log(cukup);
	// 			//chart

	// 			if (bChart) bChart.destroy();
	// 			if (dChart) dChart.destroy();  
	// 			barChart('chartDonut',sgtbaik,baik,cukup,buruk);
	// 			doughnutChart('chartBar',sgtbaik,baik,cukup,buruk);

	// 			$('#responden').html(response.length+' Suara');
	// 			$('#pertanyaan').html(response[0].ptn_txt);
	// 			$('#layanan').html(response[0].lynn_nm);
	// 			$('#tanggalan').html(start+' sampai '+end);

	// 		},
	// 		error: function (response) {
	// 			console.log(response.status + 'error');
	// 		}
	// 	})
	// });

	// ------------------------------------------------------------------------------------------

});

function barChart(id,sgtbaik,baik,cukup,buruk) {
	var ctx = document.getElementById(id).getContext('2d');                       
    bChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sangat Baik','Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [sgtbaik, baik, cukup, buruk],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                    'black',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
function doughnutChart(id,sgtbaik,baik,cukup,buruk) {
	var ctn = document.getElementById(id).getContext('2d');
	
                             
    dChart = new Chart(ctn, {
        type: 'doughnut',
        data: {
            labels: ['Sangat Baik','Baik', 'Cukup', 'Buruk'],
            datasets: [{
                label: '# of Votes',
                data: [sgtbaik, baik, cukup, buruk],
                backgroundColor: [
                    '#5fff81b0',
                    '#fffa5fa3',
                    '#ff571587',
                ],
                borderColor: [
                    'green',
                    'yellow',
                    'red',
                    'black',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}


$("#select-button").change(function(){
	var theme = $(this).val();
	if (theme == 'Theme 1'){
		$(".preview-btn").css("clip-path", "polygon(93% 0, 100% 50%, 94% 100%, 0% 100%, 3% 53%, 0% 0%)");
	}
	else if(theme == 'Theme 2'){
		$(".preview-btn").css("clip-path", "polygon(50% 0%, 95% 0, 100% 35%, 100% 70%, 95% 100%, 50% 100%, 6% 100%, 0% 70%, 0% 35%, 6% 0)");
	}
	else if(theme == 'Theme 3'){
		$(".preview-btn").css("clip-path", "polygon(15% 3%, 100% 0%, 86% 100%, 0% 100%)");
	}
	else if(theme == 'Theme 4'){
		$(".preview-btn").css("clip-path", "polygon(92% 1%, 100% 48%, 93% 100%, 8% 100%, 0 48%, 8% 0)");
	}
	else if(theme == 'Theme 5'){
		$(".preview-btn").css("clip-path", "polygon(50% 0%, 100% 0, 96% 50%, 100% 100%, 68% 100%, 32% 100%, 0 100%, 5% 51%, 0 0)");
	}
	else if(theme == 'Theme 6'){
		$(".preview-btn").css("clip-path", "polygon(0 0, 91% 0, 96% 42%, 96% 68%, 100% 100%, 11% 100%, 6% 65%, 6% 41%)");
	}
	else if(theme == 'Theme 7'){
		$(".preview-btn").css("clip-path", "polygon(50% 0%, 100% 38%, 93% 100%, 5% 100%, 0% 38%)");
	}
	else if(theme == 'Theme 8'){
		$(".preview-btn").css("clip-path", "polygon(0% 15%, 6% 14%, 6% 1%, 91% 0, 91% 12%, 100% 15%, 100% 85%, 92% 88%, 92% 100%, 5% 100%, 5% 85%, 0% 85%)");
	}
	else if(theme == 'Theme 9'){
		$(".preview-btn").css("clip-path", "polygon(0% 0%, 100% 0%, 100% 75%, 75% 75%, 44% 100%, 50% 75%, 0% 75%)");
	}
	else if(theme == 'Theme 10'){
		$(".preview-btn").css("clip-path", "polygon(20% 0%, 80% 0%, 100% 100%, 0% 100%)");
	}
});
$("#color-button").change(function () {
	var colorButton = $(this).val();
	$('.preview-btn').css("background", colorButton);
});

$("#back-ptn").change(function () {
	var colorPtn = $(this).val();
	$('#preview-pertanyaan').css("background", colorPtn);
});

$("#back-kop").change(function () {
	var colorKop = $(this).val();
	$('#preview-kop').css("background", colorKop);
});






