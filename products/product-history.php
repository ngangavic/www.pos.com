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
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      
      <?php //include"add-product.php";?>
	  <?php //include"edit-product.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Product History
		<!--<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Product</a> --> 
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Prod Code</th>
				  <th>Description</th>
				  <th>Transaction #</th>
                  <th>Quantity</th>
				  <th>Cost</th>
				  <th>salesvalue</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Emp name</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Prod Code</th>
				  <th>Description</th>
				  <th>Transaction #</th>
                  <th>Quantity</th>
				  <th>Cost</th>
				  <th>salesvalue</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Emp name</th>
                </tr>
              </tfoot>
<?php
$selectProdHis=mysqli_query($link,"SELECT * FROM tbl_product_his ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectProdHis)){
?>			  
              <tbody>
                <tr>
                  <td><?php echo $row['productCode']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['transactionNo']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
				  <td><?php echo $row['cost']; ?></td>
                  <td><?php echo $row['salesValue']; ?></td>
                  <td><?php echo $row['transactionDate']; ?></td>
				  <td><?php echo $row['transactionTime']; ?></td>
                  <td><?php echo $row['employeeId']; ?></td>
                  
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
