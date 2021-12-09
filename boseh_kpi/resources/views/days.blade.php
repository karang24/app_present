@extends('layouts.master')

@section('content')

<div class="col-md-12 col-sm-4 col-xs-12">
    <div class="x_panel">      
        <div class="x_title">
            <h3>Days Project</h3>
            <div class="clearfix"></div>
            <div class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if (Auth::user()->ROLE_ID == '1' || Auth::user()->ROLE_ID == '2' || Auth::user()->ROLE_ID == '3' || Auth::user()->ROLE_ID == '5'|| Auth::user()->ROLE_ID == '6' || Auth::user()->ROLE_ID == '7' || Auth::user()->ROLE_ID == '8')            
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
                    <select class="form-control empname">
                      <option value="" disabled="true" selected="true">Choose Unit First</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-3 col-xs-12">Year</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control year">
                      <option value="">Choose Year</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
                    <button class="btn btn-success pull-right btn-search-days">Search</button>
                  </div>
                </div> 
            @else
                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-3 col-xs-12">Year</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control year">
                      <option value="">Choose Year</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
                    <button class="btn btn-success pull-right btn-search-days-emp">Search</button>
                  </div>
                </div>
            @endif
            </div>
        </div>      
        <div class="x_content">
            	<table class="table table-bordered">
                <thead>
                  <tr>
                    <th rowspan="2" class="table-head" >Project Name</th>
                    <th colspan="2" class="table-head" >Days Of Project</th>
                  </tr>                    
                  <tr>
                    <th class="table-head" >Jabatan</th>
                    <th class="table-head" >Work Duration</th>
                  </tr>
                </thead>
                @if (Auth::user()->ROLE_ID == '1' || Auth::user()->ROLE_ID == '2' || Auth::user()->ROLE_ID == '3' || Auth::user()->ROLE_ID == '5'|| Auth::user()->ROLE_ID == '6' || Auth::user()->ROLE_ID == '7' || Auth::user()->ROLE_ID == '8')
                  <tbody class="result-search-days">
    
                  </tbody>
                @else
                  <tbody class="result-search-days-emp">
      
                  </tbody>
                {{-- <tbody>
                    @foreach ($data as $list)
                    <tr>
                        <td>{{ $list->project_name }}</td>
                        <td>{{ $list->project_role_emp }}</td>
                        <td>{{ $list->WORK_DURATION }}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td class ="table-head" colspan="2" style="text-align: center; font-weight: bold;">TOTAL</td>
                      <td>
                        @foreach ($data1 as $list)
                          {{ $list->TOTAL }}
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                       <td colspan="1" style="color: white">a</td>
                    </tr>
                    <tr>
                       <td>Total Days Dalam Project &nbsp &nbsp:</td>
                       <td colspan="2"></td>
                    </tr>
                    @foreach ($totalDays as $ele)               
                    <tr>
                        <td style="font-weight: bolder;">{{ $ele->project_role_emp }}</td>
                        <td colspan="2" style="text-align: center;">{{ $ele->tot_kerja }}</td>           
                    </tr>
                    @endforeach
                    <tr>
                       <td>Total Jumlah Project Per Tahun:</td>
                       <td colspan="2" style="text-align: center;">
                         @foreach ($dataPekerjaan as $list)
                            {{ $list->total_prjct }}
                          @endforeach
                       </td>
                    </tr>
                    <tr>
                       <td>Total ManDays Dibagi Total Hari Kerja:</td>
                       <td colspan="2" style="text-align: center;">
                         @foreach ($finalDays as $list)
                            {{ $list->final }}
                          @endforeach
                       </td>
                    </tr>
                    <tr>
                       <td>Skor II:</td>
                       <td colspan="2" style="text-align: center;">
                          @foreach ($fixDays as $list)
                            {{ $list->fixdays }}
                          @endforeach
                       </td>
                    </tr>
                </tbody> --}}
                @endif
            </table>

            <table class="table table-bordered">
                <thead>
                   <tr>
                      <th class="table-head" >Parameter Poin</th>
                      <th class="table-head" >Skor</th>
                   </tr>
                </thead>
                <tbody>
                   <tr>
                      <td>1,7 -2</td>
                      <td>11</td>
                   </tr>
                   <tr>
                      <td>1,3 - 1,6</td>
                      <td>10</td>
                   </tr>
                   <tr>
                      <td>1,0 - 1,2</td>
                      <td>9</td>
                   </tr>
                   <tr>
                      <td>0,7 - 0,9</td>
                      <td>8</td>
                   </tr>
                   <tr>
                      <td>0,3 - 0,6</td>
                      <td>7</td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

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

  $('.btn-search-days-emp').click(function(){

      var year =  $('.year').val();

    if(year == "" || year == null){
      
      $("#error1").html("Year must be filled!");
      $('#myModal1').modal("show");

    }else{

      $.ajax({
          url : baseUrl +'/days-emp/search',
          type: 'POST',
          data: {'year':year},
          dataType: 'json',
          beforeSend: function(){

              $('.ajax-loader').css("visibility", "visible");

          },
          success:function(r){
              var t = '';
              var na = 0;
              var tn;

              $('.result-search-days-emp tr').remove();
              $.each(r.content, function(k, v){
                  t += '<tr>';
                  t +=    '<td>' +v.project_name+'</td>';
                  t +=    '<td>' + v.project_role_emp + '</td>';
                  t +=    '<td>' + v.WORK_DURATION + '</td>';
                  // t +=    '</td>'+count_total(v.WORK_DURATION)+'</td>';
                  t += '</tr>'                  
                  // tn = na + v.WORK_DURATION;
                  // na = tn;    
              });
              $.each(r.contentempat, function(k, v){
                  t += '<tr>';
                  t +=    '<td class ="table-head" colspan="2" style="text-align: center; font-weight: bold;">TOTAL</td>';
                  t +=    '<td>'+v.tot_WD+'</td>';
                  t += '</tr>';
              });
                  t += '<tr>';
                  t +=    '<td colspan="1" style="color: white">a</td>';
                  t += '</tr>';
                  t += '<tr>';
                  t +=    '<td style="text-decoration: underline;">Total Days Dalam Project &nbsp &nbsp:</td>';
                  t +=    '<td colspan="2"></td>';                  
                  t +=  '</tr>';
              $.each(r.contenttiga, function(k, v){                  
                  t += '<tr>';
                  t +=   '<td style="font-weight: bolder;">'+v.project_role_emp+'</td>';
                  t +=   '<td colspan="2" style="text-align: center;">'+v.tot_kerja+'</td>';           
                  t += '</tr>';
              });
                  t += '<tr>';
                  t += '<td colspan="3"></td>';                  
                  t += '</tr>';
              $.each(r.contentdua, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Total Jumlah Project Per Tahun</td>';
                  t +=     '<td colspan="2" style="text-align: center;">'+v.total_prjct+'</td>';
                  t +=  '</tr>';
              });
              $.each(r.contentlima, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Total ManDays Dibagi Total Hari Kerja:</td>';
                  t +=     '<td colspan="2" style="text-align:center;">'+v.final+'</td>';
                  t +=  '</tr>';
              });              
              $.each(r.contentenam, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Skor II:</td>';
                  t +=     '<td colspan="2" style="text-align:center;">'+v.fixdays+'</td>';
                  t +=  '</tr>';
              });
                $('.result-search-days-emp').append(t);
          },
            complete: function(){
                $('.ajax-loader').css("visibility", "hidden");
            }  

      });

    }

  });

  $('.btn-search-days').click(function(){
    
    var emp_id =  $('.empname').val();
    var year =  $('.year').val();

    if(emp_id == "" || emp_id == null || year == "" || year == null){
      $("#error1").html("Employee Name must be filled!");
      $('#myModal1').modal("show");
    }else{

      $.ajax({
          url : baseUrl +'/days/search',
          type: 'POST',
          data: {'emp_id': emp_id , 'year':year},
          dataType: 'json',
          beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
          },
          success:function(r){
              var t = '';
              var na = 0;
              var tn;

              $('.result-search-days tr').remove();
              $.each(r.content, function(k, v){
                  t += '<tr>';
                  t +=    '<td>' +v.project_name+'</td>';
                  t +=    '<td>' + v.project_role_emp + '</td>';
                  t +=    '<td>' + v.WORK_DURATION + '</td>';
                  // t +=    '</td>'+count_total(v.WORK_DURATION)+'</td>';
                  t += '</tr>'                  
                  // tn = na + v.WORK_DURATION;
                  // na = tn;    
              });
              $.each(r.contentempat, function(k, v){
                  t += '<tr>';
                  t +=    '<td colspan="2" class="table-head" style="text-align: center; font-weight: bold;">TOTAL</td>';
                  t +=    '<td class="table-head">'+v.tot_WD+'</td>';
                  t += '</tr>';
              });
                  t += '<tr>';
                  t +=    '<td colspan="1" style="color: white">a</td>';
                  t += '</tr>';
                  t += '<tr>';
                  t +=    '<td style="text-decoration: underline;">Total Days Dalam Project &nbsp &nbsp:</td>';
                  t +=    '<td colspan="2"></td>';                  
                  t +=  '</tr>';
              $.each(r.contenttiga, function(k, v){                  
                  t += '<tr>';
                  t +=   '<td style="font-weight: bolder;">'+v.project_role_emp+'</td>';
                  t +=   '<td colspan="2" style="text-align: center;">'+v.tot_kerja+'</td>';           
                  t += '</tr>';
              });
                  t += '<tr>';
                  t += '<td colspan="3"></td>';                  
                  t += '</tr>';
              $.each(r.contentdua, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Total Jumlah Project Per Tahun</td>';
                  t +=     '<td colspan="2" style="text-align: center;">'+v.total_prjct+'</td>';
                  t +=  '</tr>';
              });
              $.each(r.contentlima, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Total ManDays Dibagi Total Hari Kerja:</td>';
                  t +=     '<td colspan="2" style="text-align:center;">'+v.final+'</td>';
                  t +=  '</tr>';
              });              
              $.each(r.contentenam, function(k, v){
                  t +=  '<tr>';
                  t +=     '<td>Skor II:</td>';
                  t +=     '<td colspan="2" style="text-align:center;">'+v.fixdays+'</td>';
                  t +=  '</tr>';
              });
                $('.result-search-days').append(t);
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