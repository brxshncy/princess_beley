      <div class="modal fade" id="equipment_add">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Equipment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/add_equipment_db.php" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Equipment Name</label>
                    <input typ="text" class="form-control" name="equipment_name">
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="form-group">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Description/Functionality</label>
                    <textarea name="description" name="description" class="form-control" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-sm-6">
                <div class="form-group">
                  <label>Commodities</label>
                  <div class="select2-purple">
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
              </div>
              <div class="col col-md-3">
                <label>Capacity of Commodity</label>
                <input type="number" class="form-control" name="capacity">
              </div>
              <div class="col col-md-3">
                <label>Unit Measure</label>
                <input type="text" class="form-control" name="unit">
              </div>
            </div>
            

            <div class="row">
              <div class="col col-md-3">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="1">Operational</option>
                    <option value="2">Non Operational</option>
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