@extends('layouts.master')
@section('content')

<style>
	#DataTables_Table_0_info{
		display: none;
	}
</style>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
	<ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
		<li role="presentation" class="active">
			<a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Days Employee</a>
		</li>
		<li role="presentation" class="">
			<a href="#tab_content2" id="mandays-tab" role="tab" data-toggle="tab" aria-expanded="true">View Mandays</a>
		</li>
		<li role="presentation" class="">
			<a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Input</a>
		</li>
	</ul>

	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			<br>
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List Employee Project</h2>
						<ul class="nav navbar-right panel_toolbox"></ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						{{-- <table class="table table-striped table-bordered dataa"> --}}
							{{-- <table class="table table-bordered table-responsive table-hover dataa"> --}}
								<table id="mandaysTable" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="table-head" >NO</th>
											<th class="table-head" >NAMA</th>
											<!-- <th class="table-head" >JABATAN</th> -->
											<th class="table-head" >PROJECT</th>
											<th class="table-head" >POSISI DALAM PROJECT</th>
											<th class="table-head" ><center>START WORK</center></th>
											<th class="table-head" ><center>END WORK</center></th>
											<th class="table-head" ><center>WORK DURATION</center></th>
											<th class="table-head" ><center>MASA PROJECT</center></th>
											<!-- <th class="table-head" ><center>START PROJECT</center></th>
											<th class="table-head" ><center>FINISH PROJECT</center></th>
											<th class="table-head" ><center>DAYS PROJECT</center></th> -->
											<th class="table-head" ><center>ACTION</center></th>
											<th class="table-head" ><center>STATUS</center></th>
											<th class="table-head" ><center>HISTORY</center></th>
										</tr>
									</thead>
								</table>
						<!-- <table class="table table-striped table-bordered dataa">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>JABATAN</th>
									<th>PROJECT</th>
									<th>POSISI DALAM PROJECT</th>
									<th><center>START WORK</center></th>
									<th><center>END WORK</center></th>
									<th><center>WORK DURATION</center></th>
									<th><center>START PROJECT</center></th>
									<th><center>FINISH PROJECT</center></th>
									<th><center>DAYS PROJECT</center></th>
									<th><center>ACTION</center></th>
									<th><center>STATUS</center></th>
									<th><center>HISTORY</center></th>
								</tr>
							</thead>
							<tbody>
							<input type="hidden" id="countlist" value={{ $countlist }}>
								@php
									$no = 1;
									//$flag = 0;
									$str = "";
									$no1 = 1;
								@endphp

								@foreach ($data as $value)
								@php
									$start_date = strtotime($value->PROJECT_START);
									$end_date = strtotime($value->PROJECT_END);
									$start_work = strtotime($value->START_WORK);
									$end_work = strtotime($value->END_WORK);
								@endphp

									{{-- @if($flag==0) 
										@php
											$str=$value->EMPLOYEE_ID;
											$flag++;
										@endphp
									@else
										@if($str!=$value->EMPLOYEE_ID)
											@php
												$str=$value->EMPLOYEE_ID;
												$flag=1;
											@endphp
										@endif
									@endif --}}
									
									<tr>
										{{-- <td>@if($flag==1) {{ $no ++ }} @endif</td>					
										<td>@if($flag==1) {{ $value->EMPLOYEE_NAME }}  @endif</td>
										<td>@if($flag==1) {{ $value->EMPLOYEE_TITLE }}  @endif</td> --}}
										<td>{{ $no ++ }}.</td>
										<td>{{ $value->EMPLOYEE_NAME }} </td>
										<td>{{ $value->EMPLOYEE_TITLE }} </td>		
										<td>{{ $value->PROJECT_NAME }}</td>
										<td>{{ $value->PROJECT_ROLE_EMP }}</td>
										<td><center>{{ date('d-m-Y',$start_work)}}</center></td>
										<td><center>{{ date('d-m-Y',$end_work)}}</center></td>
										<td><center>{{ $value->WORK_DURATION }}</center></td>
										<input class="project_list<?php echo $no1++ ?>" type="hidden" value={{ $value->PROJECT_ID }}>
										<td><center>{{ date('d-m-Y',$start_date)}}</center></td>
										<td><center>{{ date('d-m-Y',$end_date)}}</center></td>
										<td><center>{{ $value->PROJECT_DURATION }}</center></td>
										<td>
											@php
											if($value->timeline_status == 'NOT_STARTED' || $value->timeline_status == 'PAUSED') {
											@endphp
											<button class="btn-success btn-start btn-timeline" action="0" project-id="{{ $value->PROJECT_ID }}"><i class="fa fa-play" aria-hidden="true"></i></button>
											@php
											} elseif($value->timeline_status == 'RUNNING') {
											@endphp
											<button class="btn-warning btn-pause btn-timeline" action="1" project-id="{{ $value->PROJECT_ID }}"><i class="fa fa-pause" aria-hidden="true"></i></button>
											<button class="btn-danger btn-stop btn-timeline" action="2" project-id="{{ $value->PROJECT_ID }}"><i class="fa fa-stop" aria-hidden="true"></i></button>
											@php
											} elseif($value->timeline_status == 'STOPPED') { echo 'Done';}
											@endphp
										</td>
										<td><center>{{ $value->timeline_status }}</center></td>
										<td>
											<button type="button" class="btn btn-default btn-sm btn-history-modal" projectID = "{{ $value->PROJECT_ID }}" lastStatus = "{{ $value->timeline_status }}">
												<span class="glyphicon glyphicon-list-alt"></span> Show
											</button>
										</td>
									</tr>
									@php
										//$flag++;
									@endphp
								@endforeach
							</tbody>
						</table> -->
					</div>
				</div>
			</div>
		</div>

		<!-- hostoryModal -->
		<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="historyModalLabel">Timeline History</h4>
					</div>
					<div class="modal-body" style="height: 250px; overflow-y: auto;">...</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">    	
						<h2>View Mandays</h2>		
						<ul class="nav navbar-right panel_toolbox">   
						</ul>
						<div class="clearfix"></div><br>
						<div class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Name</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_nama" class="form-control">
										<option value="">Select Employee Name</option>
										@foreach ($employeeName as $list)
										<option value="{{ $list->EMPLOYEE_ID}}">{{ $list->EMPLOYEE_NAME}}</option>
										@endforeach
									</select>
								</div>
							</div>    

							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
									<button class="btn btn-success pull-right btn-search-mandays">Search</button>
								</div>
							</div> 
						</div>
					</div>
					<div class="x-content">
						<table class="mandaysTable_view table table-bordered table-responsive table-hover">
							<thead>
								<tr>
									<th class="table-head" >NO</th>
									<th class="table-head" >NAMA</th>
									<th class="table-head" >JABATAN</th>
									<th class="table-head" >PROJECT</th>
									<th class="table-head" >POSISI DALAM PROJECT</th>
									<th class="table-head" ><center>START WORK</center></th>
									<th class="table-head" ><center>END WORK</center></th>
									<th class="table-head" ><center>WORK DURATION</center></th>								
								</tr>
							</thead>
							<tbody class="result-mandays">
								{{-- result mandays --}}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
			<br>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">    	
						<h2>Input Pegawai</h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="x-content">
						<div class="form-horizontal form-label-left">		
							<fieldset>		
								<div class="form-group">
									<label class="col-lg-2 control-label">Employee Name</label>
									<div class="col-lg-10">
										<select id="nama-pegawai" class="form-control col-md-7 col-xs-12">
											<option value="">Select Employee Name</option>
											@foreach ($employeeName as $ele)
											<option value="{{ $ele->EMPLOYEE_ID }}">{{ $ele->EMPLOYEE_NAME }}</option>
											@endforeach  
										</select>			            
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">JABATAN</label>         
									<div class="col-lg-10">
										<input type="text" readonly="true" class="form-control col-md-7 col-xs-12" id="jabatan-pegawai">             
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">PROJECT</label>
									<div class="col-lg-10">
										<select id="nama-project" class="form-control">	
											<option value="">Select PROJECT Name</option>
											@foreach ($projectname as $ele)
											<option value="{{ $ele->PROJECT_DETAIL_ID }}">{{ $ele->PROJECT_NAME }}</option>
											@endforeach
										</select>            
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">START PROJECT</label>         
									<div class="col-lg-10">
										<input type="text" class="form-control" id="startprojek" readonly="true">         
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">FINISH PROJECT</label>         
									<div class="col-lg-10">
										<input type="text" class="form-control" id="finishprojek" readonly="true">            
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">DAYS PROJECT</label>         
									<div class="col-lg-2">
										<input type="text" class="form-control" id="daysprojek" readonly="true">
									</div>					         
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">POSITION IN PROJECT</label>         
									<div class="col-lg-10">
										<select id="role-projek" class="form-control">
											<option value="">Select Job Position</option>
											@foreach ($listprojectRole as $list)
											<option value="{{ $list->LIST_PROJECT_ROLE_ID}}">{{ $list->PROJECT_ROLE_EMP }}</option>
											@endforeach
										</select>            
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-2 control-label">START WORK</label>         
									<div class="col-lg-10">
										<input type="text" class="form-control" id="startwork">         
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">END WORK</label>         
									<div class="col-lg-10">
										<input type="text" class="form-control" id="endwork">         
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 control-label">WORK DURATION</label>         
									<div class="col-lg-2">
										<input type="text" readonly="true" class="form-control" id="calldays">
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2">
										<button id="btn-input-daysProjek" class="btn btn-primary btn-success">Save</button>
										<button id="btn-reset" class="btn btn-warning">Reset</button>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var table;
	$(document).ready(function(){
		// CSRF Setup
		$.ajaxSetup({
			headers : {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		//------------------------------------------------------//

		// radio button update Days Project
		$(function(){
			$("#radio1, #radio2").change(function(){            
				if($("#radio1").is(":checked")){
					$("#calldays").attr("readonly",true);              
				}
				else if($("#radio2").is(":checked")){
					$("#calldays").removeAttr("readonly");
					$("#calldays").focus();   
				}
			});
		});

		table = $('#mandaysTable').DataTable({
			ajax:{
				url: baseUrl +'/days_project/getMandays',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}"
				},
				dataType: 'JSON',
				dataSrc: function (data) {
					return data.data;
				}
			},
			columns:[
			{data: 'rownum'},
			{data: 'avatar'},
			//{data: 'EMPLOYEE_TITLE'},
			{data: 'PROJECT_NAME'},
			{data: 'PROJECT_ROLE_EMP'},
			{data: 'START_WORK'},
			{data: 'END_WORK'},
			{data: 'WORK_DURATION'},
			{data: 'PROJECT_DETAIL_TIMELINE'},
			//{data: 'PROJECT_START'},
			//{data: 'PROJECT_END'},
			//{data: 'PROJECT_DURATION'},
			{data: 'action'},
			{data: 'timeline_status'},
			{data: 'history'}
			]
		});

		$('.dataa').DataTable({
			"scrollX": true
		});

		$('#btn-reset').click(function(){
			$('#nama-pegawai').val("");
			$('#jabatan-pegawai').val("");
			$('#nama-project').val("");
			$('#startprojek').val("");
			$('#finishprojek').val("");
			$('#daysprojek').val("");
			$('#role-projek').val("");
			$('#startwork').val("");
			$('#endwork').val("");
			$('#calldays').val("");

		});
		//------------------------------------------------------//

		//-------timeline button----------------
		/*$('.btn-timeline').click(function(){
			var data = {
			  'projectID':$(this).attr("project-id"),
			  'actionStatus':$(this).attr("action")
			};

			$.ajax({
			  url : baseUrl +'/days_project/action',
			  type: 'POST',
			  data: data,			  
			  dataType: 'json',
			  success:function(r){ 	   
				location.reload();
			  }

			});
		});

		$('.btn-history-modal').click(function(){
			$('#historyModal').modal('toggle'); $('#historyModal').modal('show');
			$('#historyModal').find(".modal-body").load(baseUrl +'/history/' + $(this).attr("projectID") + '/' + $(this).attr("lastStatus"));
			$("#historyModal").on('hidden.bs.modal', function () {
				$(this).data('bs.modal', null);
			});
		});

		$("#historyModal").on('hidden.bs.modal', function () {
			$(this).data('bs.modal', null);
		});*/
		//----------------end timeline-------------------------------------------------

		var countlist = $('#countlist').val();	
		var project1="";
		function showAlert(pid){
			alert(pid);

			return 0;
		}

		for(var i = 1 ; i <= countlist ; i++){
			project1 = $('.project_list'+i).val();
			$('.btn-start'+i).attr("value",project1);
			$('.btn-start'+i).click(function(){
				var x = [];
				var time = "";
				var projectID  = $(this).attr("value");
				var monthName = new Array(12);				
				monthName[0] =  "January";
				monthName[1] = "February";
				monthName[2] = "March";
				monthName[3] = "April";
				monthName[4] = "May";
				monthName[5] = "June";
				monthName[6] = "July";
				monthName[7] = "August";
				monthName[8] = "September";
				monthName[9] = "Oktober";
				monthName[10] = "November";
				monthName[11] = "Desember";

				var today = new Date();
				var year = today.getFullYear();
				var month = today.getMonth()+1;
				var date = today.getDate();
				
				time = year + "-" + month + "-" + date;

				x.push({
					projectID: projectID,
					time:time
				});
				
				var data = {
					'projectID':projectID,
					'time':time		      
				};

				$.ajax({
					url : baseUrl +'/days_project/btnstart',
					type: 'POST',
					data: data,			  
					dataType: 'json',
					success:function(r){
						alert("Mulai Project");
						//$('.btn-start'+i).hide();
					}
				});
			});
		}
		//------------------------------------------------------//

		function count_total(angka){
			var nilai_awal = 0;
			var nilai_sementara = nilai_awal + angka;
			var nilai_awal = nilai_sementara;
			//alert(angka);
			//alert(nilai_sementara);
			return nilai_sementara;
		}

		$(this).on('click', '.btn-search-mandays',function(e){
			var nama = $('#f_nama').val();
			
			if( nama == ""){
				$("#error1").html("Employee Name must be filled!");
				$('#myModal1').modal("show");
			}else{
				
				$.ajax({
					url : baseUrl +'/mandays/search',
					type: 'POST',
					data: {'nama': nama},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success:function(r){
						var t = '';
						var no = 1;
						var na = 0;
						var tn;
						$('.result-mandays tr').remove();
						$.each(r.content, function(k, v){
							t += '<tr>';
							t += '<td style="text-align:center">'+no+'</td>';
							t += '<td>' + v.avatar + '</td>';
							t += '<td>' + v.EMPLOYEE_TITLE + '</td>';
							t += '<td>' + v.PROJECT_NAME + '</td>';
							t += '<td>' + v.PROJECT_ROLE_EMP + '</td>';
							t += '<td style="text-align:center">' + v.START_WORK + '</td>';
							t += '<td style="text-align:center">' + v.END_WORK + '</td>';
							t += '<td style="text-align:center">' + v.WORK_DURATION + '</td>';
							//t += '<td>' + count_total(v.WORK_DURATION)+ '</td>';
							t += '</tr>';
							tn = na + v.WORK_DURATION;
							na = tn;
							no++;
						});
						t += '<tr>';
						t += '<td colspan="2" style="text-align:center">TOTAL</td>';
						t += '<td colspan="5"></td>';
						t += '<td style="text-align:center">'+tn+'</td>';
						t += '</tr>';                
						
						$('.result-mandays').append(t);
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
					
				});
			}
		});	//------------------------------------------------------//

		$('#btn-input-daysProjek').click(function(){
			var idemployee = $('#nama-pegawai').val();
			var idprojek= $('#nama-project').val();
			var idprojekRole = $('#role-projek').val();
			var startwork = $('#startwork').val();
			var endwork = $('#endwork').val();
			var workduration = $('#calldays').val();


			if( idemployee == "" || idprojek == "" || idprojekRole == "" || startwork == ""){
				alert("Isi semua");
			}else{

				$.ajax({
					url : baseUrl +'/days_project/input',
					type: 'POST',
					data: {'idemployee': idemployee, 'idprojek' : idprojek, 'idprojekRole' : idprojekRole, 'startwork' : startwork, 'endwork' : endwork,'workduration' : workduration},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success:function(r){

						if(r.msg == 'Success Insert'){	                  
							$("#error2").html(r.msg);
							$('#myModal2').modal("show");
						  setTimeout(function(){// wait for 5 secs(2)
							location.reload(); // then reload the page.(3)
						}, 1000); 
						}
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});
			}
		});
		//------------------------------------------------------//

		//Get Jabatan Pegawai Automatically
		$("#nama-pegawai").change(function(){

			$value = $("#nama-pegawai").val();

			if($value == ""){

				$('#jabatan-pegawai').val("");

			}else{

				$.ajax({
					type    : 'get',
					url     : '{{URL::to('getjbtn')}}',
					data    : {'getjbtn': $value },
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success : function(hasil){

						var str = hasil; 
						var res = str.replace("[", "");
						var x = res.replace("]","");

						if(x == ""){

							var warn = "Employee"+" "+$value+" "+"is not found";
							alert(warn);
							$('#jabatan-pegawai').val("");

						}else{

							var obj = JSON.parse(x);              
							$('#jabatan-pegawai').val(obj.EMPLOYEE_TITLE);

						}
					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});
			}
		});

		//Get Info Projek
		$("#nama-project").change(function(){

			$value = $("#nama-project").val();

			if($value == ""){

				$('#startprojek').val("");
				$('#finishprojek').val("");
				$('#daysprojek').val("");

			}else{

				$.ajax({
					type    : 'get',
					url     : '{{URL::to('getInfoProjek')}}',
					data    : {'getInfoProjek': $value },
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success : function(hasil){

						var str = hasil; 
						var res = str.replace("[", "");
						var x = res.replace("]","");
						var obj = JSON.parse(x);

						$('#startprojek').val(obj.PROJECT_START);
						$('#finishprojek').val(obj.PROJECT_END);
						$('#daysprojek').val(obj.PROJECT_DURATION);

					},
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
				});
			}
		});
		//----------------------------------------------------------------------//

		//Date Picker
		//var holidays = ["2017-08-17","2017-09-01","2017-09-21","2017-12-01","2017-12-25","2017-12-26"];
		var holidays = "";

		$.ajax({ 
			type: "GET",   
			url: '{{ URL::to('getHoliday') }}',         
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data)
			{
				var holiday = [];            
				for (var i = 0; i < data.length; i++)
				{
					var obj = data[i];
					holiday[i] = obj.day;          
				}

				holidays = holiday;
				
				$("#startwork").datepicker({

					//disable Weekend dan Holidays      
					beforeShowDay: function(date){

						var day = date.getDay();
						if(day == 0 || day == 6){

							return [false];

						}else if(holidays != ""){

							var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
							var x = holidays.indexOf(datestring) == -1 ;
							return [x];

						}else{
							return [true];
						}       
					},
					dateFormat : 'yy-mm-dd'
				}); 

				$("#endwork").datepicker({

					//disable Weekend dan Holidays      
					beforeShowDay: function(date){

						var day = date.getDay();
						if(day == 0 || day == 6){

							return [false];

						}else if(holidays != ""){

							var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
							return [ holidays.indexOf(datestring) == -1];

						}else{
							return [true];
						}       
					},		        
					dateFormat : 'yy-mm-dd',

					onSelect: function () {
						calculateDays();
					}
				});
				function calculateDays(){
					var start = $("#startwork").val();
					var end   = $("#endwork").val();

					if(start < end){
						
						var numOfDays = workingDaysBetweenDates(start, end)
						$("#calldays").val(numOfDays);

					}else if(start == end){
						
						$("#calldays").val("1");

					}else{
						
						alert("wrong!");
					}         
				}

				function workingDaysBetweenDates(d0, d1) {
					//var holidays = ['2017-08-17','2017-09-01','2017-09-21','2017-12-01','2017-12-25','2017-12-26'];
					var startDate = parseDate(d0)
					var endDate = parseDate(d1);  
					// Validate input
					if (endDate < startDate) {
						return 0;
					}
					// Calculate days between dates
					var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
					startDate.setHours(0,0,0,1);  // Start just after midnight
					endDate.setHours(23,59,59,999);  // End just before midnight
					var diff = endDate - startDate;  // Milliseconds between datetime objects    
					var days = Math.ceil(diff / millisecondsPerDay);
					
					// Subtract two weekend days for every week in between
					var weeks = Math.floor(days / 7);
					days -= weeks * 2;

					// Handle special cases
					var startDay = startDate.getDay();
					var endDay = endDate.getDay();
					
					// Remove weekend not previously removed.   
					if (startDay - endDay > 1) {
						days -= 2;
					}
					// Remove start day if span starts on Sunday but ends before Saturday
					if (startDay == 0 && endDay != 6) {
						days--;  
					}
					// Remove end day if span ends on Saturday but starts after Sunday
					if (endDay == 6 && startDay != 0) {
						days--;
					}
					/* Here is the code */
					for (var i in holidays) {
						if ((holidays[i] >= d0) && (holidays[i] <= d1)) {
							days--;
						}
					}
					return days;
				}

				function parseDate(input) {
				  // Transform date from text to date
				  var parts = input.match(/(\d+)/g);
				  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
				  return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
				}   
				//----------------------------------------------------------------------//      

			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
		});
	});

function actionClick(id, action, pId){
	var data = {
		'projectID': pId,
		'actionStatus': action
	};

	$.ajax({
		url : baseUrl +'/days_project/action',
		type: 'POST',
		data: data,			  
		dataType: 'json',
		success:function(r){ 	   
		//location.reload();
		table.ajax.reload( null, false );
	}
});
}

function historyClick(pId, status){
	$('#historyModal').modal('toggle'); $('#historyModal').modal('show');
	$('#historyModal').find(".modal-body").load(baseUrl +'/history/' + pId + '/' + status);
	$("#historyModal").on('hidden.bs.modal', function () {
		$(this).data('bs.modal', null);
	});
}
</script>

@endsection