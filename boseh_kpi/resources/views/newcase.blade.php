@extends('layouts.master')

@section('content')

<div class="col-md-12 col-sm-4 col-xs-12">
    <div class="x_panel">      
        <div class="x_title">
          <h3>Input Days Project Manual</h3>
            <div class="clearfix"></div><br>
            <div class="form-horizontal form-label-left">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control empname">
                      <option value="" disabled="true" selected="true">Choose Unit First</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-1 col-sm-3 col-xs-12">Project</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control prjctname">
                      <option value="" disabled="true" selected="true">Choose Employee First</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-1 col-sm-3 col-xs-12">Employee Project Role</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control empprjctrole">
                      <option value="">Select Employee Project Role</option>
                          @foreach ($showProjectRole as $listrole)
                              <option value="{{ $listrole->LIST_PROJECT_ROLE_ID }}">{{ $listrole->PROJECT_ROLE_EMP }}</option>
                          @endforeach                    
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-3 col-xs-12">Date</label>                  
                  <div class="col-xs-4 containerDate">
                      <div class="form-inline"><button class="pull-left btn-info add_field"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      <div><input type="text" class="form-control date1"></div></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="hidden" class="countDate">
                </div>                 
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">                    
                    <button class="btn btn-success pull-right btn-prjct">Save</button>
                  </div>
                </div>
            </div>
          </div>
        <div class="x_content">
      
        </div>
     </div>     
</div>
<script type="text/javascript">
$(document).ready(function(){
    
    var max_fields  = 10;
    var wrapper     = $(".containerDate");
    var add_button  = $(".add_field");
    var count = 1;
    $('.countDate').val(1);
    
    $(add_button).click(function(e){
        e.preventDefault();
        if(count < max_fields){
            count++;
            $(wrapper).append('<div class="form-inline"><br><input type="text" class="form-control date'+count+'"/><button class="del btn-danger pull-left"><i class="fa fa-minus" aria-hidden="true"></i></button><script>$(".date'+count+'").datepicker({ changeMonth: true, changeYear: true,dateFormat : "yy-mm-dd" });');
            
            $('.countDate').val(count);
        }
        else{ alert('You Reached the limits') }
    });
 
    $(wrapper).on("click",".del", function(e){
        e.preventDefault(); $(this).parent('div').remove(); count--;
        $('.countDate').val(count);
    })

    // ------------------------------------------------------------//
    $(".date1").datepicker({ changeMonth: true, changeYear: true,dateFormat : 'yy-mm-dd' });

    $(".btn-prjct").click(function(){
    
      var GroupDate = [];
      var cDate     = $('.countDate').val();
      var unit      = $('.unitname').val();
      var emp       = $('.empname').val();
      var prjct     = $('.prjctname').val();
      var prjctrole = $('.empprjctrole').val();
      var satu      = 1;

      for(var i = 1; i <= cDate; i++){

        var date = $('.date'+i).val(); 
        
        GroupDate.push({
          date:date
        });

      }

      var data = {
        'unit':unit,
        'emp':emp,
        'prjct':prjct,
        'prjctrole':prjctrole,
        'Cdate':satu,
        'date':GroupDate        
      };
      
      //alert(JSON.stringify(data));
            
      if(JSON.stringify(GroupDate).toString().includes(',{}') || JSON.stringify(GroupDate).toString().includes(',{},')){        
            $("#error1").html("Mohon untuk tidak mendelete dari tengah harus dari bawah");
            $('#myModal1').modal("show");
      }else if(unit == "" || unit == null || emp == "" || emp == null || prjct == "" || prjct == null){        
            $("#error1").html("mohon cek kembali masih ada yg kosong!");
            $('#myModal1').modal("show");
      }else{
        $.ajax({
            url : baseUrl +'/newcase/input',
            type: 'POST',
            data: data,      
            dataType: 'json',
            success:function(r){
              if(r.msg == 'Success Insert'){
				   setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                  }, 1000);
                $("#error2").html(r.msg);
                $('#myModal2').modal("show");
              }else if(r.msg == 'Assembly Error!'){
                $("#error1").html(r.msg);
                $('#myModal1').modal("show");
              }
            }
        });
                
      }

    });

    $('.unitname').change(function(){
      
      var id = $(this).val();
      var op = "";
      
      $.ajax({            
          type  :'POST',
          url : baseUrl +'/newcase/search',
          data  : {'id':id},
          dataType: 'json',
          success:function(data){
              
              var appendEmp= '';
              var appendPrjct= '';

              $('.empname option').remove();
              $('.prjctname option').remove();

              if(data.contentEmp == "" || data.contentPrjct == ""){              
              
                appendEmp+='<option value="" >Empty</option>';
                appendPrjct+='<option value="" >Empty</option>';
            
              }else{

                appendEmp += '<option value="" >Choose Employee</option>';
                $.each(data.contentEmp, function(k, v){
                    appendEmp += '<option value="'+v.EMPLOYEE_ID+'">'+v.EMPLOYEE_ID+'//'+v.EMPLOYEE_NAME+'</option>';
                });
                
                appendPrjct += '<option value="" >Choose Project</option>'; 
                $.each(data.contentPrjct, function(k, v){
                    appendPrjct += '<option value="'+v.PROJECT_DETAIL_ID+'">'+v.PROJECT_NAME+'</option>';
                });

                $('.empname').append(appendEmp);
                $('.prjctname').append(appendPrjct);
              
              }
          }
      });
    });
});
</script>
@endsection