/*
	Author: Justin Hardage
	Date:	2013/05/24
*/

function SetVoteTotalByColor(event){
	color = encodeURI($(event.currentTarget).data('color'));
	targetID = "#" + encodeURI($(event.currentTarget).data('target'));


	$.ajax({
		url: "../models/color_get_total.php",
		beforeSend: function(xhr){$(targetID).html("Retrieving data.");},
		data: { color: color }
	}).done(function(result){ 
		$(targetID).html(encodeURI(result)); 
	}).fail(function(){ 
		$(targetID).html("Request failed!");
	});
		
}

$(document).ready(function(){
	$(".totalOnClick").click(SetVoteTotalByColor);
});
