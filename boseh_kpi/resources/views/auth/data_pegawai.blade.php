@extends('layouts.app')
@section('content')

<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Nama</th>
								<th>No Hp</th>
								<th>Jabatan</th>
								
							</tr>
						</thead>  
						<tbody> 
						@foreach ($pegawai as $data1)
							<tr>				
								<td>{{$data1->nama}} </td>
								<td>{{$data1->hp}}</td>
								<td>{{$data1->jabatan}}</td>
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

<script type="text/javascript">
	$('#example').DataTable();
</script>
@stop