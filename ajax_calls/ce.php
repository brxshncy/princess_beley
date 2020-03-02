<?php
require('../controller/db.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$c = "select * from commodity where id ='$id'";
	$qry = $conn->query($c) or trigger_error(mysqli_error($conn)." ".$c);
	$a = mysqli_fetch_assoc($qry);
?>
<div class="row">
	<div class="col col-md-6">
		<input type="hidden" class="form-control" name="id" value="<?php echo $a['id'] ?>">
		<input type="text" class="form-control" name="c" value="<?php echo $a['commodity_name'] ?>">
	</div>
</div>
<?php } ?>