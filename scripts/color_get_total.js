/*
	Author: Justin Hardage
	Date:	2013/05/24
*/

function SetVoteTotalByColor(event){
//	color = event.delegateTarget.data('color');
//	targetID = "#" + event.delegateTarget.data('target');

	color = $(event.currentTarget).data('color');
	targetID = "#" + $(event.currentTarget).data('target');


	$.ajax({
		url: "../models/color_get_total.php",
		beforeSend: function(xhr){$(targetID).html("Retrieving data.");},
		data: { color: color }
	}).done(function(result){ 
		$(targetID).html(result); 
	}).fail(function(){ 
		$(targetID).html("Request failed!");
	});
		
}

$(document).ready(function(){
	$(".totalOnClick").click(SetVoteTotalByColor);
});
