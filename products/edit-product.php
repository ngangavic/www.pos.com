<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php $get_id=$_GET['id'];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include"../includes/header-scripts.php";?>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include"../navigation.php";?> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php include"add-product.php";?>
	  <?php //include"edit-product.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Product
		</div>
        <div class="card-body">
          <div class="table-responsive">
<?php 
$selectProducts=mysqli_query($link,"SELECT * FROM tbl_products WHERE id='$get_id' ")or die (mysqli_error());
//$selectProducts=mysqli_query($link,"SELECT * FROM tbl_products WHERE id='$q' ")or die (mysqli_error());
$row=mysqli_fetch_array($selectProducts);
    $id=$row['id'];
	$productCode=$row['productCode'];
	$description=$row['description'];
	$sellingPrice=$row['sellingPrice'];
	$buyingPrice=$row['buyingPrice'];
	$quantity=$row['quantity'];
	$taxCode=$row['taxcode'];
	$department=$row['department'];

?>		  
		    <form method="POST" action="edit-product-exec.php" >
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
		  <input class="form-control" name="id"  type="hidden" value="<?php echo $id; ?>" >     
            <label for="exampleInputPassword1">Product Code</label>
            <input class="form-control" name="productCode" id="exampleInputPassword1" type="text" value="<?php echo $productCode; ?>" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Description</label>
            <input class="form-control" name="description" id="exampleInputPassword1" type="text" value="<?php echo $description; ?>" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Selling price</label>
            <input class="form-control" name="sellingPrice" id="exampleInputPassword1" type="text" value="<?php echo $sellingPrice; ?>" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Buying price</label>
            <input class="form-control" name="buyingPrice" id="exampleInputPassword1" type="text" value="<?php echo $buyingPrice; ?>" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Quantity</label>
            <input class="form-control" name="quantity" id="exampleInputPassword1" type="text" value="<?php echo $quantity; ?>" required>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Taxcode</label>
            <select class="form-control" name="taxCode" >	
			  <option><?php echo $taxCode; ?></option>
<?php $taxSelect=mysqli_query($link,"SELECT * FROM tbl_taxcode  ")or die (mysqli_error()); 
      while($row=mysqli_fetch_array($taxSelect)){
		  $taxcode=$row['taxCode'];
?>					  
			  <option value="<?php echo $taxcode; ?>"><?php echo $taxcode;?></option>
	  <?php } ?>
			</select>
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Department</label>
            <select class="form-control" name="department">
			  <option><?php echo $department; ?></option>
<?php $taxSelect=mysqli_query($link,"SELECT * FROM tbl_department  ")or die (mysqli_error()); 
      while($row=mysqli_fetch_array($taxSelect)){
		  $dept=$row['id'];
		  $name=$row['name'];
?>							  
			  <option value="<?php echo $dept; ?>"><?php echo $name; ?></option>
	  <?php } ?>
			</select>
          </div>
		  </div>
		  </div>
		  
          <div class="modal-footer">
            <a href="index.php" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
            <button name="edit" type="submit" class="btn btn-primary" >EDIT</button>
          </div>
		  </form>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include"../includes/footer.php"; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include"../logout-modal.php";?>
    <?php include"../includes/footer-scripts.php"?>
  </div>
</body>
</html>