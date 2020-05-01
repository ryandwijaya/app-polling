var root = window.location.origin+'/app-polling/';
function getVotes()
{
	var getUrl = root+ 'ajax/getVotesMonitor3/';

	$.ajax({
		url : getUrl,
		type : 'ajax',
		dataType : 'json',
		method : 'post',
		contentType: "application/json; charset=utf-8", // this
		success : function(response){

			var data_array = [];
			for (var i=0;i<response['array_persen'].length;i++){
				data_array[i]= response.array_persen[i];
			}
			console.log	(data_array);
			var chart = new Highcharts.Chart({
				chart: {
					backgroundColor: "rgba(0,0,0,0)",
					renderTo: 'grafik-kpsn',
					type: 'column',
					animation : false,
					options3d: {
						enabled: true,
						alpha: 10,
						beta: 10,
						depth: 40,
						viewDistance: 25
					},
					style: {
						fontSize: '16px',
						color: 'black'
					}
				},
				title: {
					text: 'Grafik Jumlah Vote',
					style: {
						color: 'black',
						font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
					}
				},
				xAxis: {
					categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
					labels: {
						skew3d: true,
						style: {
							fontSize: '16px',
							color: 'black'
						}
					}
				},
				// subtitle: {
				//   text: 'Test options by dragging the sliders below'
				// },
				plotOptions: {
					column: {
						depth: 25
					},
					series: {
						animation: {
							duration: 0
						}
					}
				},
				series: [{
					name: 'Persen',
					style: {
						fontSize: '16px',
						color: 'black'
					},
					data: data_array,
					// data: [1,2,3,4,5,6,7,1,2,3,4,5,4,5,2]
				}]
			});

		},
		error: function(response){
			console.log(response.status);

		}
	});
}
getVotes();
setInterval(getVotes, 2000);
