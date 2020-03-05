      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Area</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/add_area_db.php" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Date Inspected</label>
                    <input type="date" name="date_inspected" class="form-control">
                  </div>
                </div>
              </div>
               <div class="row">
                  <div class="col col-md-3">
                  <div class="form-group">
                    <label>Select Barangay Area:</label>
                    <select name="barangay_area" class="form-control">
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
                <div class="col col-md-9">
                  <div class="form-group">
                    <label>Area Address</label>
                    <input type="text" class="form-control" name="area_address">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Commodities</label>
                      <select class="select2" multiple="multiple" name="commodity[]" data-placeholder="Select Commodities" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <option value="0">any commodities</option>
                      <?php
                          require('controller/db.php');
                          $commodities = "SELECT * FROM commodity";
                          $qry = $conn->query($commodities) or trigger_error(mysqli_error($conn)." ".$commodities);
                          while($a = mysqli_fetch_assoc($qry)){?>
                          <option value="<?php echo $a['id'] ?>"><?php echo $a['commodity_name'] ?></option>
                      <?php }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col col-md-3 mt-2">
                  <button type="button" class="btn btn-primary mt-4" id="show_cmx">Add Commodity</button>
                </div>
                 <div class="col col-md-3">
                </div>
              </div>
               <div class="row mt-1" id="cmx">
                <div class="col col-md-12">
                  <table class="table  table-bordered" id="row_commodity">
                    <thead>
                        <tr>
                          <th class="text-center">Commodity</th>
                          <th class="text-center">Add more</th>
                        </tr>
                    </thead>
                    <tr>
                      <td width="70%" class="text-center"><input type="text" class="form-control" name="commodity[]" placeholder="Commodity"></td>
                      <td width="25%" class="text-center"><button type="button" class="btn btn-primary" id="add_commodity"> <i class="fas fa-plus-circle mr-1"></i> Add Commodities</button></td>
                    </tr>
                  </table>
                </div>
              </div>
             <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Soil Type</label>
                    <select name="soil_type" class="form-control">
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
                     <select name="area_platform" class="form-control">
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
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>