$(document).ready(function(){
	$('#book-form #date_from,#book-form #date_to').change(function(){
		$.ajax({
			type: "POST",
			url: "/realty/getPrice",
		   	data: {realty:$('#book-form #realty').val(),
		   		date_from:$('#book-form #date_from').val(),
		   		date_to:$('#book-form #date_to').val()},
		   	success: function(data){
		   		$('#priceCalculation').text(data);
		   	}
		});
	});
});
