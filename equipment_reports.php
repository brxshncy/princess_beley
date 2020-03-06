<?php 
session_start();
$title = "Equipment Reportst";
$main_sidebar = "Equipment";
$sidebar = "Equipment Reports";
$header_content = "Equipment Reports";
$header = "Equipment Reports";
include('header.php');
 ?>
<?php include('staff_sidebar.php'); ?>  
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col col-md-10">
    </div>
    <div class="col text-right col-md-2">
    </div>
</div>
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
<?php if(isset($_SESSION['update'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-info disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['update'];
              unset($_SESSION['update']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if(isset($_SESSION['aa'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-warning disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['aa'];
              unset($_SESSION['aa']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if(isset($_SESSION['err'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-danger disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['err'];
              unset($_SESSION['err']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<div class="row justify-content-center">
  <div class="col-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Harvest Reports</h3>
      </div>
      <div class="card-body">
        <table id="area_inspected_table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">Equipment</th>
              <th class="text-center">Used</th>
              <th class="text-center">Total Post Hasvest Accumulated</th>
            </tr>
          </thead>
          <tbody>
                <?php
                  require('controller/db.php');
                  $eq = "SELECT *,e.id as e_id,(SELECT COUNT(eqp_id) FROM transaction tt LEFT JOIN equipment ee ON ee.id = tt.eqp_id WHERE tt.bfcry_id =b.id ) as count, (SELECT sum(volume) FROM transaction ttt left join post_harvest ph on ph.transac_id = ttt.id WHERE ph.transac_id = t.id) as total_harvest FROM equipment e left join transaction t on t.eqp_id = e.id left join benefeciaries b on b.id = t.bfcry_id where t.state = 1   ORDER BY e.id DESC";
                  $qry = $conn->query($eq) or trigger_error(mysqli_error($conn)." ".$eq);
                  while($a = mysqli_fetch_assoc($qry)):?>
                  <tr>
                    <td class="text-center"><?php echo $a['equipment_name'] ?></td>

                    <td class="text-center">
                      <a href="javascript:void(0)"  data-toggle="modal" data-target="#m<?php echo $a['e_id'] ?>">
                        <?php echo $a['count'] ?>
                     </a>
                    </td>
                     <?php include('uses_modal.php'); ?>
                    <td  width="40%" class="text-center"><?php echo $a['total_harvest'] ?></td>
                  </tr>
                <?php endwhile ?>
            </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('footer.php'); ?>