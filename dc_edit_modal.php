      <div class="modal fade" id="district_edit_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/add_dc.php" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="hidden" class="form-control" name="e_id" id="e_id">
                    <input type="text" class="form-control" name="fname" id="efname">
                  </div>
                </div>
                 <div class="col">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" id="elname">
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Birthday</label>
                    <input type="date" class="form-control" name="bday" id="ebday">
                  </div>
                  </div>
                   <div class="col">
                  <div class="form-group">
                     <label>Contact</label>
                    <input type="text" class="form-control" name="contact" id="econtact">
                  </div>
                  </div>
                </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Address</label>
                    <input type="text" class="form-control" name="address" id="eaddress">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Username</label>
                    <input type="text" class="form-control" name="username" id="eusername">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                     <label>Password</label>
                    <input type="text" class="form-control" name="password" id="epassword">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col col-md-12">
                  <div class="form-group">
                    <label>Assign Area</label>
                    <select name="assigned_area" id="eassigned_area" class="form-control" id="eassigned_area" required="">
                      <option value=""></option>
                      <?php
                          require('controller/db.php');
                          $area = "SELECT * FROM barangay";
                          $qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
                          while($a = mysqli_fetch_assoc($qry)){ 
                            $info = "<b>Barangay Area: </b>".$a['barangay']."; <b>Area Addres: </b>".ucwords($a['area_address'])."; <b>Commodities: </b>".$a['commodity'];
                      ?>
                      <option value="<?php echo $a['id'] ?>"><?php echo $a['baranggay_name']; ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col col-md-3">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required="">
                      <option value="0">Active</option>
                      <option value="1">Deactivate</option>
                    </select>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-info">Update</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>