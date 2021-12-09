@extends('layouts.app')
@section('content')

<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<div class="col-md-12 col-sm-12 offset-md-12">

					<table class="table" id="example">
						<thead>
							<tr>
								<th>Periode</th>
								<th>Nama</th>
								<th>Point</th>
								
							</tr>
						</thead>  
						<tbody> 
						@foreach ($data as $data1)
							<tr>				
								<td>{{$data1->tgl}} </td>
								<td>{{$data1->nama}} <input type="hidden" name="id[]" value="{{$data1->id_pegawai}}"></td>
								<td>{{$data1->point}}</td>
								

								
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