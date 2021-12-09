<style>
  #video {
  border: 1px solid black;
  box-shadow: 2px 2px 3px black;
  width:320px;
  height:240px;
}

#photo {
  border: 1px solid black;
  box-shadow: 2px 2px 3px black;
  width:310px;
  height:240px;
}

#canvas {
  display:none;
}

.camera {
  width: 340px;
  display:inline-block;
}

.output {
  width: 320px;
  display:inline-block;
}
.form {
  width: 140px;
  display:inline-block;
}
#startbutton {
  display:block;
  position:relative;
  margin-left:auto;
  margin-right:auto;
  bottom:32px;
  background-color: rgba(0, 150, 0, 0.5);
  border: 1px solid rgba(255, 255, 255, 0.7);
  box-shadow: 0px 0px 1px 2px rgba(0, 0, 0, 0.2);
  font-size: 14px;
  font-family: "Lucida Grande", "Arial", sans-serif;
  color: rgba(255, 255, 255, 1.0);
}

.contentarea {
  font-size: 16px;
  font-family: "Lucida Grande", "Arial", sans-serif;
  width: 760px;
}
</style>
@extends('layouts.app')
@section('content')
<div class="x_content">
<div class="col-md-12 col-sm-4 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			@foreach($data as $detail)
			<h2>DETAIL ABSENSI</h2>
			<div class="clearfix"></div>
			<div class="form-horizontal form-label-left">
			<div class="row ">
				<div class="col-md-4">
				</div>
				
				<canvas id="canvas"></canvas>
				<div class="col-md-4">
				
					<img id="photo" src="{{asset($detail->url_foto)}}" alt="The screen capture will appear in this box."> 
				
				</div>
				<div class="col-md-4">
				<input id="photo_1" type="hidden" name="file">
					
	  
				</div>
			</div>
			<div class="row">
				
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Kota</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" id="kota" type="text" value="{{$detail->Kota}}" name="kota">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control"value="{{$detail->Kecamatan}}" id="kecamatan" type="text" name="kecamatan">
							<input readonly class="form-control" id="desa" type="hidden" name="desa">
						</div>
					</div>       
				</div>   
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Sekitar</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control"value="{{$detail->desa}}" id="kecamatan" type="text" name="kecamatan">
							<input readonly class="form-control" id="desa" type="hidden" name="desa">
						</div>
					</div>       
				</div>       
			</div>
			<div class="row">
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control"id="" value="{{$detail->tanggal }}"type="text" name="tanggal">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Masuk</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" value="{{$detail->masuk }}" id="" type="text" name="jam">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Status</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" value="@if ($detail->keterangan ==1) Masuk @elseif ($detail->keterangan == 2)Sakit @elseif ($detail->keterangan == 3)Ijin @elseif ($detail->keterangan == 4) @elseif ($detail->keterangan == 5) Libur@elseif ($detail->keterangan == 6) Piket@elseif ($detail->keterangan == 7) WFH@elseif ($detail->keterangan ==8) Cuti @endif  " id="" type="text" name="jam">
						</div>
					</div>       
				</div>    
			</div>
			<div class="row">
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Shift</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
								<input readonly class="form-control" value="@if ($detail->shift=1) Jam 8 @elseif ($detail->shift=2)Jam 10 @elseif ($detail->shift=3)Jam 11 @elseif ($detail->shift=4) Jam 13 @elseif ($detail->shift=5) jam 7@elseif ($detail->shift=5) jam 4 @endif " id="" type="text" name="jam">
						</div>
					</div>       
				</div> 
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Pulang</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
								<input readonly class="form-control" value="{{$detail->pulang }}" id="" type="text" name="jam">
						</div>
					</div>       
				</div>  
			<div class=" col-md-4 col-sm-4">
			</div>
			</div>
			
    
		@endforeach
</div>

 


	
@endsection
@section('js')
 <script src="{{asset('public/js/domvas.js')}}"></script>
    <script src="{{asset('public/js/iframe2image.js')}}"></script>
    <canvas id="canvas1"></canvas>
    <script>
      // Set up the canvas dimensions
      var canvas = document.getElementById('canvas1'),
          context = canvas.getContext('2d');
      canvas.width = 500;
      canvas.height = 600;

      // Grab the iframe
      var inner = document.getElementById('gmap_canvas');

      // Get the image
      iframe2image(inner, function (err, img) {
        // If there is an error, log it
        if (err) { return console.error(err); }

        // Otherwise, add the image to the canvas
        context.drawImage(img, 0, 0);
      });
    </script>

    <script src="{{asset('public/js/watcher.js')}}"></script>
    <script src="{{asset('public/js/collector.js')}}"></script>
    <script>
        (function () {
           var watcher = new FileWatcher(),
               resources = ResourceCollector.collect();
           watcher.addListener(function () {
             location.reload();
           });
           watcher.watch(resources);
        }());
    </script>
<script>




  $(document).ready(function() {
  
 // initLocation();
  initMap();
  
  });

</script>
@stop