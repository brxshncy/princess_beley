<?php
require('../controller/db.php');
$res = array();
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$update = "SELECT * FROM equipment WHERE id ='$id'";
	$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
	$a = mysqli_fetch_assoc($qry); ?>

         <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Equipment Name</label>
                    <input type="text" class="form-control" name="equipment_name" value="<?php echo $a['equipment_name'] ?>">
                    <input type="hidden" class="form-control" name="e_id" value="<?php echo $a['id'] ?>">
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="form-group">
                    <?php
                      $main = "SELECT * FROM equipment_maintenance WHERE equipment_id = '$id'";
                      $qry1 = $conn->query($main) or trigger_error(mysqli_error($conn)." ".$main);
                      $q = mysqli_fetch_assoc($qry1);
                    ?>
                    <label>Maintenance Schedule</label>
                    <input type="date" class="form-control" name="date_sched" value="<?php echo $q['date_sched']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Description/Functionality</label>
                    <textarea name="description" id="description" name="description" class="form-control" rows="3"><?php echo ucfirst($a['description']); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
            		<table class="table table-stripe table-bordered table-hover">
            			<thead>
            				<tr>
            					<th class="text-center" width="60%">Commodities</th>
            					<th></th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php
            					$commodities = explode(",",$a['commodity']);
            					foreach($commodities as $commodity){
            						$comm = "SELECT * FROM commodity WHERE id ='$commodity'";
            						$qry_2 = $conn->query($comm) or trigger_error(mysqli_error($conn)." ".$comm);
            						$c = mysqli_fetch_assoc($qry_2);?>
            					<tr>
            						<input type="hidden" name="commodity[]" value="<?php echo $c['id'] ?>">
            						<td class="text-center"><?php echo $c['commodity_name'] ?></td>
            						<td class="text-center"><button type="button" class="btn btn-danger btn-sm x_e_c">Remove</button></td>
            					</tr>
            				<?php 	}
            				?>
            			</tbody>
            		</table>
              	 </div>
          	  </div>
          	  <div class="row text-right">
          	  	<div class="col">
          	  		<button class="btn btn-info ac" type="button" id="qqq">Add more commodities</button>
          	  	</div>
          	  </div>

          	   <div class="row" id="aaa">
                <div class="col col-sm-6">
                <div class="form-group">
                  <label>Commodities</label>
                  <div class="select2-purple">
                    <select class="select22" multiple="multiple" name="commodity[]" data-placeholder="Select Commodities" data-dropdown-css-class="select2-purple" style="width: 100%;">
                       <?php
                     	$array = explode(",",$a['commodity']);
                     	$comms = "SELECT * FROM commodity";
                     	$qry2 = $conn->query($comms) or trigger_error(mysqli_error($conn)." ".$comms);
                     	while($x = mysqli_fetch_assoc($qry2)){
                     		if(!in_array($x['id'],$array)){
                     			echo "<option value=".$x['id'].">".$x['commodity_name']."</option>";
                     		}
                     	?>
                     <?php }
                     ?>
                 
                    </select>
                  </div>
                </div>
              </div>
            </div>
              <div class="row mt-3">
              <div class="col col-md-6">
                <label>Capacity of Commodity</label>
                <input type="number" class="form-control" name="capacity" value="<?php echo $a['capacity'] ?>">
              </div>
              <div class="col col-md-6">
                <label>Unit Measure</label>
                <input type="text" class="form-control" name="unit" value="<?php echo $a['unit'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="col col-md-3">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="1" <?php echo $a['status'] == 1 ? 'selected' : '' ?>>Operational</option>
                    <option value="2" <?php echo $a['status'] == 2 ? 'selected': '' ?>>Non Operational</option>
                  </select>
                </div>
              </div>
            </div>
<?php } ?>
<script>
	$(document).ready(function(){
		$('#aaa').hide()
		$(document).on('click','#qqq',function(){
			$('#aaa').show();
			$('#qqq').hide();
		})
	})
</script>