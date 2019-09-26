<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php 
$get_id=$_GET['id'];
include"../includes/connection.php";
?>
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
      
      <?php include"add-customer.php";?>
	  <?php //include"edit-customer.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Customers
		</div>
        <div class="card-body">
          <div class="table-responsive">
		  <?php 
		  $selectCust=mysqli_query($link,"SELECT * FROM tbl_customer WHERE id='$get_id' ")or die (mysqli_error());
		  $row=mysqli_fetch_array($selectCust);
		  $id=$row['id'];
		  $customerCode=$row['customerCode'];
		  $name=$row['name'];
		  $address=$row['address'];
		  $town=$row['city'];
		  $county=$row['state'];
		  $postalCode=$row['postalCode'];
		  $phone=$row['phone'];
		  $email=$row['email'];
		  
		  ?>
            <form method="POST" action="edit-customer-exec.php" >
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Customer Code</label>
			<input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" >
            <input class="form-control" id="exampleInputPassword1" type="text" name="customerCode" value="<?php echo $customerCode; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Name</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="name" value="<?php echo $name; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Address</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="address" value="<?php echo $address; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Town</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="city" value="<?php echo $town; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">County</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="state" value="<?php echo $county; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">PostalCode</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="postalCode" value="<?php echo $postalCode; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Phone</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="phone" value="<?php echo $phone; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="email" value="<?php echo $email; ?>" >
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
