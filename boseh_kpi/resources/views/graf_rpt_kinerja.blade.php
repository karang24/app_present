@extends('layouts.master')

@section('content')
@if (Auth::user()->dashboard == '1')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="dashboard_graph">
				<div class="row x_title">
					<div class="col-md-6">
						<h2>Dashboard</h2>
						<ul class="nav navbar-right panel_toolbox"></ul>
						<div class="clearfix"></div>
						
						<div class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Year</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_tahun" class="form-control">
										<option value="{{date('Y')}}" selected>Select Year</option>
										@foreach ($tahun as $listTahun)
											<option value="{{ $listTahun->TAHUN }}">{{ $listTahun->TAHUN }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div><br>

	
	<div class="row">
		<div class="col-md-12 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_auto">
				<div class="x_title">
					<h2>Dashboard Kinerja KPI</h2>
					<ul class="nav navbar-right panel_toolbox"></ul>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					<div class="w_center w_55">
						<div id="reportChart" name="reportChart"style="width: 185%; height: auto"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>		
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			
			function dashboard(){
				var p_tahun = $('#f_tahun').val();
				var op = "";
				
				$.ajaxSetup({
					headers : {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});


				$.ajax({
					url : baseUrl +'/searchGrap',
					type: 'POST',
					data: {'p_tahun': p_tahun},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success : function(data){
						var project_name = [];
						var project_duration = [];
						if(data == ""){
							Highcharts.chart('reportChart', {
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
							
							Highcharts.chart('reportChart', {
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
								project_name[i] = obj.EMPLOYEE_NAME;
								project_duration[i] = obj.FINAL_SCORE;
							}

							Highcharts.chart('reportChart', {
								title: { text: '' },
								yAxis: {
									enabled: true,
									title: { text: 'Mandays' }
								},
								xAxis: { categories: project_name },
								plotOptions: {
									column: {
										dataLabels: { enabled: true }
									}
								},
								series: [{
									name: 'Mandays',
									type: 'column',
									data: project_duration,
									color: '#337AB8',
								}]
							});
							
							// horizontal report Chart
							Highcharts.chart('reportChart', {
								 chart: {
									type: 'bar'
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
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
										text: '',
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
									y: 180,
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
						}
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});

			}
			dashboard();
			$('#f_tahun').change(function(){
				dashboard();
			});
	});
	</script>
@endif
@endsection