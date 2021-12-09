@extends('layouts.masteryf')

@section('content')
@if ($dashboard== '1')  
			<div class="row" id="absen">
				<div id="yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\"></div>
			</div>
<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=6b49b8e3-9f3c-442d-9d0c-1bcb103c5187"></script>
@elseif ($dashboard== '2')

			<div class="row">
				<div id="yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\"></div>
			</div>
	<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=f5194245-7830-4c02-a6f4-054368671844"></script>
@elseif ($dashboard== '3')
			<div class="row">
				<div id=\"yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\"></div>
			</div>
<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=077e75cf-c6d3-42ad-b748-fd1e78094776"></script>
		
@else
		    <div class="row">
				<div id="yfReportContainera17406ec-c9ed-44a2-8f7e-b9e248fbe107\"></div>
			</div>
			<script type="text/javascript" src="http://149.129.217.187:8080/JsAPI?reportUUID=8d33151a-3aee-4fa6-be1b-9025e81f7685"></script>
			
@endif
@endsection