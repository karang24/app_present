@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs col-md-12 col-sm-4 col-xs-12" role="tablist">
      <li role="presentation" class="active">
        <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Touched Start Project</a>
      </li>
        <li role="presentation" class="">
            <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Touched Pause Project</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Touched Stop Project</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <br>
        <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Touched Start Project</h3>
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
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Choose Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">          
          <select class="form-control startdate">              
            <option value="" disabled="true" selected="true">Choose Employee Name First</option>
          </select>
        </div>
      </div>     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-touch-start" class="btn btn-success pull-right">Update</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
       <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Touched Pause Project</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">                
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control projectname1">
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
          <select class="form-control employeename1">
            <option value="" disabled="true" selected="true">Choose Project Name First</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Choose Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">          
           <select class="form-control pausedate">              
            <option value="" disabled="true" selected="true">Choose Employee Name First</option>
          </select>
        </div>
      </div>     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-touch-pause" class="btn btn-success pull-right">Update</button>
        </div>
      </div>
    </div> 
  </div>
</div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
       <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Touched Stop Project</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">                
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Project Name</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control projectname2">
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
          <select class="form-control employeename2">
            <option value="" disabled="true" selected="true">Choose Employee Name First</option>
          </select>
        </div> 
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Choose Date</label>
        <div class="col-md-9 col-sm-9 col-xs-12">          
          <select class="form-control stopdate">              
            <option value="" disabled="true" selected="true">Choose Employee Name First</option>
          </select>
        </div>
      </div>          
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-touch-stop" class="btn btn-success pull-right">Update</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>


</div>

<script type="text/javascript">


$('.projectname').change(function(){

    var id = $('.projectname').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee_touch')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].EMPLOYEE_ID+'">'+data[i].EMPLOYEE_NAME+'</option>';

            }
          }
                             
          $('.employeename').append(op);
                    
        }
    });

 });

$('.employeename').change(function(){

   var pd_id  = $('.projectname').val();
   var emp_id = $('.employeename').val();
   var op = "";

   $.ajax({

        type  :'get',
        url   :'{{URL::to('getTimelapsStart')}}',
        data  : {'pd_id':pd_id, 'emp_id':emp_id},
        success:function(data){

          $('.startdate option').remove();

          if(data.length == ""){
            op+='<option value="" >No data found..</option>';
          }else{

            op+='<option value="" >Choose Date</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].TIMELAPS+'">'+data[i].TIMELAPS+'</option>';
              
            }
          }

          $('.startdate').append(op);

        }
   });
    
});

$('.projectname1').change(function(){

    var id = $('.projectname1').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee_touch')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename1 option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].EMPLOYEE_ID+'">'+data[i].EMPLOYEE_NAME+'</option>';

            }
          }
                             
          $('.employeename1').append(op);
                    
        }
    });

 });

$('.employeename1').change(function(){

   var pd_id  = $('.projectname1').val();
   var emp_id = $('.employeename1').val();
   var op = "";

   $.ajax({

        type  :'get',
        url   :'{{URL::to('getTimelapsPause')}}',
        data  : {'pd_id':pd_id, 'emp_id':emp_id},
        success:function(data){

          $('.pausedate option').remove();

          if(data.length == ""){
            op+='<option value="" >No data found..</option>';
          }else{

            op+='<option value="" >Choose Date</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].TIMELAPS+'">'+data[i].TIMELAPS+'</option>';
              
            }
          }

          $('.pausedate').append(op);

        }
   });
    
});

$('.projectname2').change(function(){

    var id = $('.projectname2').val();
    var op = "";

    $.ajax({
          
        type  :'get',
        url   :'{{URL::to('getEmployee_touch')}}',
        data  : {'id':id},
        success:function(data){
          
          $('.employeename2 option').remove();

          if(data.length == ""){
            op+='<option value="" >Empty</option>';
          }else{

            op+='<option value="" >Choose Employee</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].EMPLOYEE_ID+'">'+data[i].EMPLOYEE_NAME+'</option>';

            }
          }
                             
          $('.employeename2').append(op);
                    
        }
    });

 });

$('.employeename2').change(function(){

   var pd_id  = $('.projectname2').val();
   var emp_id = $('.employeename2').val();
   var op = "";

   $.ajax({

        type  :'get',
        url   :'{{URL::to('getTimelapsStop')}}',
        data  : {'pd_id':pd_id, 'emp_id':emp_id},
        success:function(data){

          $('.stopdate option').remove();

          if(data.length == ""){
            op+='<option value="" >No data found..</option>';
          }else{

            op+='<option value="" >Choose Date</option>';
            for(var i = 0 ; i < data.length ; i++){
              op+='<option value="'+data[i].TIMELAPS+'">'+data[i].TIMELAPS+'</option>';
              
            }
          }

          $('.stopdate').append(op);

        }
   });
    
});



$('#btn-touch-start').click(function(){

    var pd_id     = $('.projectname').val();
    var emp_id    = $('.employeename').val();
    var startdate = $('.startdate').val();

    if(pd_id == "" || emp_id == "" || startdate == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{
    
      $.ajax({
          url : baseUrl +'/touchstart/del',
          type: 'POST',
          data: {'pd_id':pd_id,'emp_id':emp_id,'startdate':startdate},      
          dataType: 'json',
          success:function(r){

            if(r.msg == 'Success Update'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
          
          }
      });
    }
});

$('#btn-touch-pause').click(function(){

    var pd_id     = $('.projectname1').val();
    var emp_id    = $('.employeename1').val();
    var pausedate = $('.pausedate').val();

    if(pd_id == "" || emp_id == "" || pausedate == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{
    
      $.ajax({
          url : baseUrl +'/touchpause/del',
          type: 'POST',
          data: {'pd_id':pd_id,'emp_id':emp_id,'pausedate':pausedate},      
          dataType: 'json',
          success:function(r){

            if(r.msg == 'Success Update'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
          
          }
      });
    }
});

$('#btn-touch-stop').click(function(){

    var pd_id     = $('.projectname2').val();
    var emp_id    = $('.employeename2').val();
    var stopdate = $('.stopdate').val();

    if(pd_id == "" || emp_id == "" || stopdate == ""){
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    }else{
    
      $.ajax({
          url : baseUrl +'/touchstop/del',
          type: 'POST',
          data: {'pd_id':pd_id,'emp_id':emp_id,'stopdate':stopdate},      
          dataType: 'json',
          success:function(r){

            if(r.msg == 'Success Update'){$("#error2").html(r.msg);$('#myModal2').modal("show");}
          
          }
      });
    }
});

</script>
@endsection