@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">
	<ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
		<li role="presentation" class="active">
			<a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Employee</a>
		</li>
		<li role="presentation" class="">
			<a href="#tab_content2" id="updateAPI-tab" role="tab" data-toggle="tab" aria-expanded="true">Absensi</a>
		</li>
		<!-- <li role="presentation" class="">
			<a href="#tab_content_edit_holiday" id="edit_holiday_id" role="tab" data-toggle="tab" aria-expanded="true">Edit Holiday</a>
		</li> -->
		<!-- <li role="presentation" class="">
			<a href="#tab_content_delete_holiday" id="edit_holiday_id" role="tab" data-toggle="tab" aria-expanded="true">Delete Holiday</a>
		</li> -->	  
	</ul>
	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			<br>
			<!-- start recent activity -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<h3>Integrasi Employee</h3>
					<div class="clearfix"></div>

					<div class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="unitname" class="form-control unitname">
									<option value="">Select Unit</option>
									@foreach ($showUnit as $listunit)
									<option value="{{ $listunit->API_ID }}">{{ $listunit->UNIT }}</option>
									@endforeach                    
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="emp_name" class="form-control emp_name" selected>
									<option value="">Select Employee</option>
									
								</select>
								<input type="hidden" class="form-control empname" id="empname" readonly>

							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Picture</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<img id="emp_pict" alt="emp_pict" class="emp_pict" src="" width="80" height="80">  
								<input type="hidden" class="form-control emppict" id="emppict" readonly>
								<input type="hidden" class="form-control kid" id="kid" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">NIK</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="number" class="form-control emp-no" id="emp-no" readonly>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">User Role</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="emp-role" class="form-control rolename">
									<option value="">Select User Role</option>
									@foreach ($showRole as $listrole)
									<option value="{{ $listrole->ROLE_ID }}">{{ $listrole->ROLE_NAME }}</option>
									@endforeach                    
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Email</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="email" class="form-control" id="emp-email">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Title</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-control" id="emp-title">
							</div>
						</div>  

						
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Year in</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="year" class="form-control year">
									<option value="">Pilih Tahun !</option>
								</select>
								<!--input type="text" class="form-control pull-right datepicker" id="datepicker"-->

							</div>
						</div>  

						<hr>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Username</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-control" id="emp-username">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Password</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" class="form-control" id="emp-password">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Confirm Password</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="password" class="form-control" id="emp-passconf">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
								<button id="btn-input-emp" class="btn btn-success pull-right">Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
			<br>
			<!-- start recent activity -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<h3>Update API Employee</h3>
					<div class="clearfix"></div>

					<div class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="year_api" class="form-control ddl_tahun">
									<option value="">Pilih Tahun !</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Bulan</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="month_api" class="form-control month_api" selected>
									<option value="">Pilih Bulan</option>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12"></label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<button id="btn-update-api-emp" class="btn btn-success pull-right">Update API</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		var monthNames = [
		"Januari", "Februari", "Maret",
		"April", "Mei", "Juni", "Juli",
		"Agustus", "September", "Oktober",
		"November", "Desember"
		];
		var min = new Date().getFullYear()-7;
		max = min + 7;
		select = document.getElementById('year');
		selectAPI = document.getElementById('year_api');
		selectMonth = document.getElementById('month_api');

		for (var i = min; i<=max; i++){
			var opt = document.createElement('option');
			opt.value = i;
			opt.innerHTML = i;
			selectAPI.appendChild(opt);
			select.appendChild(opt);
		}
		for (var i = min; i<=max; i++){
			var opt = document.createElement('option');
			opt.value = i;
			opt.innerHTML = i;
			select.appendChild(opt);
			selectAPI.appendChild(opt);
		}
		select.value = new Date().getFullYear();
		selectAPI.value= new Date().getFullYear();
		
		var tanggal = new Date();
		for (var i= 0; i<12;i++){
			var opt = document.createElement('option');
			if (i<10)
				opt.value = '0'+(i+1);
			else
				opt.value = i+1;
			opt.innerHTML = monthNames[i];
			selectMonth.appendChild(opt);
		}
		selectMonth.value= new Date().getMonth();
    // CSRF Setup

    $.ajaxSetup({
    	headers : {
    		
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
    });

    $('#unitname').change(function(){
    	var id_unit = $('.unitname').val();
    	var MM = ((tanggal.getMonth()+1) < 10 ? '0' : '') + (tanggal.getMonth() + 1);
    	var op = "";
    	var date_now = MM+tanggal.getFullYear();
    	var unit     = $('.unitname').val();  
    	$.ajax({
    		
    		url         : baseUrl+'/get/api',
    		type        : "GET",
    		dataType    : "json",
    		crossDomain: true,
    		contentType: "application/json",
    		data		:{'unit':unit, 'tanggal':date_now},
    		beforeSend	: function(request) {
    			request.setRequestHeader("content-type", 'application/json');
    			request.setRequestHeader("Access-Control-Allow-Origin", '*');
    		},
		    //data 		: JSON.stringify(datapost),
		    success     : function(response){
		    	$('#emp_name option').remove();
		    	if(response.absen[0].length == ""){
		    		op+='<option value="" >Empty</option>';
		    	}else{
		    		op+='<option value="" >Choose Employee</option>';
		    		for(let i = 0 ; i < response.absen.length ; i++){
		    			op+='<option value="'+response.absen[i].nik+'*'+response.absen[i].kid+'*'+response.absen[i].foto+'*'+response.absen[i].nama+'">'+response.absen[i].nama+'</option>';
		    		}
		    	}
		    	$('#emp_name').append(op);
		    },
		    error 		: function(xhr, textStatus, errorThrown){
		    	alert ("Load API Point Error!",errorThrown,"error");
		    }
		});
    });    
	$('#btn-update-api-emp').click(function(){
    	var id_unit = $('.unitname').val();
    	var MM = ((tanggal.getMonth()+1) < 10 ? '0' : '') + (tanggal.getMonth() + 1);
    	var op = "";
    	var date_now = MM+tanggal.getFullYear();
    	var unit     = $('.unitname').val();
		var month = $('#month_api').val();
		var year = $('#year_api').val(); 
		
    	$.ajax({
    		
    		url         : baseUrl+'/integrasi/update_data',
    		type        : "GET",
    		dataType    : "json",
    		crossDomain: true,
    		contentType: "application/json",
    		data		:{'month':month, 'year':year},
    		beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              success:function(r){
                $('#DeletePeninilaian').modal('hide');
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                  }, 1000);
				   $("#error2").html(r.msg);
                  $('#myModal2').modal("show");  
                  $('#myModal2').modal("hide");           
              },
		    error 		: function(xhr, textStatus, errorThrown){
		    	alert ("Sebagian Data Gagal Load!",errorThrown,"error");
		    }
		});
    });
    $('.emp_name').change(function(){
    	var splt = $(this).val().split('*');
    	$("#emp-no").val(splt[0]);
    	$("#kid").val(splt[1]);
    	$("#emppict").val(splt[2]);
    	$("#empname").val(splt[3]);
    	$( "#emp_pict" ).attr('src', splt[2] );
    	var nik =$(this).val().split('*')[0];
    	
    	$.ajax({
    		
    		url         : baseUrl+'/get/emp',
    		type        : "GET",
    		dataType    : "json",
    		crossDomain: true,
    		contentType: "application/json",
    		data		:{'nik':nik},
    		beforeSend	: function(request) {
    			request.setRequestHeader("content-type", 'application/json');
    			request.setRequestHeader("Access-Control-Allow-Origin", '*');
    		},
		    //data 		: JSON.stringify(datapost),
		    success     : function(response){
		    	$("#emp-username").val(response[0].username);
		    	$("#emp-email").val(response[0].EMPLOYEE_EMAIL);
		    	$("#emp-title").val(response[0].EMPLOYEE_TITLE);

		    },
		    error 		: function(xhr, textStatus, errorThrown){
		    	alert ("Sebagian Data Gagal Load!",errorThrown,"error");
		    }
		});
    });

    /*$('#btn-update-api-emp').click(function(){
    	$.ajax({
    		url : baseUrl +'/integrasi/updateAPI',
    		type: 'POST',
    		data: {'noemp':noemp, 'role':role, 'unit':unit, 'name':name, 'email':email ,'title':title, 'username':username, 'pass':pass, 'passcon':passcon, 'emp_pict':pict,'tahun':tahun},
    		dataType: 'json',
    		success:function(r){
    			if(r.msg == 'Success Insert'){
    				$("#error2").html(r.msg);
    				$('#myModal2').modal("show");
    				setTimeout(function(){
    					location.reload(true); 
    				}, 1000); 

    			}
    		}
    	});
    };*/
	
    $('#btn-input-emp').click(function(){

    	var noemp    = $('#emp-no').val();
    	var role     = $('.rolename').val();  
    	var unit     = $('.unitname').val();  
    	var name     = $('#empname').val();
    	var pict 	 = $('#emppict').val();
    	var email    = $('#emp-email').val();
    	var title    = $('#emp-title').val();
    	var username = $('#emp-username').val();
    	var pass     = $('#emp-password').val();
    	var passcon  = $('#emp-passconf').val();    
    	var tahun    = $('#year').val();    
    	var kid    	 = $('#kid').val();    
    	console.log(kid);
		
    	if(noemp == "" || role == "" || unit == "" || name == "" || email == ""  || title == "" || username == "" || pass =="" || passcon ==""){
    		
    		$("#error1").html("Your Data is not complete!");
    		$('#myModal1').modal("show");
    		
    	}else if(pass != passcon){
    		
    		$("#error1").html("Password and Confirmation Password is incorrect!");
    		$('#myModal1').modal("show");
    		
    	}else{
    		
    		$.ajax({
    			url : baseUrl +'/integrasi/input',
    			type: 'POST',
    			data: {'noemp':noemp, 'role':role, 'unit':unit, 'name':name, 'email':email ,'title':title, 'username':username, 'pass':pass, 'passcon':passcon, 'emp_pict':pict,'tahun':tahun, 'kid':kid},
    			dataType: 'json',
    			success:function(r){
    				if(r.msg == 'Success Insert'){
    					$("#error2").html(r.msg);
    					$('#myModal2').modal("show");
    					setTimeout(function(){
    						location.reload(true); 
    					}, 1000); 

    				}
    			}
    		});
    	}
    });
});

</script>

@endsection