<?php 
session_start();
if(isset($_SESSION['id'])){ ?>
<?php 
$title = "Accepted Request";
$sidebar = "Notification";
$main_s = "Equipments";
include('header.php');
 ?>
<?php include('dc_sidebar.php'); ?>	
<?php 
$header_content = "Equipments";
$header = "Equipments";
include('content_header.php');
?>

	<section class="content">
	  <div class="container-fluid">
	  	<?php if(isset($_SESSION['addcslashes(str, charlist)'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-success disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['add'];
              unset($_SESSION['add']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Equipments</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Equipment Name</th>
                  <th class="text-center">Benefeciary</th>
                  <th class="text-center">Date Borrowed</th>
                  <th class="text-center">Date to Return</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>  
                <tbody>
                    <?php 
                      require('controller/db.php');
                      $id = $_SESSION['id'];  
                      $bene = "SELECT *,b.id as b_id FROM transaction t LEFT JOIN equipment e ON t.eqp_id = e.id LEFT JOIN benefeciaries b ON b.id = t.bfcry_id WHERE t.dc_id = '$id' ORDER BY t.id DESC";
                      $qry = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
                      $counter = 0;
                      while($row = mysqli_fetch_assoc($qry)){ $counter++;?>
                        <tr>
                            <td class="text-center"><?php echo $counter; ?></td>
                            <td class="text-center"><?php echo $row['equipment_name']; ?></td>
                            <td class="text-center"><?php echo $row['benefeciaries']; ?></td>
                            <td class="text-center"><?php echo date("F j, Y",strtotime($row['date_borrowed'])); ?></td>
                            <td class="text-center"><?php echo date("F j, Y",strtotime($row['date_return'])); ?></td>
                            <td class="text-center">
                                <a href="javascript:void(0)" id="<?php echo $row['b_id']?>" class="sms">
                                  <i class="fas fa-sms text-success"></i>
                                </a>
                            </td>
                        </tr>
                     <?php }
                    ?>
                </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('trans_add.php'); ?>
<?php include('contact_modal.php'); ?>
<?php include('footer.php'); ?>


<?php }  else {
	$_SESSION['err'] = "You need to log in as District Coordinator first";
	header("location:index.php");
}
?>

