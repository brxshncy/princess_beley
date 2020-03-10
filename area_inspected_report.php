<?php 
session_start();
$title = "Area Inspected Reports";
$main_sidebar = "Area Inspected";
$sidebar = "Area Inspected";
$header_content = "Area Inspected";
$header = "Area Inspected";
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
              <h3 class="card-title">Inspected Area Records</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover table table-striped projects">
                <thead>
                <tr>
                  <th class="text-center">Barangay</th>
                  <th class="text-center">Area Address</th>
                  <th class="text-center">Benefeciaries</th>
                  <th class="text-center">District Coordinators</th>
                  <th class="text-center">Commodities</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    require('controller/db.php');
                    $dc = "SELECT *,ai.id as a_id from area_inspected ai left join barangay b on b.id = ai.barangay_area ORDER BY ai.id DESC";
                    $qry = $conn->query($dc) or trigger_error(mysqli_error($conn)." ".$dc);
                    while($row = mysqli_fetch_assoc($qry)){?>
                    <tr>
                      <td class="text-center"><?php echo $row['baranggay_name'] ?></td>
                      <td class="text-center"><?php echo ucwords($row['area_address']) ?></td>
                      <td class="text-center">
                        <?php
                            $area_id = $row['a_id'];
                            $bene = "SELECT benefeciaries FROM benefeciaries WHERE specific_area = '$area_id'";
                            $qry_1 = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
                            while($a =mysqli_fetch_assoc($qry_1)){?>
                              <?php echo "<b>".ucwords($a['benefeciaries'])."</b>," ?>
                        <?php }
                        ?>
                      </td>
                      <td class="text-center">
                        
                      </td>
                      <td class="text-center"></td>
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