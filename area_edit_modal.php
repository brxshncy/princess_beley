      <div class="modal fade" id="edit_area_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Area Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/edit_area_db.php" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="area_id" id="area_id" class="form-control">
                    <label>Select Barangay Area:</label>
                    <select name="barangay_area" id="abarangay_area" class="form-control">
                      <option value=""></option>
                      <?php
                        require('controller/db.php');
                        $brgy = "SELECT * FROM barangay";
                        $qry = $conn->query($brgy) or trigger_error(mysqli_error($conn)." ".$brgy);
                        while($a = mysqli_fetch_assoc($qry)){?>
                        <option value="<?php echo $a['id'] ?>"><?php echo $a['baranggay_name']; ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                 <div class="col col-md-6">
                  <div class="form-group">
                    <label>Date Inspected</label>
                    <input type="date" name="date_inspected" id="adate_inspected" class="form-control">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Area Address</label>
                    <input type="text" class="form-control" name="area_address" id="aarea_address">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row mb-2">
                <div class="col">
                  <b>Commodities</b>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-10">
                  <table class="table  table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Commodity</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody id="e_comm">
                      </tbody>
                  </table>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col">
                <button type="button" class="btn btn-primary" id="addmore">Add more</button>
              </div>
            </div>
             <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Soil Type</label>
                    <select name="soil_type" id="asoil_type" class="form-control">
                      <option value=""></option>
                      <option value="Clay Soil">Clay Soil</option>
                      <option value="Sandy Soil">Sandy Soil</option>
                      <option value="Silty Soil">Silty Soil</option>
                      <option value="Peaty Soil">Peaty Soil</option>
                      <option value="Chalky Soil">Chalky Soil</option>
                      <option value=Loamy Soil>Loamy Soil</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Area Platform</label>
                     <select name="area_platform" id="aarea_platform" class="form-control">
                      <option value=""></option>
                      <option value="Elevated">Elevated</option>
                      <option value="Flat">Flat</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </div>

          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>