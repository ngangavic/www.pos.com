<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong>ADD NEW DEPARTMENT</strong></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  
		  <form action="add-department-exec.php" method="POST">
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-12">
            <label for="exampleInputPassword1">Name</label>
            <input name="name" class="form-control" id="exampleInputPassword1" type="text" placeholder="Department Name" required>
          </div>
		  </div>
		  </div>
		  
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button name="add" type="submit" class="btn btn-primary" >ADD</button>
          </div>
		  </form>
        </div>
      </div>
    </div>