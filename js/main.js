//On Load
$(function() {

//Turn Grid Off
	$('#toggleGridOff').click(function() {
		// alert ("Made It");
		$('.cell').css("border-color","transparent");	
	}); 

//Turn Grid On
	$('#toggleGridOn').click(function() {
		// alert ("Made It");
		$('.cell').css("border","1px solid #999");	
	}); 

});
