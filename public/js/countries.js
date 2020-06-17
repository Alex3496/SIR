
$(function(){
	$('#country').on('change',onSelectCountry);
});

function onSelectCountry() {
	var country_code = $(this).val();

	$.get('api/country/'+country_code+'/states',function(data) {
		console.log(data);
		var html_select = '';
		Object.keys(data).forEach(function(key) {
  			html_select += '<option value = "'+key+'">'+data[key]+'</option>'; 
		})
		$('#state').html(html_select);
	});
}

