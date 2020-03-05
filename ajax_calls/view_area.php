<?php

require('../controller/db.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];

	$area = "SELECT * FROM area_inspected WHERE id ='$id'";
	$qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
	$a = mysqli_fetch_assoc($qry);

	$data['barangay_area'] = ucwords($a['barangay_area']);
	$data['area_address'] = ucwords($a['area_address']);
	$data['comm'] = array();
	$arr = explode(",",$a['commodity']);
	foreach($arr as $comm){
		$comms = "SELECT commodity_name FROM commodity WHERE id = '$comm'";
		$qry_1 = $conn->query($comms) or trigger_error(mysqli_error($conn)." ".$comms);
		$b = mysqli_fetch_assoc($qry_1);
		array_push($data['comm'],$b['commodity_name']);
	}
	$data['soil_type'] = $a['soil_type'];
	$data['area_platform'] = $a['area_platform'];
	$data['date_inspected'] = date("D M j, Y",strtotime($a['date_inspected']));


	echo json_encode($data);
}
if(isset($_POST['e_id'])){
	$id = $_POST['e_id'];

	$area = "SELECT * FROM area_inspected WHERE id ='$id'";
	$qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="area_id" id="area_id" class="form-control">
                    <label>Select Barangay Area:</label>
                    <select name="barangay_area" id="abarangay_area" class="form-control">
                      <option value=""></option>
                      <?php
                        $brgy = "SELECT * FROM barangay";
                        $qry = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
                        while($b = mysqli_fetch_assoc($qry)){?>
                        <option value="<?php echo $b['id'] ?>"<?php echo $b['id'] == $a['barangay_area'] ? 'selected' : '' ?>><?php echo $b['baranggay_name']; ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                 <div class="col col-md-6">
                  <div class="form-group">
                    <label>Date Inspected</label>
                    <input type="date" name="date_inspected" value="<?php echo $a['date_inspected'] ?>" id="adate_inspected" class="form-control">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Area Address</label>
                    <input type="text" class="form-control" value="<?php echo $a['area_address'] ?>" name="area_address" id="aarea_address">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Commodities</label>
                      <?php 
                      	$c_id = explode(",",$a['commodity']);
                      ?>
                      <select class="select2" multiple="multiple" name="commodity[]" data-placeholder="Select Commodities" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <option value="0">any commodities</option>
                      <?php
                          $commodities = "SELECT * FROM commodity";
                          $qry = $conn->query($commodities) or trigger_error(mysqli_error($conn)." ".$commodities);
                          while($c = mysqli_fetch_assoc($qry)){ ?>
                          <option value="<?php echo $c['id']; ?>"<?php in_array($c['id'],$c_id) ? 'selected' : '' ?>>
                          	<?php echo $c['commodity_name']; ?>
                          </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
            </div>
             <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Soil Type</label>
                    <select name="soil_type" id="asoil_type" class="form-control">
                      <option value=""></option>
                      <option value="Clay Soil">Clay Soil</option>
                      <option value="Sandy Soil">Sandy Soil</option>
                      <option value="Silty Soil">Silty Soil</option>
                      <option value="Peaty Soil">Peaty Soil</option>
                      <option value="Chalky Soil">Chalky Soil</option>
                      <option value=Loamy Soil>Loamy Soil</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Area Platform</label>
                     <select name="area_platform" id="aarea_platform" class="form-control">
                      <option value=""></option>
                      <option value="Elevated">Elevated</option>
                      <option value="Flat">Flat</option>
                    </select>
                  </div>
                </div>
              </div>
<?php } 

else if(isset($_POST['i_id'])){
	$id = $_POST['i_id'];

	$ins = "SELECT * FROM area_inspected a LEFT JOIN barangay b ON b.id = a.barangay_area WHERE b.id = '$id'";
	$qry_1 = $conn->query($ins) or trigger_error(mysqli_error($conn)." ".$ins);
	while($x = mysqli_fetch_assoc($qry_1)){?>
<tr>
	<td class="text-center"><?php echo ucwords($x['area_address']) ?></td>
	<td class="text-center"><?php echo ucwords($x['commodity']) ?></td>
	<td class="text-center"><?php echo ucwords($x['soil_type']) ?></td>
	<td class="text-center"><?php echo ucwords($x['area_platform']) ?></td>
</tr>
<?php	}
}