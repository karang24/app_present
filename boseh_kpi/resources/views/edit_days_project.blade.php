@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
      <li role="presentation" class="active">
        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Forget Start Project</a>
      </li>
        <li role="presentation" class="">
            <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Forget Pause Project</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Forget Stop Project</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <br>
        <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Forget Start Project</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">                
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control projectname">
            <option value="">Select Project Name</option>
               @foreach ($listproject as $ele)
                  <option value="{{ $ele->PROJECT_DETAIL_ID }}">{{ $ele->PROJECT_NAME }}</option>
               @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control employeename">
              <option value="" disabled="true" selected="true">Choose Project Name First</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Start Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control startdate">
        </div>
      </div>     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-forget-start" class="btn btn-success pull-right">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
       <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Forget Pause Project</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">                
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control projectpause">
            <option value="">Select Project Name</option>
               @foreach ($listproject as $ele)
                  <option value="{{ $ele->PROJECT_DETAIL_ID }}">{{ $ele->PROJECT_NAME }}</option>
               @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control employeename_pause">
            <option value="" disabled="true" selected="true">Choose Project Name First</option>            
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Pause Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control pausedate">
        </div>
      </div>     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-forget-pause" class="btn btn-success pull-right">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
       <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Forget Stop Project</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">                
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control projectstop">
            <option value="">Select Project Name</option>
               @foreach ($listproject as $ele)
                  <option value="{{ $ele->PROJECT_DETAIL_ID }}">{{ $ele->PROJECT_NAME }}</option>
               @endforeach     
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
           <select class="form-control employeename_stop">
            <option value="" disabled="true" selected="true">Choose Project Name First</option>            
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Stop Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control stopdate">
        </div>
      </div>     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-forget-stop" class="btn btn-success pull-right">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>


</div>

<script type="text/javascript">
$(document).ready(function(){

  $('.startdate').datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
  });
  $('.pausedate').datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
  });
  $('.stopdate').datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'
  });
  

  $('.projectname').change(function(){

    var id = $('.projectname').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
				var string_Nik = data[i].EMPLOYEE_ID;
				op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
            }
          }
                             
          $('.employeename').append(op);
                    
        }
    });

  });

  $('.projectpause').change(function(){
    
    var id = $('.projectpause').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename_pause option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
				var string_Nik = data[i].EMPLOYEE_ID;
				op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
            }
          }
                             
          $('.employeename_pause').append(op);
                    
        }
    });
  });

  $('.projectstop').change(function(){
    
    var id = $('.projectstop').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename_stop option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
				var string_Nik = data[i].EMPLOYEE_ID;
				op+='<option value="'+data[i].EMPLOYEE_ID+'">'+string_Nik+'//'+data[i].EMPLOYEE_NAME+'</option>';
            }
          }
                             
          $('.employeename_stop').append(op);
                    
        }
    });
  });  

  $('#btn-forget-start').click(function(){

      var projectid = $('.projectname').val();
      var empid     = $('.employeename').val();
      var startdate = $('.startdate').val();

      if(projectid == "" || empid == "" || startdate == ""){
          $("#error1").html("Your Data is not complete!");
          $('#myModal1').modal("show");
      }else{
      
        $.ajax({
            url : baseUrl +'/forgetstart/input',
            type: 'POST',
            data: {'projectid':projectid,'empid':empid,'startdate':startdate},      
            dataType: 'json',
            success:function(r){

              if(r.msg == 'Success Insert'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
            
            }
        });

      }

  });

  $('#btn-forget-pause').click(function(){

      var projectid = $('.projectpause').val();
      var empid     = $('.employeename_pause').val();
      var pausedate = $('.pausedate').val();

      if(projectid == "" || empid == "" || pausedate == ""){

          $("#error1").html("Your Data is not complete!");
          $('#myModal1').modal("show");

      }else{
        
        $.ajax({
            url : baseUrl +'/forgetpause/input',
            type: 'POST',
            data: {'projectid':projectid,'empid':empid,'pausedate':pausedate},      
            dataType: 'json',
            success:function(r){

              if(r.msg == 'Success Insert'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
            
            }
        });

      }

  });

  $('#btn-forget-stop').click(function(){

      var projectid = $('.projectstop').val();
      var empid     = $('.employeename_stop').val();
      var stopdate = $('.stopdate').val();

      if(projectid == "" || empid == "" || stopdate  == ""){

          $("#error1").html("Your Data is not complete!");
          $('#myModal1').modal("show");

      }else{
        
        $.ajax({
            url : baseUrl +'/forgetstop/input',
            type: 'POST',
            data: {'projectid':projectid,'empid':empid,'stopdate':stopdate},      
            dataType: 'json',
            success:function(r){

              if(r.msg == 'Success Insert'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
            
            }
        });

      }

  });

    

  

});
</script>
@endsection