<style>
#video {
  width:320px;
  height:240px;
}

#photo {
 
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
video {
  -webkit-transform: scaleX(-1);
  transform: scaleX(-1);
}
img {
  -webkit-transform: scaleX(-1);
  transform: scaleX(-1);
}
.img-container img {

  min-width: 100%; 
  min-height: 100%; 
  width: auto;
  height: auto;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}

</style>
@extends('layouts.app')
@section('content')
<div class="x_content">
<div class="col-md-12 col-sm-4 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			@if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
			@endif
			  @foreach ($errors->all() as $error)
				<div class="alert alert-error" role="alert">
					<li>{{ $error }}</li>
				</div>
             @endforeach
			<h2>ABSENSI</h2>
			<div class="clearfix"></div>
			<div class="form-horizontal form-label-left">
			<form action="{{url('/saveinput')}}"class="form-label-left input_mask" method="POST">
			<div class="row ">
				<div class="col-md-2">
				</div>
				<div class="col-md-4 video-container">
				  <video id="video" autoplay loop muted playsinline > 
				  <source src="image.mp4">
					  <source src="image.webm" onerror="fallback(parentNode)">
					  <img src="image.gif">
				  Video stream not available.</video>
				  <button id="startbutton">Ambil Foto</button> 
				</div>
				<canvas id="canvas"></canvas>
				<div class="col-md-4">
				@csrf
					<img id="photo" class="img-container"> 
				
				</div>
				<div class="col-md-2">
				<input id="photo_1" required type="hidden" name="foto">
					
	  
				</div>
			</div>
			<div class="row">
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Provinsi</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control"id="provinsi" type="text" name="provinsi">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Kota</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" id="kota" type="text" name="kota">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" id="kecamatan" type="text" name="kecamatan">
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
							<input readonly class="form-control"id="" value="{{ date('d/m/Y') }}"type="text" name="tanggal">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Jam</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input readonly class="form-control" value="{{ date('H:i:s') }}" id="" type="text" name="jam">
						</div>
					</div>  
				</div>  
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						@if ($check == 0)
							<select  class="form-control" name="status" required>
								<option value="">-Pilih Keterangan-</option>
								<option value="1">Masuk</option>
								<option value="2">Sakit</option>
								<option value="3">Ijin</option>
								<option value="5">Libur</option>
								<option value="6">Piket</option>
								<option value="7">WFH</option>
								<option value="8">Cuti</option>
							</select>
						@else
							<select  class="form-control" name="shift" required>
								<option value="10">Pulang</option>
								
							</select>
						@endif
						</div>
					</div>       
				</div>    
				
			</div>
			<div class="row">
				<div class=" col-md-4 col-sm-4">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Shift</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							@if ($check == 0)
							<select  class="form-control" name="shift" required>
								<option value="">-Pilih Shift-</option>
								@foreach ($shift as $shift1)
									<option value="{{$shift1->id_shift}}">Shift Masuk {{$shift1->jam_masuk}}</option>
								@endforeach
							</select>
							@else
							<select  class="form-control" name="shift" required>
								@foreach ($shift->where('id_shift',$checkshift[0]->shift) as $shift1)
									<option value="{{$shift1->id_shift}}">Shift Masuk {{$shift1->jam_masuk}}</option>
								@endforeach
								
							</select>
						@endif
						</div>
					</div>       
				</div>  
					<div class=" col-md-4 col-sm-4">
				<button type="submit"  class="btn btn-success">Simpan</button>
			</div>
			</div>
		</form>
			
    

</div>

 


	
@endsection
@section('js')
 <script src="{{asset('public/js/domvas.js')}}"></script>
    <canvas id="canvas1"></canvas>
	
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

	  $.ajaxSetup({
		headers : {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		});
	});
(function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  var width = 230;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function(stream) {
		
      video.srcObject = stream;
      video.play();
    })
    .catch(function(err) {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (5/4);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
	    video.setAttribute('autoplay', '');
		video.setAttribute('muted', '');
		video.setAttribute('playsinline', '');
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = canvasBg.getContext('2d');
    context.fillStyle = "";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
    photo_1.setAttribute('value', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);

      photo_1.setAttribute('value', data);

     // console.log(photo.setAttribute('src', data));
    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();


function initLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function(position) {
         // user_lat = position.coords.latitude-0.006734001;
         // user_lon = position.coords.longitude+0.0071986001;
          user_lat = position.coords.latitude;
          user_lon = position.coords.longitude;
        //  console.log(user_lat,user_lon);

        //  updateChartCuaca(count_tgl);

          $.ajax({
            url: "https://geolocation-db.com/jsonp",
            jsonpCallback: "callback",
            dataType: "jsonp",
            async: false,
            success: function(location) {
				console.log(location);
              $('#provinsi').html(location.PROVINSI);
              $('#kota').html(location.KABKOT);
              $('#kecamatan').html(location.KECAMATAN);
            }
          });
        },
		error => console.log(error),
		{enableHighAccuracy: true}
      );
    }
    else {
      user_lat = 0.241002;
      user_lon = 119.780845;
      alert("Geolocation is not supported by this browser.");
    }
  }

function initMap() {
 var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          
          };
                //    console.log(pos.lat,pos.lng);
					
					
          var data="https://maps.google.com/maps?q="+pos.lat+","+pos.lng+"&t=&z=13&ie=UTF8&iwloc=&output=embed";
			
          $.ajax({
            url: "{{url('/getlocation')}}",
           // jsonpCallback: "callback",
		   	type  :'POST',
			data  : {'lat':pos.lat, 'long':pos.lng},
            success: function(location) {
           	console.log(location[0].PROVINSI);
              $('#provinsi').val(location[0].PROVINSI);
              $('#kota').val(location[0].KABKOT);
              $('#kecamatan').val(location[0].KECAMATAN);
              $('#desa').val(location[0].DESA);
            }
          });
		  
       

         
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}




  $(document).ready(function() {
  
 // initLocation();
  initMap();
  
  });

</script>
@stop