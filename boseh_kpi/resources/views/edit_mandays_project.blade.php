@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-4 col-xs-12">
    <div class="x_panel">      
        <div class="x_title">
			<h3>Edit Project Employee</h3>
            <div class="clearfix"></div>  
            <div class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
                  	<label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
                  	<div class="col-md-9 col-sm-9 col-xs-12">
                    	<select class="form-control unitname">
                        	<option value="">Select Unit</option>
                        	@foreach ($showUnit as $listunit)
                          		<option value="{{ $listunit->UNIT_ID }}">{{ $listunit->UNIT }}</option>
                        	@endforeach                    
                    	</select>
                  </div>
                </div>
                <div class="form-group">
	            	<label class="control-label col-md-1 col-sm-3 col-xs-12">Project</label>
	            	<div class="col-md-9 col-sm-9 col-xs-12">
	            		<select class="form-control prjctname">
	                		<option value="" disabled="true" selected="true">Choose Unit First</option>
	                	</select>
	              	</div>
                </div>
                <div class="form-group">
	            	<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
	            	<div class="col-md-9 col-sm-9 col-xs-12">
	            		<select class="form-control empname">
	                		<option value="" disabled="true" selected="true">Choose Project First</option>
	                	</select>
	              	</div>
                </div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
                    <button class="btn btn-success pull-right btn-view-prjct">Search</button>
                  </div>
                </div>
            </div>
		</div>
		<div class="x_content">

			<table class="table table-bordered">
        		<thead>
          			<tr>
            			<th class ="table-head" style="text-align: center">No</th>
            			<th class ="table-head" style="text-align: center">Project Name</th>
            			<th class ="table-head" style="text-align: center">Jabatan On Project</th>
            			<th class ="table-head" style="text-align: center">Start Work</th>
            			<th class ="table-head" style="text-align: center">End Work</th>
            			<th class ="table-head" style="text-align: center">Work Duration</th>
          			</tr>
                </thead>
	            <tbody class="result-prjct">
			
				</tbody>
	        </table>  			
    		<div class="form-group">
          		<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
            		<button id="btn-update-prjct" class="btn btn-success pull-right">Update</button>
        		</div>
        	</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	$('.unitname').change(function(){
	    
	    var id = $(this).val();
	    var op = "";
	    $.ajax({	          
	        type  :'get',
	        url   :'{{URL::to('getProjectFromUnitEM')}}',
	        data  : {'id':id},
	        success:function(data){
	          
	          $('.prjctname option').remove();

	          if(data.length == ""){	          	
	          	
	          	op+='<option value="" >Empty</option>';
	          
	          }else{

	            op+='<option value="" >Choose Project</option>';
		            for(var i = 0 ; i < data.length ; i++){
						op+='<option value="'+data[i].PROJECT_DETAIL_ID+'"> '+ data[i].PROJECT_NAME+'</option>';
		            }
	          }	                             
	          $('.prjctname').append(op);	                    
	        }
	    });
  	});

  	$('.prjctname').change(function(){
  		var id = $(this).val();
	    var op = "";

	    $.ajax({	          
	        type  :'get',
	        url   :'{{URL::to('getEmpFromPrjct')}}',
	        data  : {'id':id},
	        success:function(data){
	          
	          $('.empname option').remove();

	          if(data.length == ""){	          	
	          	
	          	op+='<option value="" >Empty</option>';
	          
	          }else{

	            op+='<option value="" >Choose Employee</option>';
		            for(var i = 0 ; i < data.length ; i++){
						var string_Nik = data[i].EMPLOYEE_ID;
						op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
		            }
	          }	                             
	          $('.empname').append(op);	                    
	        }
	    });
  	});
  	  	

  	$('.btn-view-prjct').click(function(){

  		var unit = $('.unitname').val();
  		var prjct  = $('.prjctname').val();
  		var emp  = $('.empname').val();

  		if(emp == "" || unit == "" || prjct =="")
  		{
	  		$("#error1").html("Your Data is not complete!");
	      	$('#myModal1').modal("show");
	    
	    }else{

	    	$.ajax({
	    		url : baseUrl +'/editMandaysProject/view',
		        type: 'POST',
		        data: {'emp_id': emp,'prjct_id': prjct},
		        dataType: 'json',
		        success:function(r)
		        {
		        	var t = '';
                    var no = 1;
            		
            		$('.result-prjct tr').remove();

            		$.each(r.content, function(k, v){
	                	
	                	t+=	'<tr>';
	                	t+=     '<input type="hidden" class="prjct_id" value="'+v.project_detail_id+'">'
	                	t+=     '<input type="hidden" class="emp_id" value="'+v.EMPLOYEE_ID+'">'
	                	t+=     '<input type="hidden" class="PROJECT_id" value="'+v.PROJECT_ID+'">'	                	
            			t+=			'<td style="text-align:center">'+no+'</td>';
            			t+=			'<td>'+v.PROJECT_NAME+'</td>';
            			t+=			'<td>'+v.PROJECT_ROLE_EMP+'</td>';
            			t+=			'<td><input type="text" style="width:120px" class="form-control startdate" value="'+v.START_WORK+'"></td>';
            			t+=			'<td><input type="text" style="width:120px" class="form-control finishdate" value="'+v.END_WORK+'"></td>';
            			t+=			'<td><input type="text" class="form-control calldays" readonly="true" value="'+v.WORK_DURATION+'"></td>';
            			t+= '</tr>';

            			//Date Picker    
				    	var holidays = "";

					    $.ajax({ 
					    
					        type: "GET",   
					        url: '{{ URL::to('getHoliday') }}',         
					        dataType: 'json',
					        success : function(data)
					        {
					            var holiday = [];            
					            for (var i = 0; i < data.length; i++)
					            {
					              var obj = data[i];
					              holiday[i] = obj.day;          
					            }
					                          
					            holidays = holiday;

					            $(".startdate").datepicker({

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

					            $(".finishdate").datepicker({

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
					              var start = $(".startdate").val();
					              var end   = $(".finishdate").val();
					                      
					                if(start < end){

					                  var numOfDays = workingDaysBetweenDates(start, end)
					                  $(".calldays").val(numOfDays);

					                }else if(start == end){
					                    $(".calldays").val("1");
					                }else{
					                    alert("wrong!");
					                }         
					             }
					            //----------------------------------------------------------------------//

					              function workingDaysBetweenDates(d0, d1) {
					                // var holidays = ['2017-08-17','2017-09-01','2017-09-21','2017-12-01','2017-12-25','2017-12-26'];
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
					        }

						});
                    	
                    	no++;
					});
						
	            	$('.result-prjct').append(t);	            		
            		
		        }//Tutup Success ajax 
	 		});
	 	}   	
  				
  	});
						
	$('#btn-update-prjct').click(function(){
		var prjct_id   = $('.prjct_id').val();
		var emp_id 	   = $('.emp_id').val(); 
		var start      = $('.startdate').val();
		var finish     = $('.finishdate').val();
		var duration   = $('.calldays').val();
		var PROJECT    = $('.PROJECT_id').val();

		$.ajax({
            url : baseUrl +'/editMandaysProject/update',
            type: 'POST',
            data: {'prjct_id': prjct_id, 'emp_id': emp_id, 'start' : start, 'finish':finish, 'duration':duration, 'PROJECT':PROJECT},
            dataType: 'json',
            success:function(r){
                if(r.msg == 'Success Update'){                  
                  $("#error2").html(r.msg);
	      		  $('#myModal2').modal("show");
                }
                 location.reload();
            }
        });
	});

});
</script>
@endsection