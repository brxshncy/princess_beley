      <div class="modal fade" id="cmodal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Commodity</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/addcom.php" method="post">
            <div class="modal-body">
                           <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label>Commodities</label>
                      <input type="text" name="commodity[]" class="form-control">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
        </div>
        <!-- /.modal-dialog -->
      </div>