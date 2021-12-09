@extends('layouts.master')

@section('content')
<div class="" role="tabpanel" data-example-id="togglable-tabs">
	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"><br>
			<!-- start recent activity -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<h3>View Employee</h3>
					<div class="clearfix"></div>
					<div class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="unitname" class="form-control">
									<option value="">Choose Unit</option>
									@foreach ($showUnit as $list)
										<option value="{{ $list->UNIT_ID }}">{{ $list->UNIT }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<select id="f_tahun" class="form-control">
									<option value="">Choose Year</option>
									@foreach ($tahun as $listtahun)
										<option value="{{ $listtahun->TAHUN }}">{{ $listtahun->TAHUN }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
								<button id="btn-view-emp" class="btn btn-success pull-right">View</button>
							</div>
						</div><br>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th class ="table-head">NO</th>
									<th class ="table-head">Employee Name</th>
									<th class ="table-head">Employee Title</th>
							
								</tr>
							</thead>
							
							<tbody class="result-emp"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$('#btn-view-emp').click(function(){
	var unit = $('#unitname').val();
	var tahun = $('#f_tahun').val();
	if(unit == ""){
		$("#error1").html("Unit must be filled!");
		$('#myModal1').modal("show");
	}
	else if(tahun == ""){
		$("#error1").html("Year must be filled!");
		$('#myModal1').modal("show");
	}
	else{
		$.ajax({
			url : baseUrl + '/view_emp/search',
			type: 'POST',
			data: {'unit': unit, 'tahun': tahun},
			dataType: 'json',
			success:function(r){
				// console.log(r);
				var t = ''; var no = 1; $('.result-emp tr').remove();
				if(r.content.length > 0) {
					$.each(r.content, function(k, v){
						t += setContentTable(1, [no, v.EMPLOYEE_NAME, v.EMPLOYEE_TITLE, v.UNIT, v.ROLE_NAME]);
						no++;
					});
				}
				else { t = setContentTable(0,""); }
				$('.result-emp').append(t);
			}
		});
	}
});

function setContentTable(val, arr){
	var t = '';
	switch(val){
		case 0:
			t =
				'<tr>'+
					'<td style="text-align: center" colspan="5">Data Not Found</td>'+
				'</tr>';
		break;
		case 1:
			t =
				'<tr>'+
					'<td style="text-align: center">'+arr[0]+'</td>'+
					'<td>' + arr[1] + '</td>'+
					'<td>' + arr[2] + '</td>'+
		
				'</tr>';
		break;
	}
	return t;
}
</script> 
@endsection