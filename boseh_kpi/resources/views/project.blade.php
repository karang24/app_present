@extends('layouts.master')

@section('content')
	<div class="" role="tabpanel" data-example-id="togglable-tabs">
		<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			<br>
			<!-- start recent activity -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<h3>Input Project</h3>
					<div class="clearfix"></div>
					<div class="form-horizontal form-label-left">
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
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-control" id="nama-projek">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Start Date</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-control" id="startdate">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">End Date</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" class="form-control" id="finishdate">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Project Duration</label>
							<div class="col-lg-1">
								<input type="text" class="form-control" readonly="true" id="calldays">
							</div>
						</div>
	 
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
								<button id="btn-input-projek" class="btn btn-success pull-right">Save</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#btn-input-projek').click(function(){
		var unit = $('.unitname').val();
		var namaProjek = $('#nama-projek').val();
		var start = $('#startdate').val();
		var finish = $('#finishdate').val();
		var days = $('#calldays').val();

		if(unit == "" || namaProjek == "" || start == "" || finish == ""){
			$("#error1").html("Your Data is not complete!");
			$('#myModal1').modal("show");
		}else{
		   $.ajax({
				url : baseUrl +'/project/input',
				type: 'POST',
				data: {'unit':unit, 'nama': namaProjek, 'start' : start, 'finish' : finish, 'days' : days},
				dataType: 'json',
				success:function(r){
					if(r.msg == 'Success Insert'){                      
					  $("#error2").html(r.msg);
					  $('#myModal2').modal("show");
					  setTimeout(function(){// wait for 5 secs(2)
						location.reload(); // then reload the page.(3)
					  }, 1000); 
					}
				}
			});
		}
	});

	//Date Picker
	//var holidays = ["2017-08-17","2017-09-01","2017-09-21","2017-12-01","2017-12-25","2017-12-26"];
	var holidays = "";
	$.ajax({ 
		type: "GET",   
		url: '{{ URL::to('getHoliday') }}',         
		dataType: 'json',
		success : function(data) {
			var holiday = [];            
			for (var i = 0; i < data.length; i++) {
			  var obj = data[i];
			  holiday[i] = obj.day;          
			}
			holidays = holiday;

			$("#startdate").datepicker({
				//disable Weekend dan Holidays      
				beforeShowDay: function(date){
					var day = date.getDay();
					if(day == 0 || day == 6) { return [false]; }
					else if(holidays != "") {
						var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
						var x = holidays.indexOf(datestring) == -1 ;
						return [x];
					}
					else{ return [true]; }
				},
				dateFormat : 'yy-mm-dd'
			}); 

			$("#finishdate").datepicker({
				//disable Weekend dan Holidays      
				beforeShowDay: function(date) {
					var day = date.getDay();
					if(day == 0 || day == 6) { return [false]; }
					else if(holidays != "") {
						var datestring = jQuery.datepicker.formatDate('yy-mm-dd', date);
						return [ holidays.indexOf(datestring) == -1];
					}
					else { return [true]; }
				},
				dateFormat : 'yy-mm-dd',
				onSelect: function () { calculateDays(); }
			});

			function calculateDays(){
			  var start = $("#startdate").val();
			  var end   = $("#finishdate").val();
					  
				if(start < end){

				  var numOfDays = workingDaysBetweenDates(start, end)
				  $("#calldays").val(numOfDays);

				}else if(start == end){
					$("#calldays").val("1");
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
				if (endDate < startDate) { return 0; }
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
				if (startDay - endDay > 1) { days -= 2; }
				// Remove start day if span starts on Sunday but ends before Saturday
				if (startDay == 0 && endDay != 6) { days--; }
				// Remove end day if span ends on Saturday but starts after Sunday
				if (endDay == 6 && startDay != 0) { days--; }
				/* Here is the code */
				for (var i in holidays) {
					if ((holidays[i] >= d0) && (holidays[i] <= d1)) { days--; }
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
</script>
@endsection