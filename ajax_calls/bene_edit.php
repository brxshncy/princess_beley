<?php
require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$b = "SELECT *,b.id as b_id FROM benefeciaries b LEFT JOIN district_coordinator dc ON dc.id = b.dc_id WHERE b.id = '$id'";
	$qry = $conn->query($b) or trigger_error(mysqli_error($conn)." ".$b);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col col-md-6">
		<div class="form-group">
			<label>Group Name</label>
			<input type="text" class="form-control" value="<?php echo $a['benefeciaries'] ?>" name="gc">
			<input type="hidden" class="form-control" value="<?php echo $a['b_id'] ?>" name="id">

		</div>
	</div>
		<div class="col col-md-6">
		<div class="form-group">
			<label>Contact</label>
			<input type="text" class="form-control" value="<?php echo $a['benefeciaries'] ?>" name="gc">

		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Specific Area</label>
			<select class="form-control" name="area">
				<?php
				$brgy = $a['area_id'];

					$area ="SELECT *,ai.id as a_id FROM area_inspected ai LEFT JOIN barangay bb on bb.id = ai.barangay_area WHERE ai.barangay_area = '$brgy'";
					$qry_1 = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
					while($c = mysqli_fetch_assoc($qry_1)){?>
					<option value="<?php echo $c['a_id'] ?>" <?php echo $c['a_id'] == $a['specific_area'] ? 'selected' : '' ?>><?php echo $c['baranggay_name']." ".$c['area_address'];?></option>
				<?php }?>
			</select>
		</div>
	</div>
</div>
<?php }?>