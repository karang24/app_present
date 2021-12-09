@extends('layouts.master_obuPln')

@if($dashboard == '1')
	@section('contentLevel')
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard active"></i> Dashboard OBU</a></li>
		</ol>
	@endsection

	@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-bar-chart"></i> Registration OBU</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div id="chartTotalObu"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><br/>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-bar-chart"></i> Total Per-Lokasi</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
										<input type="radio" name="obu_type" class="flat-red kontrak_radio"
											value="type_l" checked> Lokasi&nbsp;&nbsp;
										<input type="radio" name="obu_type" class="flat-red kontrak_radio"
											value="type_s"> Saldo
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-9">
								<div id="ChartPerLoc"></div>
							</div>
							<div class="col-lg-3">
								<div id="miniChartOBU"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><br/>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-pie-chart"></i> Registration & Saldo</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="row">
							<div class="col-lg-6">
								<div id="ChartPercentTotal"></div>
							</div>

							<div class="col-lg-6">
								<div id="ChartPercentSaldo"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection

	@push('scripts')
		<script>
			$(function() {
				$('#Liobu').addClass('active');
				$.ajaxSetup({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') }
				});

				$('input[type="radio"].flat-red').iCheck({
					checkboxClass: 'icheckbox_flat-green',
					radioClass: 'iradio_flat-green'
				});

				$('input[name="obu_type"]').on('ifChecked', function(){
					if ( $(this).is(':checked') ) { drawPerLoc(); }
				});

				drawTotalChart();
				drawPerLoc();
				drawChartPercent();
			});

			var titleText = ''; var seriesText = ''; var pointFormatStr = '';

			function drawTotalChart(){
				var val = { _token: $('meta[name="csrf_token"]').attr('content') }
				httpSend('getObuTotal', val).done(r => {
					Highcharts.chart('chartTotalObu', {
						chart: { type: 'column' },
						title: { text: '' },
						xAxis: {
							categories: ['Belum Registrasi', 'Registrasi'],
							title: { text: null }
						},
						yAxis: {
							min: 0,
							title: { text: 'Total' },
							labels: { overflow: 'justify' }
							// title: { text: "Total" }
						},
						legend: { enabled: false },
						tooltip: {
							headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
							pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
						},
						plotOptions: {
							series: {
								borderWidth: 0, dataLabels: { enabled: false, format: '<span style="font-size:8px">{point.y}</span><br>' }
							},
						},
						series: [r.seriesData]
					});
				});
			}

			function drawPerLoc(){
				var type = $("input[name='obu_type']:checked").val();
				var val = {
					_token: $('meta[name="csrf_token"]').attr('content'),
					type: type
				};

				if(type == 'type_l'){
					titleText = 'Total Per-Lokasi';
					seriesText = '<span style="font-size:8px">{point.y}</span><br>';
					pointFormatStr = '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>';
				}else {
					titleText = 'Saldo Per-Lokasi';
					seriesText = '<span style="font-size:8px">Rp. {point.y}</span><br>';
					pointFormatStr = '<span style="color:{point.color}">{point.name}</span>: <b>Rp. {point.y}</b><br/>';
				}

				httpSend('getOBUData', val).done(r => {
					tempData = r.legend;
					for (var i=0; i < tempData.length; i++) {
						tempData[i].jmlh = formatStrRupiah(tempData[i].jmlh);
					}
					r.legend = tempData;
					drawKontrak(type, r);
				});
			}

			function drawKontrak(valtype, data) {
				$('#miniChartOBU').html('');

				var legend = data.legend;
				var strLegend =
					'<label>Total Tarif Per-Lokasi</label>'+
					'<ul class="chart-legend clearfix">';
				for (var i= 0; i < legend.length; i++) {
					strLegend +=
						'<li>'+
							'<i class="fa fa-caret-right"></i> '+ legend[i].name+' - '+legend[i].jmlh+
						'</li>';
				};
				strLegend += '</ul>';
				$('#miniChartOBU').html(strLegend);
				var seriesData = data.seriesData;
				var drilldownData = data.drilldownData;

				Highcharts.chart('ChartPerLoc', {
					chart: { type: 'column' },
					title: { text: '' },
					subtitle: { text: 'Click the columns to view details.' },
					xAxis: { type: 'category' },
					yAxis: {
						title: { text: titleText }
					},
					legend: { enabled: false },
					plotOptions: {
						series: { borderWidth: 0, dataLabels: { enabled: true, format: seriesText }
						}
					},
					tooltip: { headerFormat: '<span style="font-size:11px">{series.name}</span><br>', pointFormat: pointFormatStr },
					series: [seriesData],
					drilldown: {
						series: drilldownData
					}
				});
			}

			function drawChartPercent(){
				var val = { _token: $('meta[name="csrf_token"]').attr('content') };
				httpSend('getPercentData', val).done(r => {
					drawVs(r);
				});
			}

			function drawVs(data) {
				var seriesDataTotal = data.seriesDataTotal;
				var seriesDataSaldo = data.seriesDataSaldo;

				//Vs Total
				Highcharts.chart('ChartPercentTotal', {
					chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
					title: { text: 'Registration' },
					tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
					plotOptions: {
						pie: {
							allowPointSelect: true, cursor: 'pointer',
							dataLabels: {
								enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',
								style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
							}
						}
					},
					series: [seriesDataTotal]
				});

				//Vs Saldo
				Highcharts.chart('ChartPercentSaldo', {
					chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
					title: { text: 'Saldo' },
					tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
					plotOptions: {
						pie: {
							allowPointSelect: true, cursor: 'pointer',
							dataLabels: {
								enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',
								style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
							}
						}
					},
					series: [seriesDataSaldo]
				});
			}

			function formatStrRupiah(number) {
				var val = 0; var str = "";
				if(number >= 1000 && number < 1000000){
					val = number / 1000;
					str = "Rp. "+Highcharts.numberFormat(val,0,',','.')+" Ribu"; return str;
				}
				else if(number >= 1000000 && number < 1000000000){
					val = number / 1000000;
					str = "Rp. "+Highcharts.numberFormat(val,0,',','.')+" Juta"; return str;
				}else if(number >= 1000000000){
					val = number / 1000000000;
					str = "Rp. "+Highcharts.numberFormat(val,0,',','.')+" M"; return str;
				}
			}
		</script>
	@endpush
@elseif($dashboard == '2')
	@section('contentLevel')
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard active"></i> Dashboard OBU YellowFin</a></li>
		</ol>
	@endsection

	@section('content')
		<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=be859577-0ff6-463a-a24f-10e3af9df1f8"></script>
		<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=abd25c36-cba2-4ccf-8985-060d13a9b55b"></script>
	@endsection

	@push('scripts')
		<script>
			$(function(){
				$('#LiobuYf').addClass('active');
			});
		</script>
	@endpush
@elseif($dashboard == '3')
	@section('contentLevel')
		<ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard active"></i> Dashboard PLN</a></li>
		</ol>
	@endsection

	@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-bar-chart"></i> Jumlah Kontrak Periode 2017</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
										<input type="radio" name="kontrak_type" class="flat-red kontrak_radio" value="kontrak_type_p" checked> PRK&nbsp;&nbsp;
										<input type="radio" name="kontrak_type" class="flat-red kontrak_radio" value="kontrak_type_r"> Rupiah
									</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" id="bulan_kontrak" name="bulan_kontrak">
										<option value="" selected>- Semua Bulan -</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-9">
								<div id="ChartKontrak"></div>
							</div>
							<div class="col-lg-3">
								<div id="miniChartKontrak"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><br/>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-pie-chart"></i> Anggaran Vs Paket (HPaket) Periode 2017</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="col-md-2">
									<div class="form-group">
										<select class="form-control" id="unit" name="unit">
											<option value="JTBN">JTBN</option>
											
										</select>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<select class="form-control" id="bulan_VS" name="bulan_VS">
											<option value="" selected>- Semua Bulan -</option>
											<option value="January">January</option>
											<option value="February">February</option>
											<option value="March">March</option>
											<option value="April">April</option>
											<option value="May">May</option>
											<option value="June">June</option>
											<option value="July">July</option>
											<option value="August">August</option>
											<option value="September">September</option>
											<option value="October">October</option>
											<option value="November">November</option>
											<option value="December">December</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div id="ChartVsPRK"></div>
							</div>

							<div class="col-lg-6">
								<div id="ChartVsAnggaran"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection

	@push('scripts')
		<script>
			$(function() {
				$('#Lipln').addClass('active');
				$.ajaxSetup({
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') }
				});

				// google.charts.load('upcoming', {'packages':['corechart', 'map']});

				$('input[type="radio"].flat-red').iCheck({
					checkboxClass: 'icheckbox_flat-green',
					radioClass: 'iradio_flat-green'
				});

				$('input[name="kontrak_type"]').on('ifChecked', function(){
					if ( $(this).is(':checked') ) { drawKontrakChart(); }
				});

				$('#bulan_kontrak').change(function() { drawKontrakChart(); });

				$('#unit').change(function(){ drawChartVs(); });

				$('#bulan_VS').change(function() { drawChartVs(); });

				drawKontrakChart();
				drawChartVs();
			});

			var titleText = "";
			var seriesText = "";
			var pointFormatStr = "";
			var titleStr = "";

			function drawKontrakChart(){
				var type = $("input[name='kontrak_type']:checked").val();
				var bulan = $('#bulan_kontrak').val();

				if(type == 'kontrak_type_p'){
					titleText = 'Total Kontrak';
					seriesText = '<span style="font-size:8px">{point.y}</span><br>';
					pointFormatStr = '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>';
				}else {
					titleText = 'Total Rupiah';
					seriesText = '<span style="font-size:8px">Rp. {point.y}</span><br>';
					pointFormatStr = '<span style="color:{point.color}">{point.name}</span>: <b>Rp. {point.y} M</b><br/>';
				}

				if(bulan == '') {
					if(type == 'kontrak_type_p') titleStr = 'Data from January to October, 2017';
					else titleStr = 'Data from January to October, 2017';

					var val = {
						type: type
					};

					httpSend('getKontrakData', val).done(r => {
						if(type == 'kontrak_type_p'){
							tempData = r.legend;
							for (var i=0; i < tempData.length; i++) {
								tempData[i].jmlh = formatStrRupiah(tempData[i].jmlh);
							}
							r.legend = tempData;
						}else {
							var tempDataSeries = r.seriesData.data;
							var tempDataDrilldown = r.drilldownData;
							for (var i= 0; i < tempDataSeries.length; i++) {
								tempDataSeries[i].y = formatBillion(tempDataSeries[i].y);

							};
							r.seriesData.data = tempDataSeries;
							for (var i= 0; i < tempDataSeries.length; i++) {
								for (var j= 0; j < tempDataDrilldown[i].data.length; j++) {
									tempDataDrilldown[i].data[j][1] = formatBillion(tempDataDrilldown[i].data[j][1]);
								}
							};
							r.drilldownData = tempDataDrilldown;
						}
						drawKontrak(r);
					});
				}else {
					if(type == 'kontrak_type_p') titleStr = 'Data '+bulan+', 2017';
					else titleStr = 'Data '+bulan+', 2017';

					var val = {
						_token: $('meta[name="csrf-token"]').attr('content'),
						type: type,
						bulan: bulan
					};
					httpSend('getKontrakBulanData', val).done(r => {
						if(type == 'kontrak_type_p'){
							tempData = r.legend;
							for (var i=0; i < tempData.length; i++) {
								tempData[i].jmlh = formatStrRupiah(tempData[i].jmlh);
							}
							r.legend = tempData;
						}else {
							var tempDataSeries = r.seriesData.data;
							var tempDataDrilldown = r.drilldownData;
							for (var i= 0; i < tempDataSeries.length; i++) {
								tempDataSeries[i].y = formatBillion(tempDataSeries[i].y);

							};
							r.seriesData.data = tempDataSeries;
							for (var i= 0; i < tempDataSeries.length; i++) {
								for (var j= 0; j < tempDataDrilldown[i].data.length; j++) {
									tempDataDrilldown[i].data[j][1] = formatBillion(tempDataDrilldown[i].data[j][1]);
								}
							};
							r.drilldownData = tempDataDrilldown;
						}
						drawKontrak(r);
					});
				}
			}

			function drawKontrak(data) {
				$('#miniChartKontrak').html('');

				var legend = data.legend;
				var strLegend = '<ul class="chart-legend clearfix">';
				for (var i= 0; i < legend.length; i++) {
					strLegend +=
						'<li>'+
							'<i class="fa fa-caret-right"></i> '+
							legend[i].name+' - '+legend[i].jmlh+
						'</li>';
				};
				strLegend += '</ul>';
				$('#miniChartKontrak').html(strLegend);
				var seriesData = data.seriesData;
				var drilldownData = data.drilldownData;

				Highcharts.chart('ChartKontrak', {
					chart: { type: 'column' },
					title: { text: titleStr },
					subtitle: { text: 'Click the columns to view details.' },
					xAxis: { type: 'category' },
					yAxis: {
						title: { text: titleText }
					},
					legend: { enabled: true },
					plotOptions: {
						series: { borderWidth: 0, dataLabels: {
								enabled: true,
								format: seriesText
							}
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
						pointFormat: pointFormatStr
					},
					series: [seriesData],
					drilldown: {
						series: drilldownData
					}
				});
			}

			function drawChartVs(){
				var unit = $('#unit').val();
				var bulan = $('#bulan_VS').val();

				if(bulan == '') {
					var val = {
						_token: $('meta[name="csrf-token"]').attr('content'),
						unit: unit,
						bulan: bulan
					};
					httpSend('getVsData', val).done(r => {
						drawVs(r);
					});
				}else {
					var val = {
						_token: $('meta[name="csrf-token"]').attr('content'),
						unit: unit,
						bulan: bulan
					};
					httpSend('getVsDataBulan', val).done(r => {
						drawVs(r);
					});
				};
			}

			function drawVs(data) {
				var seriesDataPRK = data.seriesDataPRK;
				var drilldownDataPRK = data.drilldownDataPRK;

				var seriesDataAnggaran = data.seriesDataAnggaran;
				var drilldownDataAnggaran = data.drilldownDataAnggaran;

				//Vs PRK
				Highcharts.chart('ChartVsPRK', {
					chart: { type: 'pie' },
					title: { text: 'PRK' },
					subtitle: { text: 'Click the slices to view details' },
					plotOptions: {
						series: {
							dataLabels: { enabled: true, format: '{point.name}: {point.y:.1f}%' }
						}
					},

					tooltip: {
						headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
						pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
					},
					series: [ seriesDataPRK ],
					drilldown: {
						series: drilldownDataPRK
					}
				});

				//Vs Anggaran
				Highcharts.chart('ChartVsAnggaran', {
					chart: { type: 'pie' },
					title: { text: 'Anggaran' },
					subtitle: { text: 'Click the slices to view details' },
					plotOptions: {
						series: {
							dataLabels: { enabled: true, format: '{point.name}: {point.y:.1f}%' }
						}
					},

					tooltip: {
						headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
						pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
					},
					series: [ seriesDataAnggaran ],
					drilldown: {
						series: drilldownDataAnggaran
					}
				});
			}

			function formatStrRupiah(number) {
				var val = 0;
				var str = "";
				val = number / 1000000000;
				str = "Rp. "+Highcharts.numberFormat(val,0,',','.')+" M";
				return str;
			}

			function formatBillion(number){
				var val = 0;
				val = number / 1000000000;
				val = Math.round(val);
				return val;
			}

			function formatValue(tipe, number) {
				var valuefmt = "";
				switch(tipe) {
					case 'prk':
						valuefmt = Highcharts.numberFormat(number,0,',','.')  + ' PRK';
					break;
					case 'aki':
					case 'ai':
						valuefmt = 'Rp. ' + Highcharts.numberFormat(number,2,',','.');
					break;
					case 'spm':
						if(window.spm_type != 'spm_type_r')
							valuefmt = Highcharts.numberFormat(number,0,',','.')  + ' PRK';
						else
							valuefmt = 'Rp. ' + Highcharts.numberFormat(number,2,',','.');
					break;
					case 'metode':
						if(window.metode_type != 'metode_type_r')
							valuefmt = Highcharts.numberFormat(number,0,',','.')  + ' PRK';
						else
							valuefmt = 'Rp. ' + Highcharts.numberFormat(number,2,',','.');
					break;
					case 'program':
						if(window.program_type != 'program_type_r')
							valuefmt = Highcharts.numberFormat(number,0,',','.')  + ' PRK';
						else
							valuefmt = 'Rp. ' + Highcharts.numberFormat(number,2,',','.');
					break;
					case 'strategi':
						if(window.strategi_type != 'strategi_type_r')
							valuefmt = Highcharts.numberFormat(number,0,',','.')  + ' PRK';
						else
							valuefmt = 'Rp. ' + Highcharts.numberFormat(number,2,',','.');
					break;
					default:
						valuefmt = Highcharts.numberFormat(number,0,',','.');
					break;
				}
				return valuefmt;
			}
		</script>
	@endpush
@endif