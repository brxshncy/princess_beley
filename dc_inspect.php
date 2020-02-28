      <div class="modal fade" id="i_area_modal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Area info</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="controller/add_dc.php" method="post">
            <div class="modal-body">
                <table class="table table-stripe table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">Area Address</th>
                      <th class="text-center">Commodities</th>
                      <th class="text-center">Soil Type</th>
                      <th class="text-center">Area Platform</th>
                      <tbody id="i_area">

                      </tbody>
                    </tr>
                  </thead>
                </table>
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