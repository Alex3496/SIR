
$(function(){
	$('#country').on('click',onSelectCountry);
});

function onSelectCountry() {
	var country_code = $(this).val();

	$.get('api/country/'+country_code+'/states',function(data) {

		var html_select = '';
		Object.keys(data).forEach(function(key) {
  			html_select += '<option value = "'+key+'">'+data[key]+'</option>'; 
		})
		$('#state').html(html_select);
	});
}

/*
Search for locations that match what the user entered, 
in the locations table, used in the public view index (origin)
*/

$("#origin-user").on('input',findlocation);

function findlocation() {
    var location = $(this).val();
    $.get('api/locations/'+location+'/tariffs',function(data) {
      console.log(data);
      var html_select = '';
      Object.keys(data).forEach(function(key) {
          html_select += '<option value = "'+data[key]+'"></option>'; 
        })
        $('#locations-origin').html(html_select);
      });
}

/*
Search for locations that match what the user entered, 
in the locations table, used in the public view index (destiny)
*/

$("#destiny-user").on('input',findlocation2);

function findlocation2() {
    var location = $(this).val();
    $.get('api/locations/'+location+'/tariffs',function(data) {
      console.log(data);
      var html_select = '';
      Object.keys(data).forEach(function(key) {
          html_select += '<option value = "'+data[key]+'"></option>'; 
        })
        $('#locations-destiny').html(html_select);
      });
}