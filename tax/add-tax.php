<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW TAXCODE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  
		  <form action="add-tax-exec.php" method="POST" role="form" enctype="multipart/form-data">
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
            <label>Name</label>
            <input class="form-control" name="name"  type="text" placeholder="Tax name" required>
          </div>
		  <div class="col-lg-6">
            <label>Taxcode</label>
            <input class="form-control" name="taxcode"  type="text" placeholder="Taxcode eg. A " required>
          </div>
		  <div class="col-lg-6">
            <label>Percentage</label>
            <input class="form-control" name="percentage"  type="number" placeholder="Percentage eg.16%" required>
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