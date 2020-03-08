<?php 
session_start();
$title = "Maintenances";
$main_sidebar = "Calendar";
$sidebar = "Maintenance";
$header_content = "Maintenance";
$header = "Calendar";
include('calendar_header.php');
 ?>
<?php include('staff_sidebar.php'); ?>  
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
<div class="row mt-4">
    <div class="col col-md-10">
    </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-body p-0">
            <div id="calendar1">
                    
            </div>
          </div>  
        </div>
    </div>
  </div>
</div>
</section>
<?php include('calendar_footer.php'); ?>