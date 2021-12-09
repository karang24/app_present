@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="home-tab"
                        data-toggle="tab"
                        href="#home"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true">Data Sepeda </a>
                </li>
                <!--li class="nav-item">
                    <a
                        class="nav-link"
                        id="bulanan-tab"
                        data-toggle="tab"
                        href="#bulanan"
                        role="tab"
                        aria-controls="bulanan"
                        aria-selected="false">Bulanan</a>
                </li> 
				<li class="nav-item">
                    <a
                        class="nav-link"
                        id="Tahunan-tab"
                        data-toggle="tab"
                        href="#Tahunan"
                        role="tab"
                        aria-controls="Tahunan"
                        aria-selected="false">Tahunan</a>
                </li-->
            </ul>
			<div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade active show"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab">
					<div class="row" >
						<div class="col-md-8 col-sm-8 ">

							<div id="container"></div>
						</div>
						<div class="col-md-4 col-sm-4 ">

							<div id="container5"></div>
						</div>
					</div>
					<div class="row" >
						<div class="col-md-4 col-sm-4 ">

							<div id="container2" ></div>
						</div>
						<div class="col-md-4 col-sm-4 ">
							<div id="container3"></div>	
						</div>
						<div class="col-md-4 col-sm-4 ">
							<div id="container4"></div>		
						</div>
					</div>
				
				
				</div>
			
                
			
			</div>
		</div>
	</div>
	</div>
@endsection
@section('js')

<script type="text/javascript">
  $.ajaxSetup({

				  headers : {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				  }

					  });

$.ajax({
			url : "{{url('data_sepeda')}}",
			type: 'POST',
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				
			//	console.log(data);
		// Radialize the colors
		Highcharts.setOptions({
			colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
				return {
					radialGradient: {
						cx: 0.5,
						cy: 0.3,
						r: 0.7
					},
					stops: [
						[0, color],
						[1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
					]
				};
			})
		});

		// Build the chart
		Highcharts.chart('container', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'Data Sepeda Terakhir'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			accessibility: {
				point: {
					valueSuffix: '%'
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						connectorColor: 'silver'
					}
				}
			},
			series: [{
				name: 'Share',
				data: data
			}]
		});
		},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});			  
	
	
$.ajax({
			url : "{{url('data_stang')}}",
			type: 'POST',
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//console.log(data.tgl1);
				var tgl1 =[];
				var total =[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					console.log(obj);
					tgl1[i] = obj.tgl1;		
					total[i] = parseFloat(obj.persen);
				}
				Highcharts.chart('container2', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Suku Cadang Prima'
				},
				subtitle: {
					text: 'Stang'
				},
				xAxis: {
					categories: tgl1,
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Suku Cadang total'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:.1f}% </b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				
				series: [  {
					name: 'Total',
					data: total

				}]
			});
			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});			
	$.ajax({
			url : "{{url('data_penggerak')}}",
			type: 'POST',
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//console.log(data.tgl1);
				var tgl1 =[];
				var total =[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					console.log(obj);
					tgl1[i] = obj.tgl1;		
					total[i] = parseFloat(obj.persen);
				}
			Highcharts.chart('container3', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Suku Cadang Prima'
			},
			subtitle: {
				text: 'Pengerak'
			},
			xAxis: {
				categories:tgl1,
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Suku Cadang total'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
		   
			series: [{
				name: 'Total',
				data: total

			}]
		});
			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});		

	$.ajax({
			url : "{{url('data_ban_belakang')}}",
			type: 'POST',
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//console.log(data.tgl1);
				var tgl1 =[];
				var total =[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					console.log(obj);
					tgl1[i] = obj.tgl1;		
					total[i] = parseFloat(obj.persen);
							}		
				Highcharts.chart('container4', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Suku Cadang Prima'
				},
				subtitle: {
					text: 'Ban Belakang'
				},
				xAxis: {
					categories: tgl1,
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Suku Cadang total'
					}
				},
						colors:['#009933'],

				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
			   
				series: [{
					name: 'Total',
					data:total

				}]
			});
		},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});		
	$.ajax({
			url : "{{url('data_ban_belakang')}}",
			type: 'POST',
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//console.log(data.tgl1);
				var tgl1 =[];
				var total =[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					console.log(obj);
					tgl1[i] = obj.tgl1;		
					total[i] = parseFloat(obj.persen);
												}		
					Highcharts.chart('container5', {
						chart: {
							type: 'bar'
						},
						title: {
							text: 'Suku Cadang Prima'
						},
						subtitle: {
							text: 'Ban Depan'
						},
						xAxis: {
							categories: tgl1,
							title: {
								text: null
							}
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Suku Cadang',
								align: 'high'
							},
							labels: {
								overflow: 'justify'
							}
						},
						tooltip: {
							valueSuffix: ' %'
						},
						plotOptions: {
							bar: {
								dataLabels: {
									enabled: true
								}
							}
						},
								colors:['#009933'],

						legend: {
							layout: 'vertical',
							align: 'right',
							verticalAlign: 'top',
							x: -40,
							y: 80,
							floating: true,
							borderWidth: 1,
							backgroundColor:
								Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
							shadow: true
						},
						credits: {
							enabled: false
						},
						series: [{
							name: 'Total',
							data:total
						}]
					});
			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});		
</script>

@stop