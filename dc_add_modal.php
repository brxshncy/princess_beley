      <div class="modal fade" id="district_add_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Area</h4>
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
                    <input type="text" class="form-control" name="fname">
                  </div>
                </div>
                 <div class="col">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname">
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Birthday</label>
                    <input type="date" class="form-control" name="bday">
                  </div>
                  </div>
                   <div class="col">
                  <div class="form-group">
                     <label>Contact</label>
                    <input type="text" class="form-control" name="contact">
                  </div>
                  </div>
                </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Address</label>
                    <input type="text" class="form-control" name="address">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                     <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                     <label>Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col col-md-12">
                  <div class="form-group">
                    <label>Assign Area</label>
                    <select name="assigned_area" id="assigned_area" class="form-control">
                      <option value=""></option>
                      <?php
                          require('controller/db.php');
                          $area = "SELECT *, b.baranggay_name as barangay, a.id as a_id FROM area_inspected a LEFT JOIN barangay b ON b.id = a.barangay_area";
                          $qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
                          while($a = mysqli_fetch_assoc($qry)){ 
                            $info = "<b>Barangay Area: </b>".$a['barangay']."; <b>Area Addres: </b>".ucwords($a['area_address'])."; <b>Commodities: </b>".$a['commodity'];
                      ?>
                      <option value="<?php echo $a['a_id'] ?>"><?php echo $info; ?></option>
                      <?php  }
                      ?>
                    </select>
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