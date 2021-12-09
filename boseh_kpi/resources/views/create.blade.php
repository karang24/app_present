@extends('layouts.master')


@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">    	
		<h2>Input Pegawai</h2>
		  <ul class="nav navbar-right panel_toolbox">
		        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Settings 1</a>
		            </li>
		            <li><a href="#">Settings 2</a>
		            </li>
		          </ul>
		        </li>
		        <li><a class="close-link"><i class="fa fa-close"></i></a>
		        </li>
		   </ul>
		<div class="clearfix"></div>
    </div>
    <div class="x-content">
		<form action="{{ url('/days_project/create/submit') }}" method="POST" class="form-horizontal form-label-left">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset>
			
			<div class="form-group">
			<label class="col-lg-2 control-label">Nama Pegawai</label>
	          <div class="col-lg-10">
	         	{{-- <input type="text" class="form-control" id="nama-pegawai" required="true"> --}}
	         	<select id="nama-pegawai" class="form-control" required="true">
              <option value="">Select Employee Name</option>
              @foreach ($employeeName as $ele)
                <option value="{{ $ele->EMPLOYEE_NAME }}">{{ $ele->EMPLOYEE_NAME }}</option>
              @endforeach
              
            </select>
            <input type="hidden" name="idpegawai" id="idpegawai">
	          </div>
	        </div>
	      	
	      	<div class="form-group">
	      	<label class="col-lg-2 control-label">JABATAN</label>         
	          <div class="col-lg-10">
	          	<input type="text" name="jabatan-pegawai" readonly="true" class="form-control" id="jabatan-pegawai">             
	          </div>
	     	</div>
	     	<div class="form-group">
	      	<label class="col-lg-2 control-label">PROJECT</label>         
	          <div class="col-lg-10">
	          	<input type="text" class="form-control" name="nama-projek" required="true">           
	          </div>
	     	</div>
	     	<div class="form-group">
	      	<label class="col-lg-2 control-label">POSITION IN PROJECT</label>         
	          <div class="col-lg-10">
	          	<select name="role-projek" class="form-control" required="true">
	          		<option value="">Select Job Position</option>
			        @foreach ($listprojectRole as $list)
			        	<option value="{{ $list->PROJECT_ROLE_EMP }}">{{ $list->PROJECT_ROLE_EMP }}</option>
			        @endforeach

	          	</select>            
	          </div>
	     	</div>
	     	<div class="form-group">
	      	<label class="col-lg-2 control-label">START PROJECT</label>         
	          <div class="col-lg-10">
	          	<input type="text" class="form-control" id="startdate" name="startdate" required="true">         
	          </div>
	     	</div>
	     	<div class="form-group">
	      	<label class="col-lg-2 control-label">FINISH PROJECT</label>         
	          <div class="col-lg-10">
	          	<input type="text" class="form-control" id="finishdate" name="finishdate" required="true">            
	          </div>
	     	</div>
	     	<div class="form-group">
	      	<label class="col-lg-2 control-label">DAYS PROJECT</label>         
	          <div class="col-lg-2">
	          	  <input type="number" min="0" readonly="true" class="form-control" id="calldays" name="daysprojek">
	      	  </div> 
	          	{{-- <label class="radio-inline">
	            	<input type="radio" name="optionsRadios" id="radio1" value="option1" checked="">
	            	No update Days
	          	</label>        	
		
	          	<label class="radio-inline">
	            	<input type="radio" name="optionsRadios" id="radio2" value="option2">
	            	Update Days
	          	</label> --}}	
	         </div>
	     	
	     	<div class="form-group">
		 		<div class="col-lg-10 col-lg-offset-2">
		     		<input type="submit" value="SAVE" class="btn btn-primary">
		     		<a href="{{ url('/days_project') }}" class="btn btn-default">CANCEL</a>
		 		</div>
	     	</div>
	     </fieldset>
		</form>
	</div>
	</div>
</div>

<script type="text/javascript">
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
    //------------------------------------------------------//

    //Combo Box Search
    // $("#combo").select2({
  //           placeholder: "Select a job position in project",
  //           allowClear: true
  //       });
    //------------------------------------------------------//


    //Get Jabatan and id pegawai Automatically
    $("#nama-pegawai").blur(function(){

      $value = $("#nama-pegawai").val();

      if($value == ""){

        $('#jabatan-pegawai').val("");
      
      }else{

        $.ajax({
          type    : 'get',
          url     : '{{URL::to('getjbtn')}}',
          data    : {'getjbtn': $value },
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
          }
        });

        $.ajax({
          type  : 'get',
          url   : '{{ URL::to('getidpegawai')}}',
          data    : {'getidpegawai':$value},
          success : function(hasilID){

            var str = hasilID; 
            var res = str.replace("[", "");
            var x = res.replace("]","");

            var obj = JSON.parse(x);
            
            $('#idpegawai').val(obj.EMPLOYEE_ID);
          }
        })
      }         
    });
    //----------------------------------------------------------------------//


    //Date Picker
    var holidays = ["2017-08-17","2017-09-01","2017-09-21","2017-12-01","2017-12-25","2017-12-26"];
    $("#startdate").datepicker({

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

    $("#finishdate").datepicker({

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
        var start   = $("#startdate").val();
        var end   = $("#finishdate").val();
                
          if(start < end){

          var numOfDays = workingDaysBetweenDates(start, end)
          $("#calldays").val(numOfDays);

          }else{
            alert("wrong!");
          }         
       }
    //----------------------------------------------------------------------//

    function workingDaysBetweenDates(d0, d1) {
      var holidays = ['2017-08-17','2017-09-01','2017-09-21','2017-12-01','2017-12-25','2017-12-26'];
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
    
  });

  </script>

@endsection