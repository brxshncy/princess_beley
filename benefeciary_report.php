<?php 
session_start();
$title = "Benefeciaries Reports";
$main_sidebar = "Benefeciaries";
$sidebar = "Benefeciaries";
$header_content = "Benefeciaries";
$header = "Benefeciaries";
include('header.php');
 ?>
<?php include('sidebar.php'); ?>	
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col col-md-10">
    </div>
    <div class="col text-right col-md-2">

    </div>
</div>
<?php if(isset($_SESSION['suc'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-success disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['suc'];
              unset($_SESSION['suc']);
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
              <h3 class="card-title">Beneciaries</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover table table-striped projects">
                <thead>
                <tr>
                  <th class="text-center">Benefeciaries</th>
                  <th class="text-center">Contact</th>
                  <th class="text-center">Area</th>
                  <th class="text-center">Registered By</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    require('controller/db.php');
                    $dc = "SELECT *,b.contact as b_contact,concat(dc.fname,' ',dc.lname) as dc_name FROM benefeciaries b left join area_inspected ai on ai.id = b.specific_area left join district_coordinator dc on dc.id = b.dc_id left join barangay bb on bb.id = ai.barangay_area  order by b.id DESC";
                    $qry = $conn->query($dc) or trigger_error(mysqli_error($conn)." ".$dc);
                    while($row = mysqli_fetch_assoc($qry)){?>
                    <tr>
                      <td class="text-center"><?php echo $row['benefeciaries'] ?></td>
                      <td class="text-center"><?php echo $row['b_contact'] ?></td>
                      <td class="text-center"><?php echo $row['baranggay_name']." ".ucwords($row['area_address']) ?></td>
                      <td class="text-center"><?php echo ucwords($row['dc_name']) ?></td>
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
<?php include('dc_inspect.php'); ?>
<?php include('dc_add_modal.php'); ?>
<?php include('dc_edit_modal.php'); ?>
<?php include('footer.php'); ?>