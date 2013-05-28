/*
	Author: Justin Hardage
	Date:	2013/05/24
*/

function SetGrandTotal(event){
	var grandTotal = 0;
	$('.votesByColor').each(function(){
		var str = encodeURI($(this).html());
		
		if(str != null
		&& str.length > 0
		&& !isNaN(str)) //isNaN is broken, but it's the best we have until ECMAscript6
		{
			grandTotal += parseInt(str);
		}
	});

	$("#grandTotalResult").html(grandTotal);
}

$(document).ready(function(){
	$("#grandTotalBtn").click(SetGrandTotal);
});
