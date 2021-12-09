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
			
				
				<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Jumlah</th>
							<th>Aksi</th>
								
							</tr>
						</thead>
						<div class="col-sm-3">
							<select data-column="0" class="form-control Nama" name="Pegawai" id="Nama" required>
								<option value="" >Pilih Pegawai</option>		
								<option value="" >All	</option>		
							@foreach ($pegawai as $pegawai1)												
								<option value="{{$pegawai1->nama}}">{{$pegawai1->nama}} </option>	
							@endforeach								
							</select>	
							
							
							
						</div>
						<div  class="col-sm-3">
							<select data-column="1" class="form-control Bulan" name="Bulan" id="Bulan" required>
														<option value="" >Pilih Bulan</option>		
								<option value="" >ALL</option>		
								@for ($i = 1 ; $i <=  12 ; $i++)
									<option value="{{ $i }}">{{ $i }}</option>
								@endfor  					
							</select>	
							
						</div>
						<div  class="col-sm-3">
							<select data-column="2" class="form-control Tahun" name="Tahun" id="Tahun" required>
								<option value="" >Pilih Tahun</option>		
								<option value="" >ALL</option>		
								@for ($i = 2018 ; $i <=  2025 ; $i++)
									<option value="{{ $i }}">{{ $i }}</option>
								@endfor  								
							</select>	
						</div>
						<div class="col-sm-2">
							<button class="btn btn-success filter"> Cari </button>
						</div>
						<tbody>
							@foreach ($data as $data1)
							<tr>	
								<td>{{$data1->nama}} <input type="hidden" name="id[]" value="{{$data1->id_pegawai}}"></td>
								<td>{{$data1->bulan}}
								</td>
								<td>
									{{$data1->tahun}}
								</td>
								<td><input type="number"name="jumlah[]" value="{{$data1->hari}}" class="form-control"></td>
								<td><button class="form-control btn-info">Edit</button></td>
							</tr>
							
							@endforeach
						</tbody>

					</table>
					<div class="item form-group">
				</div>
				</div>

		</div>
	</div>
</div>

@endsection
@section('js')

<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>

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
	
        var table = $("#example").DataTable();
	
	
	$('.filter').click(function () {
		table.column( $('.Nama').data('column'))
		.search( $('.Nama').val() )
		.draw();
	});
	$('.filter').click(function () {
		table.column( $('.Bulan').data('column'))
		.search( $('.Bulan').val() )
		.draw();
	});
	$('.filter').click(function () {
		table.column( $('.Tahun').data('column'))
		.search( $('.Tahun').val() )
		.draw();
	});
</script>

@stop
