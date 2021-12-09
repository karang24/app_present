@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">
	<ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
		<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Employee</a>
		</li>
	@if (Auth::user()->ROLE_ID == '3' || Auth::user()->ROLE_ID == '5' || Auth::user()->ROLE_ID == '8')
		<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Input</a>
		  </li>
	@endif
	</ul>
	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
		<br>
					<!-- start recent activity -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h3>UNIT</h3> <br>

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
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_nama" class="form-control">
										<option value="" disabled="true" selected="true">Choose Unit First</option>
									</select>
								</div>
							</div>
							@foreach ($roleasman as $ele)
							<input id="f_role_id" type="hidden" value="{{ $ele->ROLE_ID }}">
							@endforeach
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Month</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select class="form-control" id="f_bulan">
										<option value="">Choose Month</option>
										@foreach ($bulan as $listbulan)
										  <option value="{{ $listbulan->BULAN_ID }}">{{ $listbulan->BULAN }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Year</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select class="form-control" id="f_tahun">
										<option value="">Choose Year</option>
										@foreach ($tahun as $listtahun)
										  <option value="{{ $listtahun->TAHUN_ID }}">{{ $listtahun->TAHUN }}</option>
										@endforeach
									</select>
								</div>
							</div>         
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
								  <button class="btn btn-success pull-right btn-search btn-search-asman">Search</button>
								</div>
							</div>
						</div>
					</div>
					<div class="x_content">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="table-head" >No</th>
									<th class="table-head" >Area Kinerja Utama</th>
									<th class="table-head" >KPI</th>
									<th class="table-head" >BOBOT</th>
									<th class="table-head" >Pencapaian</th>
									<th class="table-head" >Action</th>
								</tr>
							</thead>
						  <tbody class="result-search-asman">
						  </tbody>
						</table>

						<table class="table table-bordered">
							<thead>
								<tr>                           
								   <th class="table-head" >Alfabet</th>
								   <th class="table-head" >Skor</th>
								</tr>
							</thead>
							<tbody>
								<tr>                          
									<td style="text-align: center;">A</td>
									<td style="text-align: center;">2</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">B</td>
									<td style="text-align: center;">1</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">C</td>
									<td style="text-align: center;">0</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">D</td>
									<td style="text-align: center;">-1</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">E</td>
									<td style="text-align: center;">-2</td>
								</tr>
							</tbody>
					  </table>      
					</div>
				</div>
			</div>
				<!-- end recent activity -->
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
		<!-- start user projects -->
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>UNIT</h2>
						<div class="clearfix"></div>

						<div class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select class="form-control unitname1">
										<option value="">Select Unit</option>
										@foreach ($showUnit as $listunit)
											<option value="{{ $listunit->UNIT_ID }}">{{ $listunit->UNIT }}</option>
										@endforeach                    
									</select>
								</div>
							</div>    
						  
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Name</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="idemp" class="form-control">
										<option value="">Select Employee Name</option>            
										<option value="" disabled="true" selected="true">Choose Unit First</option>            
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Month</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="idbln" class="form-control">
										<option value="">Choose Month</option>
										@foreach ($bulan as $listbulan)
											<option value="{{ $listbulan->BULAN_ID }}">{{ $listbulan->BULAN }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-1 col-sm-3 col-xs-12">Year</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="idthn" class="form-control">
										<option value="">Choose Year</option>
										@foreach ($tahun as $listtahun)
										  <option value="{{ $listtahun->TAHUN_ID }}">{{ $listtahun->TAHUN }}</option>
										@endforeach
									 </select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
								  <button class="btn btn-success pull-right" id="openContainer">Open</button>
								</div>
							</div>
						</div>
					</div>

					<div class="container" id="contt">
					  <h3>Form Penilaian Karyawan</h3>
						<table class="table table-striped table-bordered table-hover table-condensed">
							<thead>
							  <tr>
								<th class="table-head" >No</th>
								<th class="table-head" >>Area Kinerja Utama</th>
								<th class="table-head" >Kpi</th>
								<th class="table-head" >Bobot</th>
								<th class="table-head" >Pencapaian</th>
							  </tr>
							</thead>
							<tbody>
							 <input type="hidden" id="countlist" value={{ $countlist }}>
								@php
									$no = 1;
								@endphp
								@foreach ($listInsert as $list)      
								<tr> 
									<td>@php echo $no++ @endphp</td>
									<input class="list_id{{ $no }}" type="hidden" value="{{ $list->LIST_ID }}">
									<td>{{ $list->KINERJA_NAME }}</td>
									<td>{{ $list->KPI_NAME }}</td>
									<td>{{ $list->BOBOT_GP }}</td>      
									<td>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select class="form-control bobot_list{{ $no }}">
												<option value="">Choose Score</option>
												<option value=2>A</option>
												<option value=1>B</option>
												<option value=0>C</option>
												<option value=-1>D</option>
												<option value=-2>E</option>
											</select>
										</div>
									</td>
								</tr>
								@endforeach
								@foreach ($roleasman as $ele)
									<input id="role_id_inst" type="hidden" value="{{ $ele->ROLE_ID }}">
								@endforeach
							</tbody>
						</table>
					  
						<table class="table table-bordered">
							<thead>
								 <tr>                           
								   <th class="table-head" >Alfabet</th>
								   <th class="table-head" >Skor</th>
								 </tr>
							 </thead>
							<tbody>
								<tr>                          
									<td style="text-align: center;">A</td>
									<td style="text-align: center;">2</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">B</td>
									<td style="text-align: center;">1</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">C</td>
									<td style="text-align: center;">0</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">D</td>
									<td style="text-align: center;">-1</td>
								</tr>
								<tr>                          
									<td style="text-align: center;">E</td>
									<td style="text-align: center;">-2</td>
								</tr>
							</tbody>
						</table>
						<h3>Kritik dan Saran</h3>

						<div class="form-group">      
							  <textarea class="form-control" rows="5" id="comment"></textarea>
						</div>
						
						<div class="form-group">
							<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
								<button id="btn-input-asman" class="btn btn-success pull-right">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg" id="modal_pmo_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Penlian PMO</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="x_panel">
							<div class="x_content">
								<div class="form-horizontal form-label-left">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
									  <label class="control-label col-md-1 col-sm-3 col-xs-12">Area Kinerja Utama</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="hidden" class="form-control" id="tb_pmo_id">
											<input type="text" class="form-control" id="tb_pmo_nama" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-1 col-sm-3 col-xs-12">Pencapaian</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select class="form-control tb_pmo_nilai" id="tb_pmo_nilai" selected>
												<option value="">Choose Score</option>	
												<option value=2>A</option>
												<option value=1>B</option>
												<option value=0>C</option>
												<option value=-1>D</option>
												<option value=-2>E</option>
											</select
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
						<button class="btn btn-success pull-right btn-update-nilai_unit">Update</button>
					</div>
				</div>
			</div>
	</div>
</div>
<div class="modal fade" id="DeletePeninilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="tb_penilaian_id" id="tb_penilaian_id" >
							<h2> Are Sure Delete Value?</h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
					<button class="btn btn-success pull-right btn-delete-nilai_unit">Delete</button>
				</div>
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
		$(this).on('click', '.UpdatePenilaianpmo', function(e){
			  var splt = $(this).val().split('*');
			  if (splt[2]==null||splt[2]=='-'){
						alert('Plese Insert Value');
			  }else{
				$('#modal_pmo_edit').modal('show');
			}
		});
		$(this).on('click', '.button_pmo_edit', (function(e){	
			//alert($(this).attr('data-index'));
			var splt = $(this).val().split('*');
			$("#tb_pmo_id").val(splt[0]);
			$("#tb_pmo_nama").val(splt[1]);
			$("#tb_pmo_nilai").val(splt[2]);
		}));
		
		$(this).on('click', '.DeletePeninilai', function(e){
			  var splt = $(this).val().split('*');
			  console.log(splt);
			  if (splt[0]==null||splt[0]=='-'||splt[0]=='undefined'){
				alert('Plese Insert Value');
			  }else{
				$('#DeletePeninilaian').modal('show');
			}
		});
		$(this).on('click', '.button_delete_nilai', (function(e){	
			//alert($(this).attr('data-index'));
			var splt = $(this).val().split('*');
			$("#tb_penilaian_id").val(splt[0]);
		
		}));
		
		$('.btn-update-nilai_unit').click(function(){
			    				
			var String_pmo_id   = $("#tb_pmo_id").val();
			var String_pmo_nilai = $(".tb_pmo_nilai option:Selected").val();
			console.log(String_pmo_nilai);
			var val = {'pmo_id': String_pmo_id, 'pmo_nilai' : String_pmo_nilai};		
			  $.ajax({
              url : baseUrl +'/pmo/update',
              type: 'POST',
              data: val,      
              dataType: 'json',
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              success:function(r){
                $('#modal_pmo_edit').modal('hide');
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                  }, 1000);
				   $("#error2").html(r.msg);
                  $('#myModal2').modal("show");              
              },
                complete: function(){
                 $('.ajax-loader').css("visibility", "hidden");
               }
          });
		});
		
		$('.btn-delete-nilai_unit').click(function(){
			    				
			var String_penilaian_id   = $("#tb_penilaian_id").val();
			var val = {'nilai_id': String_penilaian_id};		
			  $.ajax({
              url : baseUrl +'/penilaian/del',
              type: 'POST',
              data: val,      
              dataType: 'json',
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
              },
                complete: function(){
                 $('.ajax-loader').css("visibility", "hidden");
               }
          });
		});
    $('.unitname').change(function(){

      var id = $('.unitname').val();
      var op = "";

      $.ajax({
            
          type  :'get',
          url   :'{{URL::to('getEmployeeFromUnitasman')}}',
          data  : {'id':id},
          beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
          },
          success:function(data){
            
            $('#f_nama option').remove();

            if(data.length == ""){
              op+='<option value="" >Empty</option>';
            }else{

              op+='<option value="" >Choose Employee</option>';
              for(var i = 0 ; i < data.length ; i++){
					var string_Nik = data[i].EMPLOYEE_ID;
					op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
              }
            }
                               
            $('#f_nama').append(op);
                      
          },
            complete: function(){
             $('.ajax-loader').css("visibility", "hidden");
           }
      });

    });

    $('.unitname1').change(function(){

          var id = $('.unitname1').val();
          var op = "";

			$.ajax({
					
				  type  :'get',
				  url   :'{{URL::to('getEmployeeFromUnit1asman')}}',
				  data  : {'id':id},
				  beforeSend: function(){
					$('.ajax-loader').css("visibility", "visible");
				  },
				  success:function(data){
					
					$('#idemp option').remove();

					if(data.length == ""){
					  op+='<option value="" >Empty</option>';
					}else{

					  op+='<option value="" >Choose Employee</option>';
					  for(var i = 0 ; i < data.length ; i++){
						var string_Nik = data[i].EMPLOYEE_ID;
						op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
					  }
					}
									   
					$('#idemp').append(op);
							  
				  },
				complete: function(){
				 $('.ajax-loader').css("visibility", "hidden");
			   }
			});
    });

    function count_total(angka){

      var nilai_awal = 0;
      var nilai_sementara = nilai_awal + angka;
      var nilai_awal = nilai_sementara;      
      
      return nilai_sementara;
    }

    $(this).on('click', '.btn-search-asman',function(e){
        var nama = $('#f_nama').val();
        var tahun = $('#f_tahun').val();
        var bulan = $('#f_bulan').val();
        var role = $('#f_role_id').val();

        if( nama == "" || tahun == "" || bulan == ""){
            $("#error1").html("Your Data is not complete!");
            $('#myModal1').modal("show");
        }else{

            $.ajax({
                url : baseUrl +'/asman/search',
                type: 'POST',
                data: {'nama': nama, 'tahun' : tahun, 'bulan' : bulan ,'role':role},
                dataType: 'json',
                beforeSend: function(){
                    $('.ajax-loader').css("visibility", "visible");
                },
                success:function(r){
                    var t = '';
                    var no = 1;
                    var na = 0;
                    var tn;

                    $('.result-search-pmo tr').remove();
                    $.each(r.content, function(k, v){

                      t += '<tr>';
                      t += '<td style="text-align:center">'+no+'</td>';
                      t += '<td>' + v.KINERJA_NAME + '</td>';
                      t += '<td>' + v.KPI_NAME + '</td>';
                      t += '<td style="text-align:center">' + v.BOBOT + '</td>';
                      t += '<td style="text-align:center">' + v.BOBOT_GP + '</td>';//PENCAPAIAN
					  t	+= '<td><center>';
					  t	+= 		'<button   type="button" class="btn UpdatePenilaianpmo btn-primary button_pmo_edit" data-toggle="modal"  value="'+ v.HASIL_KINERJA_ID +'*' + v.KINERJA_NAME + '*' + v.BOBOT + '"><i class="fa fa-edit">Update</button>';
					  /*t	+= 		'<button   type="button" class="btn UpdatePenialianpmo btn-primary button_pmo_edit" data-toggle="modal"  value="'+ v.HASIL_KINERJA_ID +'*' + v.KINERJA_NAME + '*' + v.BOBOT + '"><i class="fa fa-edit">Delete</button>';*/
					  t += '</center></td>';
                      t += '</td>'+ count_total(v.BOBOT) + '</td>';
                      t += '</tr>';
                      
                      if(v.BOBOT == '-'){
                      
                        tn = '-';
                      
                      }else{
                      
                        tn = na + v.BOBOT;
                      
                      }
                     
                      na = tn;
                      no++;

                  });

                    t += '<tr>';
                    t += '<td colspan="2" class ="table-head" style="text-align:center">TOTAL</td>';
                    t += '<td colspan="4" class ="table-head" style="text-align:center">'+tn+'</td>';
                    t += '</tr>';              
                    
                    $('.result-search-asman').append(t);
                },
                    complete: function(){
                     $('.ajax-loader').css("visibility", "hidden");
                   }  
            });
        }
    });
    //e.preventDefault();

    $('#contt').hide();
    $('#openContainer').click(function(){
      var nama = $('#idemp').val();
      var bulan = $('#idbln').val();
      var tahun = $('#idthn').val();

      if(nama == "" || bulan == "" || tahun == ""){     
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
        $('#contt').hide();
         
      }else{
        $('#contt').show();
      }

    });

    $('#btn-input-asman').click(function(){

      var nama   = $('#idemp').val();
      var bulan  = $('#idbln').val();
      var tahun  = $('#idthn').val();
      var kritik = $('#comment').val();
      var roles  = $('#role_id_inst').val();
      var na     = 0;
      var tn;
      var countlist = $('#countlist').val();
      var x = [];
      var flag = "bobotOk";
      
      if(kritik.length < 20){
      
        $("#error1").html("The number of characters your fill is "+kritik.length+".</br>you must fill more than 20 characters");
        $('#myModal1').modal("show");

      }else{

          for(var i = 0; i < countlist; i++){
             no = 2 + i;
             var bobot = $('.bobot_list' + no).val();
             x.push({
                list_id: $('.list_id' + no).val(),
                bobot: bobot
             });
            
            tn = na + parseInt(bobot);
            na = parseInt(tn);

            if(x[i]['bobot'] == "")
            {flag="bobotEror"; break;}
            
            no ++;
          
          }

          if(flag == "bobotOk"){
              
              var data = {
                'nama':nama,
                'bulan':bulan,
                'tahun':tahun,
                'kritik':kritik,
                'total':tn,
                'role':roles,
                'list_bobot': x
              };
							
              $.ajax({
                  url : baseUrl +'/asman/input',
                  type: 'POST',
                  data: data,          
                  dataType: 'json',
                  beforeSend: function(){
                     $('.ajax-loader').css("visibility", "visible");
                  },
                  success:function(r){
                      if(r.msg == 'Success Insert'){
                        $("#error2").html(r.msg);
                        $('#myModal2').modal("show");
                      }else if(r.msg == 'Assembly Error!'){
                        $("#error1").html(r.msg);
                        $('#myModal1').modal("show");
                      }else if(r.msg == 'Data is already available!'){
                        $("#error1").html(r.msg);
                        $('#myModal1').modal("show");
                      }
                      
                      setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                  }, 1000);
                      
                  },
                    complete: function(){
                     $('.ajax-loader').css("visibility", "hidden");
                   }
              });

              //alert("ok dehh");

          }else{

              $("#error1").html("Please check again, there is an empty assessment!");
              $('#myModal1').modal("show");
          }  
      }

    });

});
    
</script>

@endsection