function chartbar(ydata, xdata) {
	return 
						var project_name = [];
						var project_duration = [];
						if(data == ""){
							Highcharts.chart('mandaysChart', {
								title: { text: '' },
								yAxis: { enabled: true,
									title: { text: 'Mandays' }
								},
								xAxis: { categories: 0 },
								plotOptions: {
									column: {
										dataLabels: { enabled: true }
									}
								},
								series: [{
									name: 'Mandays',
									type: 'column',
									data: 0,
									color: '#337AB8',
								}]
							});
						}else{
							for (var i = 0; i < data.length; i++) {
								var obj = data[i];
								project_name[i] = obj.ydata;
								project_duration[i] = obj.xdata;
							}

							Highcharts.chart('mandaysChart', {
								title: { text: '' },
								yAxis: {
									enabled: true,
									title: { text: 'Mandays' }
								},
								xAxis: { categories: ydata },
								plotOptions: {
									column: {
										dataLabels: { enabled: true }
									}
								},
								series: [{
									name: 'Mandays',
									type: 'column',
									data: xdata,
									color: '#337AB8',
								}]
							});

}

					