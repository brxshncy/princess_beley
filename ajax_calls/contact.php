<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$b = "SELECT * FROM benefeciaries b LEFT JOIN transaction t on b.id = t.bfcry_id LEFT JOIN equipment e on e.id = t.eqp_id WHERE b.id ='$id'";
	$qry = $conn->query($b) or trigger_error(mysqli_error($conn)." ".$b);
	$c = mysqli_fetch_assoc($qry);?>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Group Name</label>
            <input type="text" class="form-control" value="<?php echo $c['benefeciaries']; ?>">
        </div>
    </div>
     <div class="col">
        <div class="form-group">
            <label>Contact</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $c['contact']; ?>">
        </div>
    </div>
</div>
<div class="row">
     <div class="col">
        <div class="form-group">
            <label>Message:</label>
            <?php
                date_default_timezone_set("Asia/Manila")
            ?>
            <textarea name="message" data-html="true" class="form-control" rows="3" readonly>Your request to borrow the equipment <?php echo $c['equipment_name'] ?> is granted. The item is borrowed at <?php echo date("D F j, Y",strtotime($c['date_borrowed'])) ?> expected to be returned in <?php echo date("D F j, Y",strtotime($c['date_return'])); ?></textarea>
        </div>
    </div>
</div>
<?php } ?>