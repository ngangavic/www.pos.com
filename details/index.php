<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php include"../includes/connection.php";?>
<?php
$getDet=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($getDet);
$name=$row['name'];
$address=$row['address'];
$code=$row['code'];
$city=$row['city'];
$phone=$row['phone'];
$footer=$row['footer'];
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
        <li class="breadcrumb-item active">Business Details</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Business Details
		<!--<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Customer</a>-->  
		</div>
        <div class="card-body ">
          <div class="table-responsive col-lg-6">
            <form class="" action="details-action.php" method="POST">
              <div class="form-group ">
              <label>Business Name</label>
              <input name="name" class="form-control"  type="text"  placeholder="<?php echo $name; ?>">
             </div>
			 
			 <div class="form-group">
              <label> PO.BOX</label>
              <input name="address" class="form-control"  type="number"  placeholder="<?php echo $address; ?>">
             </div>
			 
			 <div class="form-group">
              <label> Postal Code</label>
              <input name="code" class="form-control"  type="number"  placeholder="<?php echo $code; ?>">
             </div>
			 
			 <div class="form-group">
              <label>City</label>
              <input name="city" class="form-control"  type="text"  placeholder="<?php echo $city; ?>">
             </div>
			 
			 <div class="form-group">
              <label>Phone</label>
              <input name="phone" class="form-control"  type="text"  placeholder="<?php echo $phone; ?>">
             </div>
			 
			 <div class="form-group">
              <label>Footer</label>
              <textarea name="footer" class="form-control"  type="text"  placeholder="<?php echo $footer; ?>"></textarea>
             </div>
              <button name="update" class="btn btn-primary">Update</button>
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
