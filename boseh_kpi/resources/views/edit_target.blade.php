@extends('layouts.app')
@section('content')

<div class="col-md-12 col-sm-4 col-xs-12">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
	@endif
    <div class="x_panel">      
        <div class="x_title">
			<h3>Edit Target Value</h3>
            <div class="clearfix"></div>  
        
		</div>
		<div class="x_content">

			<table class="table table-bordered">
        		<thead>
          			<tr>
            			<th class ="table-head" style="text-align: center">Target Absen(%)</th>
            			<th class ="table-head" style="text-align: center">Target SPV</th>
						<th class ="table-head" style="text-align: center">Target HRD</th>
						<th class ="table-head" style="text-align: center">Target Team Leader</th>
          			</tr>
                </thead>
	            <tbody class="result-prjct">
				<tr>	
				@foreach ($showTarget as $list_target)
            		<td style="text-align:center"><input type="text"  class="form-control absen" value="{{ $list_target->absen_target}}"></td>
            		<td style="text-align:center"><input type="text"  class="form-control PMO" value="{{ $list_target->spv_target}}"></td>
            		<td style="text-align:center"><input type="text"  class="form-control HRD" value="{{ $list_target->hrd_target}}"></td>
            		<td style="text-align:center"><input type="text"  class="form-control Unit" value="{{ $list_target->leader_target}}"></td>
					                        	
				@endforeach 

            	</tr>
				</tbody>
	        </table>  			
    		<div class="form-group">
          		<div class="col-md-10 col-sm-10 col-xs-12 col-md-10">
            		<button id="btn-update" class="btn btn-success pull-right">Update</button>
        		</div>
        	</div>
		</div>
	</div>
</div>
<script src=" {{ asset('public/js/jquery.min.js') }}"></script>
<script src=" {{ asset('public/js/jquery.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    // CSRF Setup
    $.ajaxSetup({
        headers : {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


						
	$('#btn-update').click(function(){
		var spv 	   = $('.PMO').val(); 
		var hrd 	   = $('.HRD').val(); 
		var leader      = $('.Unit').val();
		var absen     = $('.absen').val();
		var daysproject   = $('.daysproject').val();
	
			$.ajax({
				url :'{{URL::to('/update/target')}}',
				type: 'POST',
				data: { 'spv': spv,'hrd': hrd, 'leader' : leader, 'absen':absen, 'daysproject':daysproject},
				dataType: 'json',
				success:function(r){
					if(r.msg == 'Success Update'){                  
					  $("#error2").html(r.msg);
					  $('#myModal2').modal("show");
					}
					 location.reload(true);
					}
				});
			});
		
});
</script>
@endsection