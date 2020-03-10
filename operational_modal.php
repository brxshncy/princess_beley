 <div class="modal fade" id="m<?php echo $a['id'] ?>">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/operational.php" method="post">
            <div class="modal-body">
              <input type="hidden" value="<?php echo $a['id'] ?>" name="e_id">
              Set Equipment: <b><?php echo ucwords($a['equipment_name']) ?></b> to Operational?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Set</button>
            </div>
          </form>
          </div>
        </div>
      </div>

       <div class="modal fade" id="c<?php echo $a['id'] ?>">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Scheduled Maintenances</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/operational.php" method="post">
            <div class="modal-body">
                <?php
                  $ee_id = $a['id'];
                  $m = "SELECT date_sched FROM equipment_maintenance WHERE equipment_id = '$ee_id'";
                  $qwer = $conn->query($m) or trigger_error(mysqli_error($conn)." ".$m);
                  if(mysqli_num_rows($qwer) > 0){
                     while($o = mysqli_fetch_assoc($qwer)){?>
                  <p><?php echo "Maintenance Schedule on: <b>".date("F j, Y",strtotime($o['date_sched']))."</b>" ; ?></p>
                <?php } } else{
                  echo "No schedule set";
                }
                ?>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Set</button>
            </div>
          </form>
          </div>
        </div>
      </div>