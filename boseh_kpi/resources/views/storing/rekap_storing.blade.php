@extends('layouts.app')
@section('content')

<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>Nama Shelter</th>
								<th>Jumlah</th>
								
							</tr>
						</thead>  
							<div class="col-sm-3">
							<select data-column="0" class="form-control Tanggal" name="Tanggal" id="Tanggal" required>
								<option value="" >Pilih Tanggal</option>		
								<option value="" >All	</option>	
							@foreach ($tanggal as $Tanggal1)								
								<option value="{{$Tanggal1->Tanggal}}" >{{$Tanggal1->Tanggal}}</option>		
							@endforeach								
							</select>	
						</div>
						<div  class="col-sm-3">
							<select data-column="1" class="form-control Shelter" name="Shelter" id="Shelter" required>
								<option value="" >Pilih Shelter</option>		
								<option value="" >ALL</option>	
							@foreach ($shelter as $shelter1)								
								<option value="{{$shelter1->Nama_shelter}}" >{{$shelter1->Nama_shelter}}</option>		
							@endforeach
							</select>	
							
						</div>
						<div class="col-sm-2">
							<button class="btn btn-success filter"> Cari </button>
						</div>
						<tbody> 
						@foreach ($data as $data1)
							<tr>				
								<td>{{$data1->Tanggal}} </td>
								<td>{{$data1->Nama_shelter}} </td>
								<td>{{$data1->Jumlah}}</td>
							</tr>
						@endforeach
						</tbody>
					

					</table>
					
				</div>


		</div>
	</div>
</div>
@endsection
@section('js')

<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>

<script type="text/javascript">
	var table =$('#example').DataTable();
	$('.filter').click(function () {
		table.column( $('.Tanggal').data('column'))
		.search( $('.Tanggal').val() )
		.draw();
	});
	$('.filter').click(function () {
		table.column( $('.Shelter').data('column'))
		.search( $('.Shelter').val() )
		.draw();
	});
</script>
@stop