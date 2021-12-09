@extends('layouts.app')

@section('content')
		
	<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
        <li class="nav-item">
                <a  href="#tab_content1" class="nav-link active" id="home-tab" data-toggle="tab"href="#home"  role="tab" aria-controls="home"aria-selected="true">HRD </a>
        </li>
        <li role="presentation" class="">
            <a href="#tab_content2" class="nav-link" id="home-tab" data-toggle="tab">SPV</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab_content3" class="nav-link" id="home-tab" data-toggle="tab">Team Leader</a>
        </li>        
    </ul>
    <div id="myTabContent" class="tab-content">
	
			<div role="tabpanel" class="tab-pane fade active show" id="tab_content1" aria-labelledby="home-tab">
			<br>
				<div class="col-md-12 col-sm-4 col-xs-12">
					<div class="x_panel">
					  <h3>Given Point HRD</h3>
						<div class="clearfix"></div>
							<div class="form-horizontal form-label-left">                
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Area Kinerja Utama</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="area-kinerja-hrd" class="form-control areakinerja">
											<option value="">Select Area Kinerja Utama</option>
											@foreach ($showAreaKinerja as $listareakinerja)
											<option value="{{ $listareakinerja->KINERJA_ID }}">{{ $listareakinerja->KINERJA_NAME }}</option>
											@endforeach                    
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">KPI</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control kpi" id="kpi-hrd">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">BOBOT</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									   <input type="number" min="0" class="form-control kpi" id="bobot-hrd">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
										<button id="btn-input-given-hrd" class="btn btn-success pull-right">Save</button>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
			   <div class="col-md-12 col-sm-4 col-xs-12">
					<div class="x_panel">
						<h3>Given Point PMO</h3>
						<div class="clearfix"></div>
						<div class="form-horizontal form-label-left">                
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Area Kinerja Utama</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="area-kinerja-pmo" class="form-control areakinerja">
										<option value="">Select Area Kinerja Utama</option>
										@foreach ($showAreaKinerja as $listareakinerja)
										<option value="{{ $listareakinerja->KINERJA_ID }}">{{ $listareakinerja->KINERJA_NAME }}</option>
										@endforeach                    
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">KPI</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type="text" class="form-control kpi" id="kpi-pmo">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">BOBOT</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								   <input type="number" min="0" class="form-control kpi" id="bobot-pmo">
								</div>
							</div>    
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
								  <button id="btn-input-given-pmo" class="btn btn-success pull-right">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
				<div class="col-md-12 col-sm-4 col-xs-12">
					<div class="x_panel">
						<h3>Given Point UNIT</h3>
						<div class="clearfix"></div>
						<div class="form-horizontal form-label-left">                
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Area Kinerja Utama</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								  <select id="area-kinerja-unit" class="form-control areakinerja">
									  <option value="">Select Area Kinerja Utama</option>
									  @foreach ($showAreaKinerja as $listareakinerja)
										<option value="{{ $listareakinerja->KINERJA_ID }}">{{ $listareakinerja->KINERJA_NAME }}</option>
									  @endforeach                    
								  </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">KPI</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								  <input type="text" class="form-control kpi" id="kpi-unit">
								</div>
							</div>     
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">BOBOT</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								   <input type="number" min="0" class="form-control kpi" id="bobot-unit">
								</div>
							</div> 
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
								  <button id="btn-input-given-unit" class="btn btn-success pull-right">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
	</div>
@endsection
@section('js')

<script type="text/javascript">
 $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
$('#btn-input-given-hrd').click(function(){
    var areakinerjahrd = $('#area-kinerja-hrd').val();
    var kpihrd = $('#kpi-hrd').val();
    var bobothrd = $('#bobot-hrd').val();

    if( areakinerjahrd == "" || kpihrd == "" || bobothrd == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{

       $.ajax({
            url : "{{url('/givenpointhrd/input')}}",
            type: 'POST',
            data: {'areahrd': areakinerjahrd, 'kpihrd' : kpihrd, 'bobothrd':bobothrd},
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
})

$('#btn-input-given-pmo').click(function(){
    var areakinerjapmo = $('#area-kinerja-pmo').val();
    var kpipmo = $('#kpi-pmo').val();
    var bobotpmo = $('#bobot-pmo').val();

    if( areakinerjapmo == "" || kpipmo == "" || bobotpmo == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{

       $.ajax({
            url :"{{url('/givenpointspv/input')}}",
            type: 'POST',
            data: {'areapmo': areakinerjapmo, 'kpipmo' : kpipmo, 'bobotpmo':bobotpmo},
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
})

$('#btn-input-given-unit').click(function(){
    var areakinerjaunit = $('#area-kinerja-unit').val();
    var kpiunit = $('#kpi-unit').val();
    var bobotunit = $('#bobot-unit').val();

    if( areakinerjaunit == "" || kpiunit == "" || bobotunit == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{
      $.ajax({
            url : "{{url('/givenpointleader/input')}}",
            type: 'POST',
            data: {'areaunit': areakinerjaunit, 'kpiunit' : kpiunit, 'bobotunit':bobotunit},
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
})

</script>
@stop