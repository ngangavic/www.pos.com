<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
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
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Product
		</div>
        <div class="card-body">
          <div class="table-responsive">
<?php 
$selectProducts=mysqli_query($link,"SELECT * FROM tbl_discount WHERE id='$get_id' ")or die (mysqli_error());
//$selectProducts=mysqli_query($link,"SELECT * FROM tbl_products WHERE id='$q' ")or die (mysqli_error());
$row=mysqli_fetch_array($selectProducts);
    $id=$row['id'];
	$department=$row['department'];
	$product=$row['product'];
	$percentage=$row['percentage'];
	

?>		  
		    <form method="POST" action="edit-dis-exec.php" >
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
		  <input class="form-control" name="id"  type="hidden" value="<?php echo $id; ?>" >     
            <label>Department</label>
            <select class="form-control" name="department">
              <?php $getDept=mysqli_query($link,"SELECT * FROM tbl_department WHERE name='$department'")or die(mysqli_error());
				$row=mysqli_fetch_array($getDept);?>
               <option value=""><?php echo $row['name'];?></option>
               <?php $displayDept=mysqli_query($link,"SELECT * FROM tbl_department ")or die(mysqli_error());
				while($row=mysqli_fetch_array($displayDept)){?>
               <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
               <?php } ?>
            </select>
          </div>
		  <div class="col-lg-6">
            <label>Product</label>
            <select class="form-control" name="product">
              <?php $getProd=mysqli_query($link,"SELECT * FROM tbl_products WHERE description='$product'")or die(mysqli_error());
				$row=mysqli_fetch_array($getProd);?>
               <option value=""><?php echo $row['description'];?></option>
               <?php $displayProd=mysqli_query($link,"SELECT * FROM tbl_products ")or die(mysqli_error());
				while($row=mysqli_fetch_array($displayProd)){?>
               <option value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
               <?php } ?>
            </select>
          </div>
		  <div class="col-lg-6">
            <label>Percentage</label>
            <input class="form-control" name="percentage" type="number" value="<?php echo $percentage; ?>" required>
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