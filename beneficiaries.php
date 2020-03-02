<?php 
session_start();
if(isset($_SESSION['id'])){ ?>
<?php 
$title = "District Coordinator Dashboard";
$sidebar = "Beneficiaries";
$main_s = "Beneficiaries";
include('header.php');
 ?>
<?php include('dc_sidebar.php'); ?>	
<?php 
$header_content = "District Coordinator Dasboard";
$header = "Area Beneficiaries";
include('content_header.php');
?>

	<section class="content">
	  <div class="container-fluid">
	  	<?php if(isset($_SESSION['add'])): ?>
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
	  	  <div class="row mb-2">
		    <div class="col col-md-10">
		    </div>
		    <div class="col text-right col-md-2">
		       <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#b_add">
		               <i class="fas fa-plus-circle mr-1"></i> Add Beneficiaries
		       </button>
		    </div>
			</div>
	  		<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inspected Area Records</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Beneficiary Group</th>
                  <th class="text-center">Specific Area</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      require('controller/db.php');
                      $id = $_SESSION['id'];  
                      $bene = "SELECT b.benefeciaries as  bene, b.id as b_id, a.area_address as area_address FROM benefeciaries b LEFT JOIN area_inspected a ON a.id = b.specific_area LEFT JOIN district_coordinator dc ON dc.area_id = a.barangay_area WHERE dc.id = '$id'";
                      $qry = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
                      $counter = 0;
                      while($row = mysqli_fetch_assoc($qry)){ $counter++;?>
                        <tr>
                          <td class="text-center"><?php  echo $counter; ?></td>
                          <td class="text-center"><?php  echo $row['bene']; ?></td>
                          <td class="text-center"><?php  echo $row['area_address']; ?></td>
                          <td class="text-center">
                              <button type="button" class="btn btn-warning bene_edit" id="<?php echo $row['b_id'] ?>">Edit</button>
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
<?php include('beneficiaries_add.php');?>
<?php include('beneficiaries_edit.php'); ?>
<?php include('footer.php'); ?>


<?php }  else {
	$_SESSION['err'] = "You need to log in as District Coordinator first";
	header("location:index.php");
}
?>

