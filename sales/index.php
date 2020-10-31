<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
	}
	

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
        <li class="breadcrumb-item active">Sales</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php include"add-product.php";?>
	  <?php include"edit-product.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Sales
		<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Calculate</a>  
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Month</th>
				  <th>Total sales</th>
				  <th>Year</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Month</th>
				  <th>Total sales</th>
				  <th>Year</th>
				  <th>Action</th>
                </tr>
              </tfoot>
<?php
$selectSales=mysqli_query($link,"SELECT * FROM tbl_sales ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectSales)){
?>			  
              <tbody>
                <tr>
                  <td><?php echo $row['month']; ?></td>
                  <td><?php echo $row['totalSales']; ?></td>
                  <td><?php echo $row['year']; ?></td>
                  <td>
				  <div class="btn-group">
				  <a data-toggle="modal" data-target="#editModal" href="edit-product.php" class="btn btn-success">Edit</a>
				  <button class="btn btn-danger">Delete</button>
				  </div>
				  </td>
                </tr>
                
              </tbody>
<?php } ?>			  
            </table>
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
