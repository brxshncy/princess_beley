$(document).ready(function(){
	$('#area_inspected_table').DataTable();
	$('.select2').select2()
/// AREA INSPECTION
let i =1;

$(document).on('click','#add_commodity',function(){
	i++;
	let commodity_html = "";
		commodity_html += "<tr id=row"+i+">";
		commodity_html += "<td>";
		commodity_html += "<input type='text' class='form-control' name='commodity[]' placeholder='Commodity'>";
		commodity_html += "</td>";
		commodity_html +="<td class='text-center'><button type='button' id='"+i+"' class='btn btn-danger remove'>Remove</button>";
		commodity_html +="</td>";
		commodity_html += "</tr>";

	$('#row_commodity').append(commodity_html);
})
$(document).on('click','.remove',function(){
	var row_id = $(this).attr('id');
	$("#row"+row_id+"").remove();
})
$(document).on('click','.view_area',function(){
	let area_id = $(this).attr('id');
	console.log(area_id);
	
	$.ajax({
		url:'ajax_calls/view_area.php',
		method:'post',
		dataType:'JSON',
		data:{id:area_id},
		success:function(data){
			console.log(data);
			$('#barangay_area').val(data.barangay_area)
			$('#area_address').val(data.area_address);
			let commodity = data.commodity.split(",");
			let bla ="";
			for(i = 0; i<commodity.length; i++){
				 bla += "<li>"+commodity[i]+"</li>";
			}
			$('#commodity_li').html(bla);
			$('#soil_type').val(data.soil_type);
			$('#area_platform').val(data.area_platform);
			$('#date_inspected').val(data.date_inspected);
			$('#view_area_modal').modal('show');
		},
		error:function(err){
			console.log(err);
		}
	})
})
$(document).on('click','.edit_area',function(){
	let e_area_id = $(this).attr('id');
	console.log(e_area_id);
	
	$.ajax({
		url:'ajax_calls/view_area.php',
		method:'post',
		dataType:'JSON',
		data:{e_id:e_area_id},
		success:function(data){
			console.log(data);
			$('#area_id').val(data.id);
			$('#abarangay_area').val(data.barangay_area);
			$('#aarea_address').val(data.area_address);
			let commodity = data.commodity.split(",");
			let list = "";
			for(i = 0; i<commodity.length; i++){
				list +="<tr>";
				list +="<td>";
				list +="<input type='text' value='"+commodity[i]+"' name='e_comms[]' class='form-control mt-1'>";
				list +="</td>";
				list +="<td>";
				list +="</td>";
				list +="</tr>";
					
			}
			$('#e_comm').html(list);
			$('#asoil_type').val(data.soil_type);
			$('#aarea_platform').val(data.area_platform);
			$('#adate_inspected').val(data.date_inspected);
			$('#edit_area_modal').modal('show');
		},
		error:function(err){
			console.log(err);
		}
	})
})
let x = 1;
$(document).on('click','#addmore',function(){
	x++;
	let add_comm = "";
		add_comm +="<tr id='rm"+x+"'>";
		add_comm +="<td>";
		add_comm += "<input type='text' class='form-control mt-1'  name='e_comms[]' placeholder='Commodity'>";
		add_comm +="</td>";
		add_comm +="<td class='text-center'>";
		add_comm +="<button type='button' id='"+x+"' class='btn btn-danger e_remove'>Remove</button>";
		add_comm +="</td>";
		add_comm +="</tr>";
	$('#e_comm').append(add_comm);
})
$(document).on('click','.e_remove',function(){
	var e_id = $(this).attr('id');
	$('#rm'+e_id+"").remove();
})
$(document).on('click','.dc_edit',function(){
	let idd = $(this).attr('id');
	console.log(idd);
	$.ajax({
		url:'ajax_calls/dc_props.php',
		method:'post',
		data:{idd:idd},
		dataType:'JSON',
		success:function(data){
			console.log(data);
			$('#e_id').val(data.id);
			$('#efname').val(data.fname);
			$('#elname').val(data.lname);
			$('#ebday').val(data.bday);
			$('#econtact').val(data.contact);
			$('#eaddress').val(data.address);
			$('#eusername').val(data.username);
			$('#epassword').val(data.password);
			$('#eassigned_area').val(data.area_id);
			$('#district_edit_modal').modal('show');
		},
		error:function(data){
			console.log(data);
		}
	})
})
$(document).on('click','.maintenance',function(){
	let eqp_id = $(this).attr('id');
	console.log(eqp_id);
	$.ajax({
		url:'ajax_calls/eqp_maintenance.php',
		method:'post',
		data:{id:eqp_id},
		dataType:'json',
		success:function(data){
			$('#eqp_id').val(data.id);
			$('#m_modal').modal('show');
		},
		error:function(err){
			console.log(err);
		}
	})
})
$(document).on('click','.edit_equipment',function(){
	let eqp_id = $(this).attr('id');
	console.log(eqp_id);
	$.ajax({
		url:'ajax_calls/edit_equipment.php',
		data:{id:eqp_id},
		dataType:'JSON',
		method:'post',
		success:function(data){
			console.log(data);
			$('#equipment_name').val(data.equipment_name);
			$('#description').val(data.description);
			let commodity = data.commodity.split(",");
			console.log(commodity);
			let html = "";
			for(let i = 0 ; i <  commodity.length; i++){
				html +="<option value="+commodity[i]+">";
				html +=commodity[i];
				html +="</option>";
			}
			$('#commodity').html(html);
			$('#capacity').val(data.capacity);
			$('#unit').val(data.unit);
			$('#status').val(data.equipment_name);
			$('#equipment_edit').modal('show');
		},
		error:function(err){
			console.log(err);
		}
	})
})
})
