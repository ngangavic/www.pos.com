<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW TAXCODE</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  
		  <form action="add-dis-exec.php" method="POST" role="form" enctype="multipart/form-data">
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
            <label>Department</label>
            <select class="form-control" name="department">
               <option value="">Department</option>
               <?php $displayDept=mysqli_query($link,"SELECT * FROM tbl_department")or die(mysqli_error());
				while($row=mysqli_fetch_array($displayDept)){?>
               <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
               <?php } ?>
            </select>
          </div>
		  <div class="col-lg-6">
            <label>Product</label>
            <select class="form-control" name="product">
               <option value="">Product</option>
               <?php $displayProd=mysqli_query($link,"SELECT * FROM tbl_products")or die(mysqli_error());
				while($row=mysqli_fetch_array($displayProd)){?>
               <option value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
               <?php } ?>
            </select>
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