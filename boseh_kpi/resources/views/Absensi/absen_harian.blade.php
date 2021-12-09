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
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Masuk</th>
								<th>Pulang</th>
								<th>Telat</th>
								<th>Status</th>
								<th>Shift</th>
							</tr>
						</thead>  
						<tbody> 
						@foreach ($data as $data1)
							<tr>				
								<td>{{date('d M Y', strtotime($data1->tanggal)) }} </td>
								<td><a href="{{ url('/detail_absensi/'.\Crypt::encryptString($data1->tanggal).'/'.\Crypt::encryptString($data1->id_pegawai)) }}" >{{$data1->nama}}</a> <input type="hidden" name="id[]" value="{{$data1->id_pegawai}}"></td>
								<td>{{$data1->jabatan}}</td>
								<td>{{$data1->masuk}}</td>
								<td>{{$data1->pulang}}</td>
								<td>{{$data1->telat}}</td>
								<td>@if ($data1->keterangan ==1) Masuk @elseif ($data1->keterangan == 2)Sakit @elseif ($data1->keterangan == 3)Ijin @elseif ($data1->keterangan == 4) @elseif ($data1->keterangan == 5) Libur@elseif ($data1->keterangan == 6) Piket@elseif ($data1->keterangan == 7) WFH@elseif ($data1->keterangan ==8) Cuti @endif</td>
								<td>Shift Masuk {{$data1->jam_masuk}}</td>
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