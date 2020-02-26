<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Set Equipment Maintenance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controller/maintenance.php" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col col-md-6">
            <div class="form-group">
              <label>Set Maintenance Schedule</label>
              <input type="hidden" name="eqp_id" id="eqp_id">
              <input type="date" id="m_date" name="m_date" class="form-control">
            </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="set" class="btn btn-primary">Set</button>
      </div>
    </div>
  </form>
  </div>
</div>
