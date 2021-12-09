@extends('layouts.master')

@section('content')

<!--div class="" role="tabpanel" data-example-id="togglable-tabs">

	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			<br>
			<!-- start recent activity >
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="clearfix"></div>
				<form id="btn-input-emp" name="btn-input-emp" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
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
								<select id="emp_name" class="form-control emp_name">
									<option value="">Select Employee</option>
								</select>
							</div>
						</div>
						<div id="form_edit_employee" class="form_edit_employee" style="display: none;" >
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12" id="showgambar">Employee Picture</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<img id="emp_pict" alt="emp_pict" class="emp_pict" src="" width="80" height="80">
									<input type="file" id="inputgambar" id="inputgambar">
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
									<input type="submit" class="btn btn-success pull-right" value="Save">
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div-->



<div class="container">


  <form action="{{url('/edit_employee/edit')}}" enctype="multipart/form-data" method="POST">
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
<div class="x_panel">
					<h3>Edit Employee</h3>

					<div class="clearfix"></div>

    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
				<div class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="unitname" class="form-control unitname">
									<option value="">Select Unit</option>
									@foreach ($showUnit as $listunit)
									<option value="{{ $listunit->UNIT_ID }}">{{ $listunit->UNIT }}</option>
									@endforeach                    
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="emp_name" name="emp_name" class="form-control emp_name">
									<option value="">Select Employee</option>
								</select>
							</div>
						</div>
						<div id="form_edit_employee" class="form_edit_employee" style="display: none;" >
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12" id="showgambar">Employee Picture</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<img id="emp_pict"  alt="emp_pict" class="emp_pict" src="" width="80" height="80">
									<input type="file" id="inputgambar" name="image">
								<input type="hidden" class="form-control empname" id="empname" name="empname">
								<input type="hidden" class="form-control empid" id="empid" name="empid">

								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">NIK</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="number" class="form-control emp-no" id="emp-no" name="emp-no" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Email</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="email" class="form-control" id="emp-email" name="emp-email">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Title</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" id="emp-title" name="emp-title">
								</div>
							</div>  

							<hr>


							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
									<input type="submit" class="btn btn-success pull-right" value="Save">
								</div>
							</div>
						</div>
					</div>
					
			</div>
			</div>
		</form>


</div>

@if(!empty(Session::get('message')))
<script>
$(function() {
alert('Sucsess Insert');
});
</script>
@endif
<script type="text/javascript">
	$(document).ready(function(){
		var tanggal = new Date();
    // CSRF Setup
    $.ajaxSetup({
    	headers : {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
    });
	  $("body").on("click",".upload-image",function(e){

    $(this).parents("form").ajaxForm(options);

  });


  var options = { 

    complete: function(response) 

    {

    	if($.isEmptyObject(response.responseJSON.error)){

    		$("input[name='title']").val('');

    		alert('Image Upload Successfully.');

    	}else{

    		printErrorMsg(response.responseJSON.error);

    	}

    }

  };


  function printErrorMsg (msg) {

	$(".print-error-msg").find("ul").html('');

	$(".print-error-msg").css('display','block');

	$.each( msg, function( key, value ) {

		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');

	});

  }
	
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#emp_pict').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
			

        }
    }
		function uploadGambar(formData){
		$.ajax({
			      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

			url 		: baseUrl +'/edit_employee/edit',
			type 		: "POST",
			data 		: formData,
			contentType : false,
			processData : false,
			success 	: function(response){
				if (response.status == "200"){
					
				} else alert ("Error "+response.status,response.message,"error");
			},
			error 		: function(xhr, textStatus, errorThrown){
				alert ("Load API Upload Error!","","error");
			}
		});
	}

    $("#inputgambar").change(function () {
        readURL(this);
    });
    $('#unitname').change(function(){
    	var id_unit = $('.unitname').val();
    	var MM = ((tanggal.getMonth()+1) < 10 ? '0' : '') + (tanggal.getMonth() + 1);
    	var op = "";
    	var date_now = MM+tanggal.getFullYear();
    	var unit     = $('.unitname').val();  
    	$.ajax({
    		
    		url         : baseUrl+'/for/unit',
    		type        : "GET",
    		dataType    : "json",
    		crossDomain: true,
    		contentType: "application/json",
    		data		:{'unit':unit},
    		beforeSend	: function(request) {
    			request.setRequestHeader("content-type", 'application/json');
    			request.setRequestHeader("Access-Control-Allow-Origin", '*');
    		},
		    //data 		: JSON.stringify(datapost),
		    success     : function(response){
		    	$('#emp_name option').remove();
		    	if(response[0].length == ""){
		    		op+='<option value="" >Empty</option>';
		    	}else{
		    		op+='<option value="" >Choose Employee</option>';
		    		for(let i = 0 ; i < response.length ; i++){
		    			op+='<option value="'+response[i].nik+'*'+response[i].foto+'*'+response[i].nama+'*'+response[i].EMPLOYEE_ID+'">'+response[i].nama+'</option>';
		    		}
		    	}
		    	$('#emp_name').append(op);
		    },
		    error 		: function(xhr, textStatus, errorThrown){
		    }
		});
    });
    $('.emp_name').change(function(){
    	//fungsi belum jalan 
    	var splt = $(this).val().split('*');

    	console.log(splt[1]);
    	$("#emp-no").val(splt[0]);
		//$("#emp_pict").attr("src", $(splt[1]).val());
		//$("#emp_pict").src= splt[1];
		$( "#emp_pict" ).attr('src', splt[1] );
		/*if ( this.value == '1')
		{*/
			$(".form_edit_employee").show();
		/*}
		else
		{
			$(".form_edit_employee").hide();
		}*/
	});
	   $('.emp_name').change(function(){
    	var splt = $(this).val().split('*');
		console.log(splt);
    	$("#emp-no").val(splt[0]);
    	$("#kid").val(splt[1]);
    	$("#empname").val(splt[2]);
    	$("#empid").val(splt[3]);
    	$( "#emp_pict" ).attr('src', splt[1] );
    	var nik =$(this).val().split('*')[0];
    	$(".form_edit_employee").show();
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
		    	alert ("Load API Point Error!",errorThrown,"error");
		    }
		});
    });

		$("form[name='btn-input-emp']").submit(function(e) {
			e.preventDefault();
			var kodePoint = $('#kode').val();
			var formData =  new FormData();
			formData.append('file', $('input[type=file]')[0].files[0]);
			console.log(formData);
			uploadGambar(formData);
		});



    
});

</script>

@endsection