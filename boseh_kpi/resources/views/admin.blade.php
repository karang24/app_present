@extends('layouts.master')

@section('content')


<div class="" role="tabpanel" data-example-id="togglable-tabs">

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <br>
        <!-- start recent activity -->
        <div class="col-md-12 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h3>Input Admin</h3>
      <div class="clearfix"></div>

      <form class="form-horizontal form-label-left">
                      
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Nama</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
      <input type="text" class="form-control" id="usr">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Bulan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" id="usr">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" id="usr">
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
     
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
      </div>
</form>
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
      <h2>HRD</h2>
      <div class="clearfix"></div>

      <form class="form-horizontal form-label-left">
                      
      <div class="form-group">
        <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr">
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Bulan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control">
            <option>Choose option</option>
            <option>Option one</option>
            <option>Option two</option>
            <option>Option three</option>
            <option>Option four</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Tahun</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control">
          </select>
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-9">
          <button type="submit" class="btn btn-success pull-right">Search</button>
        </div>
      </div>

</form>

    </div>

  </div>
</div>
    </div>
  </div>
</div>
@endsection