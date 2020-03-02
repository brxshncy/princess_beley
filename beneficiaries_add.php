      <div class="modal fade" id="b_add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Beneficiaries</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/add_bf.php" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Group Name</label>
                    <input type="text" class="form-control" name="benefeciaries">
                    <input type="hidden" name="dc_id" value="<?php echo $_SESSION['id'] ?>">
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                </div>
              </div>
              <?php
              ?>
              <div class="row">
                 <div class="col col-md-10">
                  <div class="form-group">
                    <label>Specific Area (Your area assigned)</label>
                    <select name="specific_area" class="form-control">
                      <option value="">-- Select Area Located --</option>
                      <?php
                        require('controller/db.php');
                        $id = $_SESSION['id'];
                        $area = "SELECT b.baranggay_name as barangay_area, a.area_address as area_address,a.id as a_id FROM area_inspected a LEFT JOIN barangay b ON a.barangay_area = b.id LEFT JOIN district_coordinator dc ON dc.area_id = a.barangay_area WHERE dc.id = '$id'";
                        $qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
                        while($a = mysqli_fetch_assoc($qry)){
                          ?>
                          <option value="<?php echo $a['a_id'] ?>"><?php echo ucwords($a['barangay_area'].", ".$a['area_address']) ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>