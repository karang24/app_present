@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2>Input<small>Hari Kerja</small></h2>
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
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal" novalidate="" method="POST" action="{{url('save_harikerja')}}">
				@csrf

				
				<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Jumlah</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $data1)
							<tr>	
								<td>{{$data1->nama}} <input type="hidden" name="id[]" value="{{$data1->id_pegawai}}"></td>
								<td><select id="f_bulan" class="form-control month" name="bulan[]">
										<option value="" >Choose Month</option>
									</select>
								</td>
								<td>
									<select id="f_tahun" class="form-control year" name="tahun[]">
										<option value="">Choose Year</option>
										@foreach ($tahun as $listtahun)
										<option value="{{ $listtahun->TAHUN }}">{{ $listtahun->TAHUN }}</option>
										@endforeach
									</select>
								</td>
								<td><input type="number"name="jumlah[]"class="form-control"></td>
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

			var op = "";
			
			$('.month option').remove();
			
				op+='<option value="">Select Month</option>';
				op+='<option value="1">Januari</option>';
				op+='<option value="2">Februari</option>';
				op+='<option value="3">Maret</option>';
				op+='<option value="4">April</option>';
				op+='<option value="5">Mei</option>';
				op+='<option value="6">Juni</option>';
				op+='<option value="7">Juli</option>';
				op+='<option value="8">Agustus</option>';
				op+='<option value="9">September</option>';
				op+='<option value="10">Oktober</option>';
				op+='<option value="11">November</option>';
				op+='<option value="12">Desember</option>';
			
			$('.month').append(op);
	$('#example').DataTable();
</script>

@stop
