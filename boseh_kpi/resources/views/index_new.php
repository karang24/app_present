		for (var i = 0; i < data.length; i++) {
						var obj = data[i];
						project_name[i] = obj.PROJECT_NAME;
						project_duration[i] = obj.PROJECT_DURATION;
					  }
					// horizontal report Chart
					  Highcharts.chart('reportChart', {
						 chart: {
						  type: 'bar'
						},
						title: {
						  text: 'Dashboard Kinerja'
						},
						
						xAxis: {
						  categories: project_name,//['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
						  title: {
							text: null
						  }
						},
						yAxis: {
						  min: 0,
						  title: {
							text: 'Population (millions)',
							align: 'high'
						  },
						  labels: {
							overflow: 'justify'
						  }
						},
						tooltip: {
						  valueSuffix: ' millions'
						},
						plotOptions: {
						  bar: {
							dataLabels: {
							  enabled: true
							}
						  }
						},
						legend: {
						  layout: 'horizontal',
						  align: 'right',
						  verticalAlign: 'top',
						  x: -40,
						  y: 80,
						  floating: true,
						  borderWidth: 1,
						  backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
						  shadow: true
						},
						credits: {
						  enabled: false
						},
						series: [{
						  name: 'Final Score',
						  data: project_duration //[107, 31, 635, 203, 2]
						}]
					  });