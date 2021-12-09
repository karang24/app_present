@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>
                <i class="fa fa-bars"></i>
                Tabs
                <small>HRD</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a
                        href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-expanded="false">
                        <i class="fa fa-wrench"></i>
                    </a>
                </li>
                <li>
                    <a class="close-link">
                        <i class="fa fa-close"></i>
                    </a>
                </li>
            </ul>
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
                        aria-selected="true">Data Pegawai </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="profile-tab"
                        data-toggle="tab"
                        href="#profile"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false">Input Pencapaian</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade active show"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab">
                    <div class="col-md-12 col-sm-4 col-xs-12">
						<h3>HRD</h3>
						<div class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">                
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Divisi</label>
								<div class="col-md-9 col-sm-1 col-xs-12">
									<select class="form-control unitname">
										<option value="">Select Unit</option>
										@foreach ($showUnit as $listunit)
										<option value="{{ $listunit->id }}">{{ $listunit->divisi }}</option>
										@endforeach                    
									 </select>
								</div>
							</div>                  
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_nama" class="form-control">
										<option value="" disabled="true" selected="true">Choose Unit First</option>
									</select>
								</div>
							</div>						  
								@foreach ($roleHrd as $ele)
									<input id="f_role_id" type="hidden" value="{{ $ele->ROLE_ID }}">
								@endforeach
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Month</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_bulan" class="form-control">
										<option value="" >Choose Month</option>
										@foreach ($bulan as $listbulan)
										  <option value="{{ $listbulan->BULAN_ID }}">{{ $listbulan->BULAN }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">Year</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="f_tahun" class="form-control">
										<option value="">Choose Year</option>
										 @foreach ($tahun as $listtahun)
										  <option value="{{ $listtahun->TAHUN_ID }}">{{ $listtahun->TAHUN }}</option>
										@endforeach
									</select>
								</div>
							</div>                 
							<div class="form-group">
								<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
									<button class="btn btn-success pull-right btn-search-hrd">Search</button>
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
										<th class="table-head" >Action Bobot</th> 

									 </tr>
								</thead>
								<tbody class="result-search-hrd">

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
										<td style="text-align: center;">5</td>
									</tr>
									<tr>                          
										<td style="text-align: center;">B</td>
										<td style="text-align: center;">4</td>
									</tr>
									<tr>                          
										<td style="text-align: center;">C</td>
										<td style="text-align: center;">3</td>
									</tr>
									<tr>                          
										<td style="text-align: center;">D</td>
										<td style="text-align: center;">2</td>
									</tr>
									<tr>                          
										<td style="text-align: center;">E</td>
										  <td style="text-align: center;">1</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>					  
				</div>
                <div
                    class="tab-pane fade"
                    id="profile"
                    role="tabpanel"
                    aria-labelledby="profile-tab">
					<div class="col-md-12 col-sm-4 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>HRD</h2>
								<div class="clearfix"></div>

								<div class="form-horizontal form-label-left">

									<div class="form-group">
										<label class="control-label col-md-2 col-sm-3 col-xs-12">Divisi</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select class="form-control unitname1">
												<option value="">Select Unit</option>
												@foreach ($showUnit as $listunit)
												<option value="{{ $listunit->id }}">{{ $listunit->divisi }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2 col-sm-3 col-xs-12">Name</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select id="idemp" class="form-control">
												<option value="">Select Employee Name</option>
												<option value="" disabled="true" selected="true">Choose Unit First</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-3 col-xs-12">Month</label>
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
										<label class="control-label col-md-2 col-sm-3 col-xs-12">Year</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select id="idthn" class="form-control">
												<option value="">Choose Year</option>
												@foreach ($tahun as $listtahun)
												<option value="{{ $listtahun->TAHUN }}">{{ $listtahun->TAHUN }}</option>
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
								<table class="table table-striped table-bordered table-hover table-condensed">
									<thead>

										<tr>
											<th class="table-head">No</th>
											<th class="table-head">Area Kinerja Utama</th>
											<th class="table-head">Kpi</th>
											<th class="table-head">Bobot</th>
											<th class="table-head">Pencapaian</th>
										</tr>
									</thead>
									<tbody>
										<input type="hidden" id="countlist" value={{ $countlist }}>
											@php $no = 1; @endphp @foreach ($listInsert as $list)
											<tr>
												<td>@php echo $no++ @endphp</td>
												<input class="list_id{{ $no }}" type="hidden" value={{$list->LIST_ID}}>
												<td>{{ $list->KINERJA_NAME }}</td>
												<td>{{ $list->KPI_NAME }}</td>
												<td>{{ $list->BOBOT_GP }}</td>
												<td>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<select class="form-control bobot_list{{ $no }}">
															<option value="">Choose Score</option>
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</div>
												</td>
											</tr>
											@endforeach @foreach ($roleHrd as $ele)
											<input id="role_id_inst" type="hidden" value="{{ $ele->ROLE_ID }}">
											@endforeach
									</tbody>
								</table>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="text-align: center;">Alfabet</th>
											<th style="text-align: center;">Skor</th>
										</tr>
										</thead>
									<tbody>
										<tr>
											<td style="text-align: center;">A</td>
											<td style="text-align: center;">5</td>
										</tr>
										<tr>
											<td style="text-align: center;">B</td>
											<td style="text-align: center;">4</td>
										</tr>
										<tr>
											<td style="text-align: center;">C</td>
											<td style="text-align: center;">3</td>
										</tr>
										<tr>
											<td style="text-align: center;">D</td>
											<td style="text-align: center;">2</td>
										</tr>
										<tr>
											<td style="text-align: center;">E</td>
											<td style="text-align: center;">1</td>
										</tr>
									</tbody>
								</table>
								<h3>Kritik dan Saran</h3>
									<div class="form-group">
										<textarea class="form-control" rows="5" id="comment"></textarea>
									</div>
									<div class="form-group">
										<div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
											<button id="btn-input-hrd" class="btn btn-success pull-right">Submit</button>
										</div>
									</div>
							</div>
						</div>
					</div>
                </div>
                <div
                    class="tab-pane fade"
                    id="contact"
                    role="tabpanel"
                    aria-labelledby="contact-tab">
                    xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                    coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next
                    level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                    booth letterpress, commodo enim craft beer mlkshk
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

<script type="text/javascript">
$(document).ready(function(){ 

  // CSRF Setup
  $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
		$(this).on('click', '.UpdatePenilaian', function(e){
			  var splt = $(this).val().split('*');
			  if (splt[2]==null||splt[2]=='-'){
						alert('Plese Insert Value');
			  }else{
				$('#modal_hrd_edit').modal('show');
			}
		});
		$(this).on('click', '.button_hrd_edit', (function(e){	
			//alert($(this).attr('data-index'));
			var splt = $(this).val().split('*');
			$("#tb_hr_id").val(splt[0]);
			$("#tb_hr_nama").val(splt[1]);
			$("#tb_hr_nilai").val(splt[2]);
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
		$('.btn-update-nilai_hrd').click(function(){
			    				
			var String_hr_id   = $("#tb_hr_id").val();
			var String_hr_nilai = $(".tb_hr_nilai option:Selected").val();
			console.log(String_hr_nilai);
			var val = {'hr_id': String_hr_id, 'hr_nilai' : String_hr_nilai};		
			  $.ajax({
              url : baseUrl +'/hrd/update',
              type: 'POST',
              data: val,      
              dataType: 'json',
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              success:function(r){
               
                 $('#modal_hrd_edit').modal('hide');
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
          url   :'{{URL::to('getEmployeeFromUnithrd')}}',
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
				var string_Nik = data[i].id_pegawai;
				op+='<option value="'+data[i].id_pegawai+'">'+data[i].nama+'</option>';
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
          url   :'{{URL::to('getEmployeeFromUnithrd')}}',
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
						var string_Nik = data[i].id_pegawai;
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

  function count_total(angka){
    var nilai_awal = 0;
    var nilai_sementara = nilai_awal + angka;
    var nilai_awal = nilai_sementara;
   
    return nilai_sementara;
  }

  $(this).on('click', '.btn-search-hrd',function(e){
      var nama = $('#f_nama').val();
      var tahun = $('#f_tahun').val();
      var bulan = $('#f_bulan').val();
      var role = $('#f_role_id').val();
      
      if( nama == "" || tahun == "" || bulan == ""){
          $("#error1").html("Your Data is not complete!");
          $('#myModal1').modal("show");
      }else{

          $.ajax({              
              url : "{{url('/hrd/search')}}",
              type: 'POST',
              data: {'nama': nama, 'tahun' : tahun, 'bulan' : bulan, 'role' : role},
              dataType: 'json',
              beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
              },
              success:function(r){
                  var t = '';
                  var no = 1;
                  var na = 0;
                  var tn;
                  $('.result-search-hrd tr').remove();
                  $.each(r.content, function(k, v){

                      t += '<tr>';
                      t += '<td style="text-align:center">'+no+'</td>';
                      t += '<td>' + v.KINERJA_NAME + '</td>';
                      t += '<td>' + v.KPI_NAME + '</td>';
                      t += '<td style="text-align:center">' + v.BOBOT + '</td>';
					  t += '<td style="text-align:center">' + v.BOBOT_GP + '</td>';//PENCAPAIAN
					  t	+= '<td><center>';
					  t	+= 		'</i><button   type="button" class="btn UpdatePenilaian btn-primary button_hrd_edit" data-toggle="modal"  value="'+ v.HASIL_KINERJA_ID +'*' + v.KINERJA_NAME + '*' + v.BOBOT + '"><i class="fa fa-edit">Update</button>';
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
                  t += '<td class="table-head" colspan="2" style="text-align:center">TOTAL</td>';
                  t += '<td class="table-head" colspan="4" style="text-align:center">'+tn+'</td>';
				  
                  t += '</tr>';                
                  
                  $('.result-search-hrd').append(t);
              },
                complete: function(){
                 $('.ajax-loader').css("visibility", "hidden");
               }  
          });
      }
  });

  $('#contt').hide();
  $('#openContainer').click(function(){
	  
    var nama = $('#idemp').val();
    var bulan = $('#idbln').val();
    var tahun = $('#idthn').val();
console.log(tahun);
    if(nama == "" || bulan == "" || tahun == ""){     
      $("#error1").html("Your Data is not complete!");
      $('#myModal1').modal("show");
      $('#contt').hide();
       
    }else{
      $('#contt').show();
    }

  });

  $('#btn-input-hrd').click(function(){
    
    var nama = $('#idemp').val();
    var bulan = $('#idbln').val();
    var tahun = $('#idthn').val();
    var kritik = $('#comment').val();
    var roles = $('#role_id_inst').val();
    var na = 0;
    var tn;
    var countlist = $('#countlist').val();
    var x = [];
    var flag = "bobotOk"; 
    
    if(kritik.length < 20){
      /*
        $("#error1").html("The number of characters your fill is "+kritik.length+".</br>you must fill more than 20 characters");
        $('#myModal1').modal("show");*/
		Swal.fire("The number of characters your fill is "+kritik.length+".</br>you must fill more than 20 characters")


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
              url : "{{url('/hrd/input')}}",
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

      }else{          
        $("#error1").html("Please check again, there is an empty assessment!");
        $('#myModal1').modal("show");
      }

    }

  });

});
</script>
@stop
