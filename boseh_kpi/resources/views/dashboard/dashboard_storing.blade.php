@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="home-tab"
                        data-toggle="tab"
                        href="#home"
                        role="tab"
                        aria-controls="home"
                        aria-selected="true">Detail Harian </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="bulanan-tab"
                        data-toggle="tab"
                        href="#bulanan"
                        role="tab"
                        aria-controls="bulanan"
                        aria-selected="false">Bulanan</a>
                </li> 
				<li class="nav-item">
                    <a
                        class="nav-link"
                        id="Tahunan-tab"
                        data-toggle="tab"
                        href="#Tahunan"
                        role="tab"
                        aria-controls="Tahunan"
                        aria-selected="false">Tahunan</a>
                </li>
            </ul>
			<div class="tab-content" id="myTabContent">
                <div
                    class="tab-pane fade active show"
                    id="home"
                    role="tabpanel"
                    aria-labelledby="home-tab">
					  <div id="container"></div>
					  <div class="card">
						<div id="container2"></div>
					</div>
				</div>
				<div
                    class="fade "
                    id="bulanan"
                    role="tabpanel"
                    aria-labelledby="bulanan-tab">
						<div id="container4"></div>
				</div>
				<div
                    class="tab-pane fade "
                    id="Tahunan"
                    role="tabpanel"
                    aria-labelledby="Tahunan-tab">
						<div id="container5"></div>
						
				</div>
			</div>
			
                
			
		</div>
	</div>
</div>
@endsection
@section('js')

<script type="text/javascript">
  $.ajaxSetup({

				  headers : {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				  }

			  });
const unique = (value, index, self) => {
  return self.indexOf(value) === index
}

		$.ajax({
			url : "{{url('data_dashboard1')}}",
			type: 'POST',
			data: {'nama': ''},
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//var data=[];
				
				var uniqueArray = function(arrArg) {
				  return arrArg.filter(function(elem, pos,arr) {
					return arr.indexOf(elem) == pos;
				  });
				};

				var uniqEs6 = (arrArg) => {
				  return arrArg.filter((elem, pos, arr) => {
					return arr.indexOf(elem) == pos;
				  });
				}
				var name=[];
				var jumlah=[];
				var series=[];
				var tanggal=[];
				var shelter=[];
				var date=[] ;
				var total=[] ;
				var datajml=[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					name[i] = obj.Nama_shelter;		
					jumlah[i] = obj.Jumlah;
					tanggal[i] = obj.Tanggal;
				}
				for (var i = 0; i <  data.length ;i++){
				//console.log(name);
				shelter[i]=uniqueArray(name);
				date[i]=uniqueArray(tanggal);
				total[i]=uniqueArray(jumlah);
				}
				
				for (var i = 0; i < shelter[0].length; i++) {
					datajml.push(jumlah.splice(0, date[0].length))
				}
				
				for (var i = 0; i < shelter[0].length; i++) {
					//console.log( date[0].length);
					//console.log(jumlah.splice(0, date[0].length));
					

					series.push({
						name: shelter[0][i],
						data:datajml[i]
					});	
				}

				
				//var result =[name,jumlah];
				//var test = uniqueArray(shelter[0]);
							//		console.log(shelter);

				Highcharts.chart('container', {

					title: {
						text: 'Actual Trend Storing'
					},
					yAxis: {
						title: {
							text: 'Jumlah'
						}
					},
					xAxis: {
						categories:date[0]
					},	   
					plotOptions: {
						series: {
							label: {
								connectorAllowed: false
							},
						}
					},
					series: series,
					
					responsive: {
						rules: [{
							condition: {
								maxWidth: 500
							},
							chartOptions: {
								legend: {
									layout: 'horizontal',
									align: 'center',
									verticalAlign: 'bottom'
								}
							}
						}]
					}

				});
				

			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});
	
		$.ajax({
			url : "{{url('data_dashboard3')}}",
			type: 'POST',
			data: {'nama': ''},
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				//var data=[];
				
				var uniqueArray = function(arrArg) {
				  return arrArg.filter(function(elem, pos,arr) {
					return arr.indexOf(elem) == pos;
				  });
				};

				var uniqEs6 = (arrArg) => {
				  return arrArg.filter((elem, pos, arr) => {
					return arr.indexOf(elem) == pos;
				  });
				}
				var name=[];
				var jumlah=[];
				var series=[];
				var tanggal=[];
				var shelter=[];
				var date=[] ;
				var total=[] ;
				var datajml=[] ;
				for (var i = 0; i < data.length; i++) {
					var obj = data[i];		
					name[i] = obj.Nama_shelter;		
					jumlah[i] = parseInt(obj.Jumlah);
					tanggal[i] = obj.Tanggal;
				}
				for (var i = 0; i <  data.length ;i++){
				//console.log(name);
				shelter[i]=uniqueArray(name);
				date[i]=uniqueArray(tanggal);
				total[i]=uniqueArray(jumlah);
				}
				
				for (var i = 0; i < shelter[0].length; i++) {
					datajml.push(jumlah.splice(0, date[0].length))
				}
				
				for (var i = 0; i < shelter[0].length; i++) {
					//console.log( date[0].length);
					//console.log(jumlah.splice(0, date[0].length));
					

					series.push({
						name: shelter[0][i],
						data: datajml[i]
					});	
				}

				
				//var result =[name,jumlah];
				//var test = uniqueArray(shelter[0]);
				    const monthNames = ["January", "February", "March", "April", "May", "June",
						"July", "August", "September", "October", "November", "December"];
					const dateObj = new Date();
					const month = monthNames[dateObj.getMonth()];
					const day = String(dateObj.getDate()).padStart(2, '0');
					const year = dateObj.getFullYear();
					const output = month  + '\n'+ day  + ',' + year;
				
				Highcharts.chart('container4', {

					title: {
						text: 'Trend Storing '+year
					},
					yAxis: {
						title: {
							text: 'Jumlah'
						}
					},
					xAxis: {
						title: {
							text: 'Bulan'
						},
						categories:date[0]
					},	   
					plotOptions: {
					column: {
						dataLabels: {
							enabled: true
							}
						}
					},
					series: series,
				

				});
				

			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});
		
		$.ajax({
			url : "{{url('data_dashboard2')}}",
			type: 'POST',
			data: {'nama': ''},
			dataType: 'json',
			beforeSend: function(){
				$('.ajax-loader').css("visibility", "visible");
			},
			success : function(data){
				
				var name=[];
				var jumlah=[];
				var series=[];
				var tanggal=[];
				var shelter=[];
				console.log(jumlah);
				for (var i = 0; i < data.length; i++) {
					jumlah[i] = parseInt(data[i].total);
					name[i] = data[i].Nama_shelter;
				}
				
		// Crea
			Highcharts.chart('container2', {
				chart: { type: 'column' },
				title: { text: 'Laporan Shelter Yang Paling Banyak Diisi' },
				yAxis: {
						enabled: true,
						title: {
							text: 'Days'
						}
					},
				xAxis: {
						categories: name
					},
				plotOptions: {
					column: {
						dataLabels: {
							enabled: true
							}
						}
					},
				series: [{ 
						name: 'Jumlah',
						data: jumlah,
				}]
			});
		
			},
			complete: function(){
				$('.ajax-loader').css("visibility", "hidden");
			}
			
		});
</script>

@stop