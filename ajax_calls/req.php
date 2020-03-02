<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$eq = "SELECT * FROM equipment WHERE id ='$id'";
	$qry = $conn->query($eq) or trigger_error(mysqli_error($conn)." ".$sq);
	$a = mysqli_fetch_assoc($qry);?>
<div class="row mt-3">
    <div class="col col-md-6">
        <div class="form-group">
            <label>Equipment Name</label>
            <input typ="text" class="form-control" value="<?php echo $a['equipment_name']; ?>" readonly>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col col-md-6">
        <div class="form-group">
            <label>Beneficiary</label>
            <select name="" class="form-control">
            	<option value=""></option>
            	<?php
            		$bene = "SELECT * FROM benefeciaries";
            		$q = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
            		while($x = mysqli_fetch_assoc($q)){?>
            	<option value="<?php echo $x['id'] ?>"><?php echo $x['benefeciaries'] ?></option>
            	<?php }
            	?>
            </select>
        </div>
    </div>
</div>

<?php } ?>