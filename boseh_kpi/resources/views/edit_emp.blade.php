@extends('layouts.master')

@section('content')

<div class="" role="tabpanel" data-example-id="togglable-tabs">

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <br>
        <!-- start recent activity -->
        <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
      <h3>Input Employee</h3>
      <div class="clearfix"></div>

    <div class="form-horizontal form-label-left">
      
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">NIK</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="number" class="form-control" id="emp-no">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">User Role</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select id="emp-role" class="form-control rolename">
              <option value="">Select User Role</option>
              @foreach ($showRole as $listrole)
                <option value="{{ $listrole->ROLE_ID }}">{{ $listrole->ROLE_NAME }}</option>
              @endforeach                    
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Unit</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select id="emp-unit" class="form-control unitname">
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
          <input type="text" class="form-control" id="emp-name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Email</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="email" class="form-control" id="emp-email">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Title</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" id="emp-title">
        </div>
      </div>    
	  <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Year In</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control year" value="{{date('Y')}}" id="year" readonly>
        </div>
      </div>
	  <hr>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Username</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" id="emp-username">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Password</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="password" class="form-control" id="emp-password">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Confirm Password</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="password" class="form-control" id="emp-passconf">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">     
          <button id="btn-input-emp" class="btn btn-success pull-right">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>



<script type="text/javascript">

$('#btn-input-emp').click(function(){

    var noemp    = $('#emp-no').val();
    var role     = $('.rolename').val();  
    var unit     = $('.unitname').val();  
    var name     = $('#emp-name').val();
    var email    = $('#emp-email').val();
    var title    = $('#emp-title').val();
    var username = $('#emp-username').val();
    var pass     = $('#emp-password').val();
    var passcon  = $('#emp-passconf').val();    
    var tahun    = $('#year').val();    
    
    if(role == "" || unit == "" || name == "" || email == ""  || title == "" || username == "" || pass =="" || passcon ==""){
    
        $("#error1").html("Your Data is not complete!");
        $('#myModal1').modal("show");
    
    }else if(pass != passcon){
    
        $("#error1").html("Password and Confirmation Password is incorrect!");
        $('#myModal1').modal("show");
    
    }else{
        
       $.ajax({
            url : baseUrl +'/input_emp/input',
            type: 'POST',
            data: {'noemp':noemp, 'role':role, 'unit':unit, 'name':name, 'email':email ,'title':title, 'username':username, 'pass':pass, 'passcon':passcon,'tahun':tahun},
            dataType: 'json',
            success:function(r){
                if(r.msg == 'Success Insert'){
                  $("#error2").html(r.msg);
                  $('#myModal2').modal("show");
                  setTimeout(function(){
                    location.reload(true); 
                  }, 1000); 
                }else{
                  $('#myModal2').modal("show");
				}
            }
        });
    }
});

</script>

@endsection