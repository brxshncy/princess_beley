$(document).ready(function(){
	$('table').DataTable();
	alert('FUCK YOU');
/// AREA INSPECTION
let i =1;

$(document).on('click','#add_commodity',function(){
	alert('fuck');
	i++;
	let commodity_html = "";
		commodity_html += "<div class='row' id="+i+">";
		commodity_html += "<div class='col col-md-3'>";
		commodity_html += "<input type='text' class='form-control name='commodity[]'>";
		commodity_html += "</div>";
		commodity_html += "</div>";

	$('#row_commodity').append(commodity_html);
})
})
