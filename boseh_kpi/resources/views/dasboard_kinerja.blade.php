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
		<div class="col-md-6 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320">
				<div class="x_title">
					<h2>Mandays</h2>
					<ul class="nav navbar-right panel_toolbox"></ul>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					<div class="w_center w_55">
						<div id="mandaysChart" name="mandaysChart" style="width: 500px; height: 300px;"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Employee</h2>
					<ul class="nav navbar-right panel_toolbox"></ul>
					<div class="clearfix"></div>

					<div class="form-horizontal form-label-left">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12">Project</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="f_nama_graf" class="form-control">
									<option value="">Select Project Name</option>
									<option value="" disabled="true" selected="true">Choose Year First</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="x_content">
					<div id="employeeChart" name="employeeChart" style="width: 500px; height: 200px;"></div>
				</div>
			</div>
		</div>
	</div>
	
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
						<div id="reportChart" name="reportChart" style="width: autopx; height: 300px;"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>		
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320">
				<div class="x_title">
					<h2>Employee Mandays Project</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
					<div class="w_center w_55">
						<div id="ChartEvo" name="ChartEvo" style="width: 185%; height: 200px;"></div>
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
					type :'get',
					url  :'{{URL::to('getProjectFromYear')}}',
					data : {'p_tahun':p_tahun},
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success:function(data){
						$('#f_nama_graf option').remove();
						if(data.length == ""){
							op+='<option value="" >Empty</option>';
						}else{
							op+='<option value="" >Choose Project</option>';
							for(var i = 0 ; i < data.length ; i++){
								op+='<option value="'+data[i].PROJECT_DETAIL_ID+'">'+data[i].PROJECT_NAME+'</option>';
							}
						}
						$('#f_nama_graf').append(op);
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
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
								project_name[i] = obj.employee_name;
								project_duration[i] = obj.final_score;
							}

							Highcharts.chart('mandaysChart', {
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
									text: 'Historic World Population by Region'
								},
								subtitle: {
									text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
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
						}
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});

				$.ajax({
					url : baseUrl +'/index/GrafEvo',
					type: 'POST',
					data: {'p_tahun': p_tahun},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success : function(data){
						var project_name = [];
						var project_duration = [];
						var days = [];
						var realize_time = [];

						if(data == ""){
							Highcharts.chart('ChartEvo', {
								chart: { type: 'line' },
								title: { text: 'Graph Relation Mandays Project with Employee' },
								yAxis: {
									title: { text: 'Days' }
								},
								legend: {
									layout: 'vertical',
									align: 'right',
									verticalAlign: 'middle'
								},
								xAxis: { categories: 0 },
								series: [
									{
										name: 'Mandays',
										data: 0
									},{
										name: 'Work Duration',
										data: 0
									},
									{
										name: 'Relize Time',
										data: 0
									}
								],
								responsive: {
									rules: [{
										condition: { maxWidth: 500 },
										chartOptions: {
											legend: {
												layout: 'horizontal',
												align: 'center',
												verticalAlign: 'bottom'
											}
										}
									}]
								}
							});//tutup chart
						}else{
							for (var i = 0; i < data.length; i++) {
								var obj = data[i];
								project_name[i] = obj.PROJECT_NAME;
								project_duration[i] = obj.PROJECT_DURATION;
								days[i] = parseInt(obj.WORK_DURATION);
								realize_time[i] = parseInt(obj.realize_time);
							}

							Highcharts.chart('ChartEvo', {
								chart: { type: 'line' },
								title: { text: 'Graph Relation Mandays Project with Employee' },
								yAxis: {
									title: { text: 'Days' }
								},
								legend: {
									layout: 'vertical',
									align: 'right',
									verticalAlign: 'middle'
								},
								xAxis: { categories: project_name },
								series: [{
									name: 'Mandays',
									data: project_duration
								},{
									name: 'Work Duration',
									data: days
								},{
									name: 'Relize Time',
									data: realize_time
								}],
								responsive: {
									rules: [{
										condition: { maxWidth: 500 },
										chartOptions: {
											legend: {
												layout: 'horizontal',
												align: 'center',
												verticalAlign: 'bottom'
											}
										}
									}]
								}
							});//tutup chart
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

			$('#f_nama_graf').change(function(){
				var nama = $('#f_nama_graf').val();
				$.ajax({
					url : baseUrl +'/index/GrafEmp',
					type: 'POST',
					data: {'nama': nama},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success : function(data){
						var employee_name = [];
						var workduration = [];
						var projectduration = [];
						if(data == ""){
							$("#error1").html("Project Worker is Not Available!");
							$('#myModal1').modal("show");
							Highcharts.chart('employeeChart', {
								chart: { type: 'column' },
								title: { text: '' },
								yAxis: {
									enabled: true,
									title: { text: 'Days' }
								},
								xAxis: { categories: 0 },
								plotOptions: {  
									column: {
										dataLabels: { 
											enabled: true
										}
									}
								},
								series: [{
									name: 'Mandays',
									data: 0,
								},{
									name: 'Days',
									data: 0,
								}]
							});
						}else{
							for (var i = 0; i < data.length; i++){
								var obj = data[i];
								employee_name[i] = obj.EMPLOYEE_NAME;
								workduration[i] = parseInt(obj.WORK_DURATION);
								projectduration[i] = obj.PROJECT_DURATION;
							}

							Highcharts.chart('employeeChart', {
								chart: { type: 'column' },
								title: { text: '' },
								yAxis: {
									enabled: true,
									title: {
										text: 'Days'
									}
								},
								xAxis: {
									categories: employee_name
								},
								plotOptions: {
									column: {
										dataLabels: {
											enabled: true
										}
									}
								},
								series: [{ 
									name: 'Mandays',
									data: projectduration,
								},{
									name: 'Days',
									data: workduration,
								}]
							});
						}
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});
			});
		});
	</script>
@elseif (Auth::user()->dashboard == '2')
	<!--div class="row">
	<div class="row">
		<div id=\"yfReportContainerbdaa80fd-202e-4111-b04a-9d906d1f4ecd\"></div>
	</div>

	 <script type="text/javascript" src="http://localhost:8090/JsAPI?dashUUID=0537286a-a4a7-411d-9650-d6003810018c"></script> 
	<script type="text/javascript" src="http://192.168.88.58:8090/JsAPI?reportUUID=59f3bf13-4f3a-4517-8a83-bd950357621a&amp;yfFilterfec90b31-c705-4e98-b651-6f191d099041"></script>

	<script type="text/javascript" src="http://192.168.88.58:8090/JsAPI?reportUUID=1bfad5e3-5389-4bc2-9c94-d113179e9174&amp;yfFilterf815dfd4-1908-4641-b521-7374883b1026"></script>

	<script type="text/javascript" src="http://192.168.88.58:8090/JsAPI?reportUUID=a5ab3580-f915-4026-b747-77660e4368d8&amp;yfFilter072022f4-27d1-4479-969e-3bceabe7c944"></script-->
	@if  (Auth::user()->ROLE_ID == '4')

		<!--script type="text/javascript" src="http://localhost/JsAPI?reportUUID=a2baacb4-9012-4fac-97c4-3a1f2cb56683&amp;yfFilterf6832479-8eaf-49ae-83c2-09b170499583=Adiyansyah+Dwi+Putra"></script-->
		@foreach ($result as $listTahun)
			<div class="row">
				<div id=\"yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\"></div>
			</div>
			
			<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=5f52c4a8-0189-4d35-b1c0-691b73878741&amp;yfFilter3b417825-6aa2-4959-9224-c983f599cb29={{ str_replace(' ','+',$listTahun->EMPLOYEE_NAME) }}"></script>
			<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=ae39381e-95d3-4aa3-b18b-710646708d20&amp;yfFilter991ce3b0-02bb-4960-9aae-220296ab0748={{ str_replace(' ','+',$listTahun->EMPLOYEE_NAME) }}"></script>
			<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=a2baacb4-9012-4fac-97c4-3a1f2cb56683&amp;yfFilterf6832479-8eaf-49ae-83c2-09b170499583={{ str_replace(' ','+',$listTahun->EMPLOYEE_NAME) }}"></script>
			
			<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=921202d7-f490-4ac5-abb0-094a6f3996cc&amp;yfFilter3a292b07-de24-48cd-be95-844548a4c9ae={{ str_replace(' ','+',$listTahun->EMPLOYEE_NAME) }}"></script>
		@endforeach
	@else
		
			<div role="tabpanel" class="row tab-pane fade active in" id="tab_content1 yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\" aria-labelledby="home-tab" >
				</div>
						<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?dashUUID=9195c10b-60f0-40d6-80c1-0d57b0df3262"></script>

		
		<!--script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=26c7931b-812f-478c-b9df-27203b9cc376"></script>
		<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=963500f9-70c1-403b-bb61-337ade16e93d"></script>
		<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=a17406ec-c9ed-44a2-8f7e-b9e248fbe107"></script>
		<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=8652081c-f0d8-4241-8315-6550e849fd3c"></script-->
		
	@endif
@endif
@endsection