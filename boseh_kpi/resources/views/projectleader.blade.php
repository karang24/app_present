@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">View Employee</a>
      </li>
      @if (Auth::user()->role == 'PL' || Auth::user()->role == 'Admin')
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
      <h3>Project Leader</h3> <br>
      
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">               
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Nama</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" id="f_nama">
            <option value="">Select Employee Name</option>
            @foreach ($EmployeeName as $list)
              <option value="{{ $list->EMPLOYEE_ID}}">{{ $list->EMPLOYEE_NAME}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      @foreach ($rolepl as $ele)
          <input id="f_role_id" type="hidden" value="{{ $ele->ROLE_ID }}">
       @endforeach

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Bulan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" id="f_bulan">
            <option value="">Choose Bulan</option>
            @foreach ($bulan as $listbulan)
              <option value="{{ $listbulan->BULAN_ID }}">{{ $listbulan->BULAN }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" id="f_tahun">
             <option value="">Choose Tahun</option>
            @foreach ($tahun as $listtahun)
              <option value="{{ $listtahun->TAHUN_ID }}">{{ $listtahun->TAHUN }}</option>
            @endforeach
          </select>
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
          <button class="btn btn-success pull-right btn-search-pl">Search</button>
        </div>
      </div>
    </div>

    </div>
    <div class="x_content">
                <table class="table table-bordered">
                <thead>
              <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Area Kinerja Utama</th>
                <th style="text-align: center">KPI</th>
                <th style="text-align: center">BOBOT</th>
              </tr>
              </thead>
              <tbody class="result-search-pl">
              
              </tbody>
            </table>

            <table class="table table-bordered">
            <thead>
               <tr>
                 <th>No</th>
                 <th>Alfabet</th>
                 <th>Skor</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                  <td>1</td>
                  <td>A</td>
                  <td>2</td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>B</td>
                  <td>1</td>
               </tr>
               <tr>
                  <td>3</td>
                  <td>C</td>
                  <td>0</td>
               </tr>
               <tr>
                  <td>4</td>
                  <td>D</td>
                  <td>-1</td>
               </tr>
               <tr>
                  <td>5</td>
                  <td>E</td>
                  <td>-2</td>
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
      <h2>Project Leader</h2>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">               
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Nama</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select id="idemp" class="form-control">
            <option value="">Select Employee Name</option>
            @foreach ($EmployeeName as $list)
              <option value="{{ $list->EMPLOYEE_ID}}">{{ $list->EMPLOYEE_NAME}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Bulan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select id="idbln" class="form-control">
            <option value="">Choose Bulan</option>
            @foreach ($bulan as $listbulan)
              <option value="{{ $listbulan->BULAN_ID }}">{{ $listbulan->BULAN }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select id="idthn" class="form-control">
             <option value="">Choose Tahun</option>
            @foreach ($tahun as $listtahun)
              <option value="{{ $listtahun->TAHUN_ID }}">{{ $listtahun->TAHUN }}</option>
            @endforeach
          </select>
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
          <button class="btn btn-success pull-right" id="openContainer">Search</button>
        </div>
      </div>
    </div>
 </div>
 
<div class="container" style="visibility: hidden;" id="contt">
  <h3>Form Penilaian Karyawan</h3>
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>No</th>
        <th>Area Kinerja Utama</th>
        <th>Kpi</th>
        <th>Bobot</th>
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
      
        <td>
          <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control bobot_list{{ $no }}">
           <option value=0>Choose Score</option>
            <option value=5>A</option>
            <option value=4>B</option>
            <option value=3>C</option>
            <option value=2>D</option>
            <option value=1>E</option>
          </select>
        </div>
        </td>
      </tr>
      @endforeach
  @foreach ($rolepl as $ele)
            <input id="role_id_inst" type="hidden" value="{{ $ele->ROLE_ID }}">
      @endforeach
    </tbody>
  </table>

  <h3>Kritik dan Saran</h3>

  <div class="form-group">      
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    
    <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
          <button id="btn-input-pl" class="btn btn-success pull-right">Submit</button>
        </div>
      </div>

</div>
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

    function count_total(angka){

      var nilai_awal = 0;
      var nilai_sementara = nilai_awal + angka;
      var nilai_awal = nilai_sementara;
    
      return nilai_sementara;
    }

    function keterangan_bobot(nilai){
      var res;
        if(nilai==5){
            res = 'A';
        }
        else if(nilai==4){
          res = 'B';
        }
        else if(nilai==3){
          res = 'C';
        }
        else if(nilai==2){
          res = 'D';
        }
        else if(nilai==1){
          res = 'E';
        }else{
          res ='-';
        }
      return res;
    }

    $(this).on('click', '.btn-search-pl',function(e){
        var nama = $('#f_nama').val();
        var tahun = $('#f_tahun').val();
        var bulan = $('#f_bulan').val();
        var role = $('#f_role_id').val();

        if( nama == "" || tahun == "" || bulan == ""){
            $("#error1").html("Your Data is not complete!");
            $('#myModal1').modal("show");
        }else{

            $.ajax({
                url : baseUrl +'/pl/search',
                type: 'POST',
                data: {'nama': nama, 'tahun' : tahun, 'bulan' : bulan , 'role' : role},
                dataType: 'json',
                success:function(r){
                    var t = '';
                    var no = 1;
                    var na = 0;
                    var tn;
                    $('.result-search-pl tr').remove();
                    $.each(r.content, function(k, v){
                        t += '<tr>';
                        t += '<td style="text-align:center">'+no+'</td>';
                        t += '<td>' + v.KINERJA_NAME + '</td>';
                        t += '<td>' + v.KPI_NAME + '</td>';
                        t += '<td style="text-align:center">' + keterangan_bobot(v.BOBOT) + '</td>';
                        t += '</td>'+ count_total(v.BOBOT) + '</td>';
                        t += '</tr>';
                        tn = na + v.BOBOT;
                        na = tn;
                        no++;
                    });
                    t += '<tr>';
                    t += '<td colspan="2" style="text-align:center">TOTAL</td>';
                    t += '<td colspan="2" style="text-align:center">'+tn+'</td>';
                    t += '</tr>';                
                    
                    $('.result-search-pl').append(t);
                }  
            });
        }
    });
    //e.preventDefault();
})

$('#contt').show();
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

$('#btn-input-pl').click(function(){
  var nama = $('#idemp').val();
  var bulan = $('#idbln').val();
  var tahun = $('#idthn').val();
  var kritik = $('#comment').val();
  var roles = $('#role_id_inst').val();
  var na = 0;
  var tn;
  var countlist = $('#countlist').val();
  var x = [];

  if(kritik.length < 300){
    
    $("#error2").html("Kritik dan saran anda kurang dari 300 karakter");
    $('#myModal2').modal("show");

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
      
      no ++;
    
    }

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
        url : baseUrl +'/pl/input',
        type: 'POST',
        data: data, 
        //JSON.stringify(data),
        dataType: 'json',
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
        }
    });  
  }

});

</script>
@endsection