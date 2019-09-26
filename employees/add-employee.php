<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW EMPLOYEE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  
		  <form action="add-employee-exec.php" method="POST" >
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Employee Id</label>
            <input name="empId" class="form-control" id="exampleInputPassword1" type="text" placeholder="Employee Id" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Name</label>
            <input name="name" class="form-control" id="exampleInputPassword1" type="text" placeholder="Name" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Phone</label>
            <input name="phone" class="form-control" id="exampleInputPassword1" type="text" placeholder="Phone" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Email</label>
            <input name="email" class="form-control" id="exampleInputPassword1" type="text" placeholder="Email" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Id no</label>
            <input name="idNo" class="form-control" id="exampleInputPassword1" type="text" placeholder="Id no" required>
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