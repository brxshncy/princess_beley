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
            <input type="text" class="form-control"  value="<?php echo $a['equipment_name']; ?>" readonly>
             <input type="hidden" class="form-control" name="eq"  value="<?php echo $a['id']; ?>" readonly>
        </div>
    </div>
        <div class="col col-md-6">
        <div class="form-group">
            <label>Beneficiary</label>
            <select name="bf" class="form-control">
                <option value=""></option>
                <?php
                    $bene = "SELECT * FROM benefeciaries";
                    $q = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
                    while($x = mysqli_fetch_assoc($q)){?>
                <option value="<?php echo $x['id'] ?>"><?php echo $x['benefeciaries'] ?></option>
                <input type="hidden" value="<?php echo $x['specific_area'] ?>" name="area_id">
                <?php }
                ?>
            </select>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Reason</label>
            <textarea name="reason" class="form-control" rows="3"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-6">
        <div class="form-group">
            <label>Date Borrowed</label>
            <input type="date" class="form-control" name="db">
        </div>
    </div> 
     <div class="col col-md-6">
        <div class="form-group">
            <label>Date Return</label>
            <input type="date" class="form-control" name="dr">
            <input type="hidden" class="form-control" value="0" name="status">
        </div>
    </div> 
</div> 

<?php } ?>