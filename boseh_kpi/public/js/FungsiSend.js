function httpSend(target, data) {
	return $.ajax({
		url: target,
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: data,
		beforeSend: function(){
          $('.ajax-loader').css("visibility", "visible");
        },
		complete: function(){
		$('.ajax-loader').css("visibility", "hidden");
		}
		
	});
}

function httpsendGet(target, data){
	return $.ajax({
		url: target,
		type: 'GET',
		cache: false,
		dataType: 'json',
		data: data
	});
}

function httpsendPost(target, data){
	return $.ajax({
		url: target,
		type: 'POST',
		dataType: 'json',
		cache: false,
		data: data
	});
}

function httpsendMultiFormPost(target, data){
	return $.ajax({
		url: target,
		type: 'POST',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: data
	});
}