@extends('layouts.app')

@section('content')
	<div class="col-md-12 col-sm-4 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Reporting KPI</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				
			<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="home-tab"
                        data-toggle="tab"
                        href="#home"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true">Report </a>
                </li>
                
            </ul>
			<div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade active show"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab"> 
                    <div class="col-md-12 col-sm-4 col-xs-12">
						<div class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">                
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Divisi</label>
								<div class="col-md-9 col-sm-1 col-xs-12">
									<select class="form-control unitname">
									<option value="">Choose Divisi</option> 
										@foreach ($showUnit as $listunit)
											<option value="{{ $listunit->id }}">{{ $listunit->divisi }}</option>
										@endforeach    
									 </select>
								</div>
							</div>                  
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="idemp" class="form-control">
										<option value="">Select Employee Name</option>
										<option value="" disabled="true" selected="true">Choose Unit First</option>
									</select>
								</div>
							</div>						  
								
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Periode</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_bulan" class="form-control periode">
										<option value="">Select Periode</option>
										<option value="bulanan">Bulanan</option>
										<option value="kumulatif">Kumulatif</option>
													
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Month</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_bulan" class="form-control month">
										<option value="" >Choose Month</option>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Year</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_tahun" class="form-control year">
										<option value="">Choose Year</option>
										@foreach ($tahun as $listtahun)
												<option value="{{ $listtahun->TAHUN }}">{{ $listtahun->TAHUN }}</option>
										@endforeach
									</select>
								</div>
							</div>                 
							
						</div>
						<div class="x_content">
							
							
						</div>
					</div>					  
				</div>
            
				<div class="form-group">
					<div class="col-md-9 col-sm-1 col-xs-12 col-md-9">
						<button class="btn btn-success pull-right btn-search-absen">Search</button>
					</div>
				</div> 
				</div> 
		
			<div class="ln_solid"></div>
			<div class="table-responsive">
					<table class="table table-bordered table-hover">
					  <thead>
						  <tr>
							<th>No</th>
							<th>Key Performance Area</th>
							<th colspan="2">Key Performance Indicator</th>    
							<th>Value KPI</th>
							<th>Target</th>
							<th>Unit</th>
							<th>Realization</th>
							<th>Score</th>
							<th>Final Score</th>
							<th>Note</th>
						  </tr>
					  </thead>
					  <tbody>
						@foreach ($target as $list_target)
						  <tr>
							<td>1</td>
							<td>Attendance</td>
							<td colspan="2">Attendance Employee</td>
							<td>32</td>
							<td>{{ $list_target->absen_target}}%</td>
							<td>%</td>
							<td class="result-absen-realis"></td>
							<td class="result-absen-skor"></td>
							<td class="result-absen-skorakhir"></td>
							<td class="result-absen-ket"></td>  
						  </tr>
						 
						  <tr>
							<td>2</td>                
							<td></td>                
							<td colspan="2">Human Resource Department</td>
							<td>46</td>
							<td>{{ $list_target->hrd_target}}</td>
							<td>skor</td>
							<td class="result-hrd-relis"></td>
							<td class="result-hrd-skor"></td>
							<td class="result-hrd-skorakhir"></td>
							<td class="result-hrd-ket"></td>                       
						  </tr>
						  <tr>
							<td>3</td>
							<td><center>Givent Point</center></td>       
							<td colspan="2">SPV</td>
							<td>14</td>
							<td>{{ $list_target->spv_target}}</td>
							<td>skor</td>
							<td  class="result-pmo-relis"></td>
							<td class="result-pmo-skor"></td>  
							<td class="result-pmo-skorakhir"></td>
							<td class="result-pmo-ket"></td>  
						  </tr>
						  <tr>
							<td>4</td>
							<td></td>
							<td colspan="2">Team Leader</td>                
							<td>8</td>
							<td>{{ $list_target->leader_target}}</td>
							<td>skor</td>
							<td class="result-unit-rilis"></td>
							<td class="result-unit-skor"></td>  
							<td class="result-unit-skorakhir"></td> 
							<td class="result-unit-ket"></td> 
						  </tr>
						  <tr>                
						  </tr>
						  <tr>
							<td colspan="4"><center>TOTAL VALUE</center></td>
							<td>100</td>
							<td></td>
							<td></td>
							<td colspan="2"><center>FINAL RESULT</center></td>
							<td class="result_score_akhir"></td>
							<td></td>
						  </tr>
					  </tbody>
					  @endforeach
					</table>
			</div>
			</div>
		</div>
	</div>
<script src=" {{ asset('public/js/jquery.min.js') }}"></script>
<script src=" {{ asset('public/js/jquery.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){ 

		$.ajaxSetup({
		headers : {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	  });
	var tanggal = new Date();
		$('.periode').change(function() {
			var per = $('.periode').val(); 
			var op = "";
			
			$('.month option').remove();
			if(per == "bulanan") {
				op+='<option value="">Select Month</option>';
				op+='<option value="1">Januari</option>';
				op+='<option value="2">Februari</option>';
				op+='<option value="3">Maret</option>';
				op+='<option value="4">April</option>';
				op+='<option value="5">Mei</option>';
				op+='<option value="6">Juni</option>';
				op+='<option value="7">Juli</option>';
				op+='<option value="8">Agustus</option>';
				op+='<option value="9">September</option>';
				op+='<option value="10">Oktober</option>';
				op+='<option value="11">November</option>';
				op+='<option value="12">Desember</option>';
			}else {
				op+='<option value="komulatif">KUMULATIF</option>';
			}
			$('.month').append(op);
		});
		
		$('.unitname').change(function(){
			var id = $('.unitname').val();
			var op = "";
			
			$.ajax({
				type  :'get',
				url   :'{{URL::to('getEmployeeFromUnit')}}',
				data  : {'id':id},
				beforeSend: function(){
					$('.ajax-loader').css("visibility", "visible");
				},
				success:function(data){
					console.log(data);
					$('#idemp option').remove();
					if(data.length == "") {
						op+='<option value="" >Empty</option>';
					}else {
						op+='<option value="" >Choose Employee</option>';
						for(var i = 0 ; i < data.length ; i++) {
							//var string_Nik = data[i].EMPLOYEE_ID;
						//	var string_Nik = data[i].EMPLOYEE_ID;
							op+='<option value="'+data[i].id_pegawai+'">'+data[i].nama+'</option>';
						}
					}
					$('#idemp').append(op);
				},
				complete: function(){
					$('.ajax-loader').css("visibility", "hidden");
				}
			});
		}); 


		$('.btn-search-absen').click(function(){
		  var emp_id = $('#idemp').val(); 
			var month  = $('.month').val();
			var year  = $('.year').val();
			if ( bulan ==""){
				 var bulan = 0;
			}
							
			if(emp_id == "" || emp_id == null || month == "" || month == null) {
				$("#error1").html("Your Data must be filled!");
				$('#myModal1').modal("show");
			}else{

				$.ajax({
					
					url :'{{URL::to('/absensi/search')}}',
					type: 'POST',
					data: {'emp_id': emp_id , 'month': month, 'year':year},
					dataType: 'json',
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
					success:function(r){
						
					  var pmis_skor ='';
					  var pmis_skorakhir ='';
					  var pmis_note ='';
					  var realiz='';
					  var absen_skor = '';
					  var absen_skorakhir = '';
					  var absen_ket = '';

					  var daysproject_skor = '';
					  var daysproject_skorakhir = '';
					  var daysproject_ket = '';
					  
					  var hrd_skor = '';
					  var hrd_skorakhir = '';
					  var hrd_ket = '';

					  var pmo_skor = '';
					  var pmo_skorakhir = '';
					  var pmo_ket = '';

					  var unit_skor = '';
					  var unit_skorakhir = '';
					  var unit_ket = '';

					  var final_score = '';
					  
					  $('.result-pmis-skor span').remove();
					  $('.result-pmis-skorakhir span').remove();
					  $('.result-pmis-note span').remove()
					  
					  $('.result-absen-realis span').remove();
					  $('.result-absen-skor span').remove();
					  $('.result-absen-skorakhir span').remove();
					  $('.result-absen-ket span').remove()

					  $('.result-daysproject-rilis span').remove();
					  $('.result-daysproject-skor span').remove();
					  $('.result-daysproject-skorakhir span').remove();
					  $('.result-daysproject-ket span').remove()

					  $('.result-pmis-skor span').remove();
						  
					  $('.result-hrd-relis span').remove();
					  $('.result-hrd-skor span').remove();
					  $('.result-hrd-skorakhir span').remove();
					  $('.result-hrd-ket span').remove()
					  
					  $('.result-pmo-relis span').remove();
					  $('.result-pmo-skor span').remove();
					  $('.result-pmo-skorakhir span').remove();
					  $('.result-pmo-ket span').remove();
					  
					  $('.result-unit-rilis span').remove();
					  $('.result-unit-skor span').remove();
					  $('.result-unit-skorakhir span').remove();
					  $('.result-unit-ket span').remove();

					  $('.result_score_akhir span').remove();

 
					  $.each(r.content, function(k, v){
						
						  pmis_skor += '<span>'+v.PMIS_score+'</span>';
						  pmis_skorakhir += '<span>'+v.PMIS_final_score+'</span>';
						  pmis_note += '<span>'+v.NOTE_PMIS+'</span>';
						 
						  realiz += '<span>'+v.final_total+'</span>'; 
						  absen_skor += '<span>'+v.skor+'</span>';
						  absen_skorakhir += '<span>'+v.skor+'</span>';
						  console.log(v.final_score_absensi);
						  absen_ket += '<span>'+v.note_absensi+'</span>';

						  daysproject_ket += '<span>'+v.note_days_project+'</span>';

						  hrd_skor += '<span>'+v.HASIL_HRD+'</span>';
						  hrd_skorakhir += '<span>'+v.SKOR_HRD+'</span>';
						  hrd_ket += '<span>'+v.KRITIK_HRD+'</span>';

						  pmo_skor += '<span>'+v.HASIL_PMO+'</span>';
						  pmo_skorakhir += '<span>'+v.SKOR_PMO+'</span>';
						  pmo_ket +='<span>'+v.KRITIK_PMO+'</span>';

						  unit_skor += '<span>'+v.HASIL_UNIT+'</span>';
						  unit_skorakhir += '<span>'+v.SKOR_UNIT+'</span>';
						  unit_ket += '<span>'+v.KRITIK_UNIT+'</span>';

						  final_score += '<span>'+v.FINAL_SCORE+'</span>';
							daysproject_skor += '<span>'+v.final+'</span>';
						  daysproject_skorakhir += '<span>'+v.fixdays+'</span>';       

					  });

					  

					  if(r.content == "" || r.contentdays == ""){
						  
						  $('.result-pmis-skor').append("<span>0</span>");
						  $('.result-pmis-skorakhir').append("<span>0</span>");
						  $('.result-pmis-note').append("<span>-</span>");
						  
						  $('.result-absen-realis').append("<span>0</span>");
						  $('.result-absen-skor').append("<span>0</span>");
						  $('.result-absen-skorakhir').append("<span>0</span>");
						  $('.result-absen-ket').append("<span>-</span>");
						   
						  $('.result-daysproject-rilis').append("<span>0</span>");
						  $('.result-daysproject-skor').append("<span>0</span>");
						  $('.result-daysproject-skorakhir').append("<span>0</span>");
						  $('.result-daysproject-ket').append("<span>-</span>");

						  $('.result-hrd-relis').append("<span>0</span>");
						  $('.result-hrd-skor').append("<span>0</span>");
						  $('.result-hrd-skorakhir').append("<span>0</span>");
						  $('.result-hrd-ket').append("<span>-</span>");
						  
						  $('.result-pmo-relis').append("<span>0</span>");
						  $('.result-pmo-skor').append("<span>0</span>");
						  $('.result-pmo-skorakhir').append("<span>0</span>");
						  $('.result-pmo-ket').append("<span>-</span>");
						  
						  $('.result-unit-rilis').append("<span>0</span>");
						  $('.result-unit-skor').append("<span>0</span>");
						  $('.result-unit-skorakhir').append("<span>0</span>");
						  $('.result-unit-ket').append("<span>-</span>");  

						  $('.result-score-akhir').append("<span>0</span>");
						  
					  }else{ 
						  
						  $('.result-pmis-skor').append(pmis_skor);
						  $('.result-pmis-skorakhir').append(pmis_skorakhir);
						  $('.result-pmis-note').append(pmis_note);
						  
						  $('.result-absen-realis').append(realiz);
						  $('.result-absen-skor').append(absen_skor);
						  $('.result-absen-skorakhir').append(absen_skorakhir);
						  $('.result-absen-ket').append(absen_ket);

						  $('.result-daysproject-rilis').append(daysproject_skor);
						  $('.result-daysproject-skor').append(daysproject_skor);
						  $('.result-daysproject-skorakhir').append(daysproject_skorakhir);
						  $('.result-daysproject-ket').append(daysproject_ket);
		 
						  $('.result-hrd-skor').append(hrd_skor);
						  $('.result-hrd-relis').append(hrd_skorakhir);
						  $('.result-hrd-skorakhir').append(hrd_skorakhir);
						  $('.result-hrd-ket').append(hrd_ket);
						  
						  $('.result-pmo-skor').append(pmo_skor);
						  $('.result-pmo-relis').append(pmo_skorakhir);
						  $('.result-pmo-skorakhir').append(pmo_skorakhir);
						  $('.result-pmo-ket').append(pmo_ket);
						  
						  $('.result-unit-skor').append(unit_skor);
						  $('.result-unit-rilis').append(unit_skorakhir);
						  $('.result-unit-skorakhir').append(unit_skorakhir);
						  $('.result-unit-ket').append(unit_ket);  

						  var resultKPI = parseInt(final_score.split('<span>').join('').split('</span>').join('')) +  parseInt(pmis_skorakhir.split('<span>').join('').split('</span>').join(''));
						  console.log(parseInt(daysproject_skorakhir.split('<span>').join('').split('</span>').join('')));
						  $('.result_score_akhir').append("<span>"+resultKPI+"</span>");
					  }
					},
					complete: function(){
					 $('.ajax-loader').css("visibility", "hidden");
				   } 
				});
			}
		});
});
</script>
@endsection