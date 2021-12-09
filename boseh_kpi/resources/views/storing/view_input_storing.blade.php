@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Input<small>Storing Harian</small></h2>
			@if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
			@endif

			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					
					</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content" style="display: block;">
			<br>
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{url('save_input_storing')}}">
				@csrf
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input id="birthday" name="tanggal" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
							<script>
								function timeFunctionLong(input) {
									setTimeout(function() {
										input.type = 'text';
										}, 60000);
									}
							</script>
					</div>
				</div>

				
				<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Shelter</th>
								<th>Jumlah</th>
								
							</tr>
						</thead>
						<tbody>
						@foreach ($data as $data1)
							<tr>				
								
								<td>{{$data1->Nama_shelter}}<input type="hidden" name="Nama_shelter[]" value="{{$data1->Nama_shelter}}"></td>
								<td><input type="number" name="jumlah[]"></td>
								
							</tr>
						@endforeach
						</tbody>
					

					</table>
					<div class="item form-group">
					<div class="col-md-6 col-sm-6 offset-md-3">
						<button class="btn btn-primary" type="button">Cancel</button>
						<button class="btn btn-primary" type="reset">Reset</button>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection
@section('js')

<script type="text/javascript">
	$('#example').DataTable();
</script>

@stop